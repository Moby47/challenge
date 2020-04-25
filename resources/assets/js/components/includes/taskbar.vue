<template>
    <div>
            <div class="task-bar">

                    <div data-role="charms" data-position="left" id="charm" class="p-4">
                            <div class="h-100 d-flex flex-column">
                                <div class="charm-top">
                                    <div class="text-center m-4">
                                        <span>Watcher</span>
                                    </div>
                                 
                                    <div class="charm-bottom mt-auto">
                                        <div class="d-flex">
                                            <div class="charm-tile bg-orange" @click.prevent='dares()'>
                                                <span class="icon mif-file-video"></span>
                                                <span class="caption">Watch Dares</span>
                                            </div>
                                            <div class="charm-tile" @click.prevent='list()' style="background-color: #1ba1e2">
                                                <span class="icon mif-list"></span>
                                                <span class="caption">Dare List</span>
                                            </div>
                                            <div class="charm-tile" @click.prevent='board()' style="background-color: #b82943">
                                                <span class="icon mif-clipboard"></span>
                                                <span class="caption">Dare Leaderboard</span>
                                            </div>
                                          
                                        </div>
                        
                                    </div>
                
                
                
                                    <div class="text-center m-4">
                                        <span>Player</span>
                                    </div>
                                 
                                    <div class="charm-bottom mt-auto">
                                        <div class="d-flex">
                                            <div class="charm-tile" @click.prevent='pickDare()'
                                             style="background-color: #1ba1e2">
                                                <span class="icon mif-add"></span>
                                                <span class="caption">Pick a Dare</span>
                                            </div>
                                            <div class="charm-tile bg-teal" @click.prevent='myDare()' 
                                            >
                                                <span class="icon mif-alarm"></span>
                                                <span class="caption">My Dares</span>
                                            </div>
                                            <div class="charm-tile " @click.prevent='upload()'>
                                                <span class="icon mif-file-upload"></span>
                                                <span class="caption">Upload Dare</span>
                                            </div>
                                            <div class="charm-tile " @click.prevent='logout()'v-if='isAuth()' style="background-color: #b82943">
                                                <span class="icon mif-power"></span>
                                                <span class="caption">Logout</span>
                                            </div>
                                            <div class="charm-tile " @click.prevent='upload()' v-else style="background-color: #b82943">
                                                    <span class="icon mif-gamepad"></span>
                                                    <span class="caption">Start Playing</span>
                                                </div>
                                        </div>
                        
                                    </div>
                
                
                
                                    <div class="text-center m-4">
                                            <span>General Options</span>
                                        </div>
                                     
                                        <div class="charm-bottom mt-auto">
                                            <div class="d-flex">
                                                <div class="charm-tile bg-purple">
                                                    <span class="icon mif-cart"></span>
                                                    <span class="caption">Store</span>
                                                </div>
                                                <div class="charm-tile bg-orange" >
                                                    <span class="icon mif-move_to_inbox"></span>
                                                    <span class="caption">Suggest Dare</span>
                                                </div>
                                       <div class="charm-tile" style="background-color: #b82943" @click.prevent='help()'>
                                                    <span class="icon mif-help"></span>
                                                    <span class="caption">How to Play</span>
                                                </div>
                                             
                                                
                                            </div>
                
                                            <div class="d-flex">
                                                    <div class="charm-tile bg-teal" @click.prevent='rules()'>
                                                            <span class="icon mif-books"></span>
                                                            <span class="caption">Rules</span>
                                                        </div>
                                                        <div class="charm-tile"  style="background-color: #1ba1e2">
                                                                <span class="icon mif-phone"></span>
                                                                <a href='mailto:honred47@yahoo.com' class='link'>
                                                                       <span class="caption">Contact Support</span> </a>
                                                              </div>
                                                    <div class="charm-tile" @click.prevent='menu()'>
                                                        <span class="icon mif-home"></span>
                                                        <span class="caption">Home</span>
                                                    </div>
                                                    <div class="charm-tile" @click.prevent='home()' style="background-color: #7e07ff">
                                                        <span class="icon mif-settings-power"></span>
                                                        <span class="caption">Exit</span>
                                                    </div>
                                                   
                                                    
                                                </div>


                            
                                        </div>
                
                                        
                        
                                </div>
                            </div>
                        </div>
            
            
                <div class="task-bar-section">
                    <button class="task-bar-item" onclick="Metro.charms.toggle('#charm')"><span class="mif-windows"></span></button>
            
                  
                </div>
            
            
              
            
            
                <div class="task-bar-section tasks"></div>
                <div class="task-bar-section system-tray ml-auto">
                <!-- <button class="task-bar-item" id="open-charm" onclick="Metro.charms.toggle('#charm2')">
                        <span class="mif-info"></span></button>
                    -->
                    <span style="line-height: 40px;" class="pr-4">
                        <span data-role="clock" class="w-auto fg-white reduce-1" data-show-date="false"></span>
                    </span>
            
                </div>
            </div>
    </div>
</template>



<script>
        export default {
    
            data(){
                return {
                  
                }
            },
            
            mounted() {
           

           },

            methods: {

                home(){
                    this.$router.push({name: "index"});
                },

                menu(){
                    this.$router.push({name: "homepage"});
                },

                dares(){
                    this.$router.push({name: "dares"});
                },

                board(){
                    this.$router.push({name: "leaderBoard"});
                },

                list(){
                    this.$router.push({name: "dareList"});
                },

                help(){
                    this.$router.push({name: "help"});
                },

                rules(){
                    this.$router.push({name: "rules"});
                },
                pickDare(){
                    if(this.isAuth()){
                        this.$router.push({name: "pickDare"});
                    }else{
                        this.$router.push({name: "login"});
                    }
                    
                },
                myDare(){
                    if(this.isAuth()){
                        this.$router.push({name: "pendingDares"});
                    }else{
                        this.$router.push({name: "login"});
                    }
                    
                },
                upload(){
                    if(this.isAuth()){
                        this.$router.push({name: "upload"});
                    }else{
                        this.$router.push({name: "login"});
                    }
                    
                },

                  //meth to check Auth
                  isAuth(){
                            if(Metro.session.getItem('userToken')){
                            // this.loggedOut = false;
                                return true;
                            }else{
                            // this.loggedOut = true;
                                return false;
                            }
                            },


                  logout(){
                    var activity =  Metro.activity.open({
                    type: 'square',
                    overlayClickClose: false,
                    text: '<div class=\'mt-2 text-small text-white\'>Please, wait...</div>',
                })
                Metro.session.delItem('userToken');
                 Metro.session.delItem('userId');
                Metro.session.delItem('userName');
                    this.isAuth()
                   Metro.activity.close(activity);
                   Metro.charms.close('#charm')
                    this.$router.push({name: "homepage"});
                    },

                    

            },
    
          
        }
    </script>
    