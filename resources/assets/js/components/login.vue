<template>
        <div>
            
                <div class="desktop">
                        <div class="window-area scroll">
                            <!-- content here-->
                            <form class="login-form bg-white p-6 mx-auto border bd-default win-shadow" 
                            method="post" data-vv-scope='loginForm'>
                          <span class="mif-gamepad mif-4x place-right" style="margin-top: -10px;"></span>
                          <h2 class="text-light">Login</h2>
                          <hr class="thin mt-4 mb-4 bg-white">
                          <div class="form-group">
                              <input type="text" data-role="input" data-prepend="<span class='mif-user'>" placeholder="Enter your username..." 
                                  name="Username"  v-model='username' v-validate='"required|max:15"'>
                                    <p class='fg-red shake' v-show="errors.has('loginForm.Username')">{{ errors.first('loginForm.Username') }}</p>                          
                          </div>
                          <div class="form-group">
                              <input type="password" data-role="input" data-prepend="<span class='mif-key'>" placeholder="Enter your password..."
                                  name="Password"  v-model='password' v-validate='"required"'>
                             <p class='fg-red shake' v-show="errors.has('loginForm.Password')">{{ errors.first('loginForm.Password') }}</p>
                            
                          </div>
                          <div class="form-group mt-10">
                                <p class='text-right'><button class="image-button" @click.prevent='newPlayer()'>
                                        <span class="mif-user-plus icon"></span>
                                        <span class="caption">New Player?</span>
                                    </button></p>
                              <button class="button text-white" @click.prevent='login()'
                               style="background-color: #1ba1e2">Continue</button>
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
                newPlayer(){
                    this.$router.push({name: "register"});
               },
                dares(){
                    this.$router.push({name: "dares"});
                },
                board(){
                this.$router.push({name: "leaderBoard"});
                },
                pick(){
                    this.$router.push({name: "pickDare"});
                },
                pendingDares(){
                    this.$router.push({name: "pendingDares"});
                },
                upload(){
                    this.$router.push({name: "upload"});
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
                
                login(){
                          //validate specific reg fields
        this.$validator.validateAll('loginForm').then(() => {
             if (!this.errors.any()) {
            var activity =  Metro.activity.open({
                    type: 'square',
                    overlayClickClose: false,
                    text: '<div class=\'mt-2 text-small text-white\'>Please, wait...</div>',
                })

                    var input = {'username':this.username, 'password':this.password};
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
                         
                            Metro.toast.create('Login Successful!',
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
                      console.log(error)
                      /*
                      if(error.response.status == 422){
                    this.valerror = error.response.data.errors;
                    if(this.valerror){
                      this.$toasted.show("Please verify your email is correct...");
                    }
                  }*/
                    })
                  }else{ //if error
                    //error is auto shown, dont worry
                  } //if error
                })//val
              
                   }, //login


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
    