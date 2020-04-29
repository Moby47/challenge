<template>
        <div>
            
                <div class="desktop">
                        <div class="window-area scroll">
                            <!-- content here-->
                            <form class="login-form bg-white p-6 mx-auto border bd-default win-shadow" 
                            method="post" data-vv-scope='suggForm'>
                          <span class="mif-comment mif-4x place-right" style="margin-top: -10px;"></span>
                          <h2 class="text-light">Suggest a Dare</h2>
                          <hr class="thin mt-4 mb-4 bg-white">
                          <div class="form-group">
                              <input type="text" data-role="input" data-prepend="<span class='mif-user'>" placeholder="Enter your username..." 
                                    data-history="true" name="Username"
                                    v-model='username' v-validate='"required|max:15"'>
                                    <p class='fg-red shake' v-show="errors.has('suggForm.Username')">{{ errors.first('suggForm.Username') }}</p>                         
                          </div>
                          <div class="form-group">
                              <textarea data-role="textarea" data-prepend="<span class='mif-comment'>" data-history="true" name="Description" placeholder="Describe Dare"
                              v-model='description' v-validate='"required|max:255"'></textarea>
                              <p class='fg-red shake' v-show="errors.has('suggForm.Description')">{{ errors.first('suggForm.Description') }}</p>
                            
                          </div>
                          <div class="form-group mt-10">
                              <button class="button text-white" @click.prevent='suggest()'
                               style="background-color: #1ba1e2">Send</button>
                          </div>
                      </form>
                  
                            <!-- content here-->
                        </div>
                        <taskbar></taskbar>
                    </div>

                    
        </div>
    </template>
    
    
    <script>
        export default {
    
            data(){
                return {
                    description:'',
                   username:'',
                }
            },
            mounted() {

                $(document).ready(function(){
                    $(window).scrollTop(0);
                });
                
                //notification for neebies
                this.notify()

            },
            
            methods: {
               
                suggest(){
                          //validate specific reg fields
        this.$validator.validateAll('suggForm').then(() => {
             if (!this.errors.any()) {
            var activity =  Metro.activity.open({
                    type: 'square',
                    overlayClickClose: false,
                    text: '<div class=\'mt-2 text-small text-white\'>Please, wait...</div>',
                })

                    var input = {'username':this.username, 'description':this.description};
                    axios.post('/api/suggest-dare',input)
                    .then(res => {
                        
                        var options = {
                                showTop: true,
                            }
                          if(res.data == 1){
                            Metro.toast.create('Suggestion sent!',
                             null, 5000, 'success', options);
                             
                             Metro.activity.close(activity);
                             this.$router.push({name: "homepage"});
                          
                          }else{
                              alert('An error coccured, please try again.')
                          }
                    })
                    .catch(error =>{
                        Metro.activity.close(activity);
                      console.log(error)
                      var options = {
                                showTop: true,
                            }
                         Metro.toast.create('A temporary network error occured... Please try again',
                         null, 5000, 'yellow', options);
                       
                    })
                  }else{ //if error
                    //error is auto shown, dont worry
                  } //if error
                })//val
              
                   }, //suggest

    
                notify(){
                    var wel = Metro.session.getItem('suggest')
    
                        if(wel){
                            //old guest, do nothing
                        }else{
                            //new guest:
                            //notify and save key
                            var notify = Metro.notify;
                            notify.setup({
                                width: 300,
                                duration: 1000,
                                timeout: 9000,
                                animation: 'easeOutBounce'
                            });
                            notify.create("Suggest a Dare to be added to the list");
                            notify.reset();
    
                            Metro.session.setItem('suggest','suggest')
                        }
                },
                

            },
           
        }
    </script>
    