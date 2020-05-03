<template>
        <div>

            
        <div class="desktop">
                <div class="window-area">
                    <!-- content here   <vue-particles 
                    color="#00B0FF"
                    shapeType="star"
                    linesColor="#00B0FF"
                    :particleSize="5"
                    >
                    </vue-particles>-->

                  
        
            <div class="container fadeIn">
            
                    <h3 class="text-center white-color"> Select a Dare</h3>
        
                    <span v-if='empty'>
                            <div class="remark info text-center">
                                    Dare list is currently empty
                                 </div>
                    </span>
            
                    <template v-if='loading'>
                            <v-sheet
                              :color="`grey`"
                              class="px-3 pt-3 pb-3"
                            >
                              <v-skeleton-loader
                                class="mx-auto"
                                max-width="auto"
                                type="action, sentences@4"
                              ></v-skeleton-loader>
                            </v-sheet>
                          </template>
    
                          <span v-else>
                   <p data-role="hint" 
                   data-hint-text="Selected dares are added to your Dare list."
                    data-hint-position="top">
                    <select data-role="select" v-model='selected'>
                            <option selected class="text-bold" :value='con.dare_name'
                            v-for='con in content' v-bind:key='con.id'>
                            {{con.dare_name}}</option>
                        </select></p>
    
                        <div class="remark info text-center">
                            <router-link to='/pending-dares'> Click here to view your Dare list</router-link>
                         </div>
    
    
                         <div class="remark success text-center">
                                 <router-link to='/upload-dare'> Click here to upload a Dare</router-link>
                              </div>
                    </span>
    
                       
    
                                
                    
            </div>

                </div>
                <taskbar></taskbar>
            </div>
    
             
        </div>
    </template>
    
    
    <script>
        export default {
    
            data(){
                return {
                    content:[],
                    empty:false,
                    loading:false,
                    selected:'',
                }
            },
            mounted() {
                $(document).ready(function(){
                    $(window).scrollTop(0);
                });
                
                this.get()

                this.notify()
                },

                methods: {

        

                    get(){
                        this.loading = true
                    fetch('/api/dropdown-dare-list')
                    .then(res => res.json())
                    .then(res=>{
                        this.content = res.data;
                    this.loading = false
                    console.log(this.content)
                    
                    //to determine if obj is empty 
                            console.log(res.data[0]);
                            if(res.data[0] == undefined){
                                this.empty = true;
                            }else{
                                this.empty = false;
                            }
                    //to determine if obj is empty
                    
                    })
                    .catch(error =>{
                    console.log(error)
                        //off loader
                        this.loading = false
                        var options = {
                                showTop: true,
                            }
                         Metro.toast.create('A temporary network error occured... Please reload page',
                         null, 5000, 'yellow', options);
                    
                        })
                    },

                

                Pmenu(){
                    this.$router.push({name: "playerHomepage"});
                },

                back(){
                    this.$router.go(-1)
                },

                notify(){
                    var pick = Metro.session.getItem('pickedDare')
    
                        if(pick){
                            //old guest, do nothing
                        }else{
                            //new guest:
                            //notify and save key
                            var notify = Metro.notify;
                            notify.setup({
                                width: 300,
                                duration: 1000,
                                timeout: 10000,
                                animation: 'easeOutBounce'
                            });
                            notify.create("Pick dares you want to try out. A maximum of 5 dares at a time");
                            notify.reset();
    
                            Metro.session.setItem('pickedDare','pickedDare')
                        }
                },

            },
    
            watch:{
                selected(a,b){
             if(a){

              console.log('selected vendor')

              var dia = confirm('Add the Dare: ' + this.selected + '?')

              if (dia){

                var activity =  Metro.activity.open({
                    type: 'square',
                    overlayClickClose: false,
                    text: '<div class=\'mt-2 text-small  text-white\'>Please, wait...</div>',
                })

                var input = {'darename':this.selected, 'userid':Metro.session.getItem('userId')};
                    axios.post('/api/add-mydare',input)
                    .then(res => {
                    var result = res.data;

                    var options = {
                                showTop: true,
                            }

                         if(result == 1){
                            Metro.toast.create(' Dare added  Successfuly!',
                             null, 5000, 'success', options);
                               Metro.activity.close(activity);
                          }else if(result == 2){
                            Metro.toast.create('Complete your 5 selected dares, then you can select more',
                             null, 5000, 'info', options);
                             Metro.activity.close(activity);
                          }else if(result == 3){
                            Metro.toast.create('You added this dare already',
                             null, 5000, 'yellow', options);
                             Metro.activity.close(activity);
                          }else if(result == 4){
                            Metro.toast.create('This Dare has expired',
                             null, 5000, 'alert', options);
                             Metro.activity.close(activity);
                          }else if(result == 5){
                            Metro.toast.create('You completed this Dare already',
                             null, 5000, 'info', options);
                             Metro.activity.close(activity);
                          }else{
                            Metro.toast.create('Adding failed. Refresh and try again',
                             null, 5000, 'alert', options);
                             Metro.activity.close(activity); 
                          }
                    })
                    .catch(error =>{
                        Metro.activity.close(activity);
                      console.log(error)
                      var options = {
                                showTop: true,
                            }
                         Metro.toast.create('A temporary network error occured... Please reload page',
                         null, 5000, 'yellow', options);
                       
                    })
              }//if yes
               
              }
             }, //selected meth

            }//watcher
           
        }
    </script>
    