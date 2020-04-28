<template>
        <div>
            
                <div class="desktop">
                        <div class="window-area scroll">
                            <!-- content here-->
                            <form class="login-form bg-white p-6 mx-auto border bd-default win-shadow" 
                            method="post" data-vv-scope='regForm'>
                          <span class="mif-gamepad mif-4x place-right" style="margin-top: -10px;"></span>
                          <h2 class="text-light">New Player</h2>
                          <hr class="thin mt-4 mb-4 bg-white">
                          <div class="form-group">
                              <input type="text" data-role="input" data-prepend="<span class='mif-user'>" placeholder="Enter your username..." 
                                    name="Username" v-model='username' v-validate='"required|max:15"'>
                                    <p class='fg-red shake' v-show="errors.has('regForm.Username')">{{ errors.first('regForm.Username') }}</p>                         
                          </div>
                          <div class='form-group'>
                              <input type='email' data-role='input' name="Email" data-prepend="<span class='mif-envelop'>" placeholder="Enter your email..."
                              v-model='email' v-validate='"required|email|max:100"'>
                              <p class='fg-red shake' v-show="errors.has('regForm.Email')">{{ errors.first('regForm.Email') }}</p>
                          </div>
                          <div class="form-group">
                              <input type="password" data-role="input" data-prepend="<span class='mif-key'>" placeholder="Enter your password..."
                                    name="Password" v-model='password' v-validate='"required"'>
                                    <p class='fg-red shake' v-show="errors.has('regForm.Password')">{{ errors.first('regForm.Password') }}</p>
                            
                          </div>
                          <div class="form-group mt-10">
                                <p class='text-right'><button class="image-button" @click.prevent='oldPlayer()'>
                                        <span class="mif-user-plus icon"></span>
                                        <span class="caption">Old Player?</span>
                                    </button></p>
                              <button class="button text-white" @click.prevent='reg()'
                               style="background-color: #1ba1e2">Start</button>
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
                 email:'',
                password:'',
                username:'',
                }
            },
            mounted() {

                this.loggedIn()

                $(document).ready(function(){
                    $(window).scrollTop(0);
                });
    
                //notification for neebies
                this.notify()

            },
            
            methods: {
              
               oldPlayer(){
                this.$router.push({name: "login"});
                },
                
    
                notify(){
                    var wel = Metro.session.getItem('player')
    
                        if(wel){
                            //old guest, do nothing
                        }else{
                            //new guest:
                            //notify and save key
                            var notify = Metro.notify;
                            notify.setup({
                                width: 300,
                                duration: 1000,
                                timeout: 6000,
                                animation: 'easeOutBounce'
                            });
                            notify.create("Welcome, Player!");
                            notify.reset();
    
                            Metro.session.setItem('player','player')
                        }
                },
                
               

                   reg(){
                          //validate
            this.$validator.validateAll('regForm').then(() => {
             if (!this.errors.any()) {
              
              var activity =  Metro.activity.open({
                    type: 'square',
                    overlayClickClose: false,
                    text: '<div class=\'mt-2 text-small text-white\'>Please, wait...</div>',
                })

          //start registeration
          var input = {'username':this.username,'email':this.email,
          'password':this.password };
      
      //send to database with axios
          axios.post('/api/register-user',input)
          .then(res=>{
              console.log(res)
        if(res.data == 1){
         
                            //login
                  axios.post('/api/login-user',input)
                    .then(res => {
                    var result = res.data.result;

                    var options = {
                                showTop: true,
                            }

                         if(result == 2){
                            Metro.toast.create('Login failed. Invalid credentials. Refresh and try again',
                             null, 9000, 'yellow', options);
                             Metro.activity.close(activity);
                          }else{
                            Metro.toast.create('Registeration Successful! You are Logged in...',
                             null, 9000, 'success', options);
                             
                            //start login 
                               Metro.session.setItem('userToken',res.data.token);
                               Metro.session.setItem('userId',res.data.id);
                               Metro.session.setItem('userName',res.data.username);
                               Metro.activity.close(activity);
                               this.$router.push({name: "homepage"});
                          }
                    })
                    .catch(error =>{
                        Metro.activity.close(activity);
                      console.log('err',error)
                    })

        }else{
            var options = {
                                showTop: true,
                            }
            Metro.toast.create('An error occured. Try again',
                             null, 9000, 'alert', options);
                             Metro.activity.close(activity);

        
        }
         })
        .catch(error=>{
          console.log(error)
          Metro.activity.close(activity);
            console.log('err res',error.response.data.errors)
    
          if(error.response.status == 422){
         
            var options = {
                   showTop: true,
            }
            var err = error.response.data.errors
            if(err.email){
                Metro.toast.create(err.email[0],
                            null, 5000, 'yellow', options);
              }
              if(err.username){
                Metro.toast.create(err.username[0],
                            null, 5000, 'yellow');
              }

          }else{
             Metro.toast.create('Please check your data and try again',
                             null, 9000, 'alert');
          } 

        })
          
             }else{
               console.log('vee errors exist')
               //val err
               //do nothing, vee val got u
             }
             })//val
            
     }, //reg


                  loggedIn(){
                      if(Metro.session.getItem('userToken')){
                        var notify = Metro.notify;
                            notify.setup({
                                width: 300,
                                duration: 1000,
                                timeout: 6000,
                                animation: 'easeOutBounce'
                            });
                            notify.create("You are already logged in.");
                            notify.reset();
                        this.$router.push({name: "homepage"});
                      }
                  },




            },
           
        }
    </script>
    