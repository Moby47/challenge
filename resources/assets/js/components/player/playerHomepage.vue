<template>
        <div>
                <vue-particles 
                color="#00B0FF"
                shapeType="star"
                linesColor="#00B0FF"
                :particleSize="5"
                >
                </vue-particles>
    
        <div class="container">
        
                <h3 class="text-center">   </h3>
    
                
                <div class="tiles-grid mt-5">
                        <div data-role="tile" data-size="medium" class="col-1 row-11 fadeIn ani-hover-horizontal">
                                <span onclick="Metro.charms.toggle('#charm')">
                                      <span class="mif-more-vert icon"></span>
                                <span class="branding-bar">More Options</span>
                            </span>
                        </div>
    
                        <div data-role="tile" data-size="medium" class="col-3 bg-teal row-11 fadeIn ani-hover-horizontal">
                                <span @click.prevent='board()'>  <span class="mif-clipboard icon"></span>
                                <span class="branding-bar">Leader Board</span>
                            </span>
                        </div>
    
                        <div data-role="tile" data-size="wide"  class='fadeIn ani-hover-horizontal'>
                                <span @click.prevent='pick()'>  <span class="mif-add icon"></span>
                                <span class="branding-bar">Pick a Dare</span>
                                <span class="badge-bottom">{{dare_count}}</span>
                            </span>
                        </div>
    
              <div data-role="tile" data-size="large" class=" fadeIn ani-hover-horizontal"
               data-effect="hover-slide-left"  style="background-color: #b82943">
                              <span  @click.prevent='pendingDares()'>  <span class="mif-alarm icon"></span>
                                <span class="branding-bar">Pending dares</span>
                           
                                <span class="badge-bottom">{{pending_dares_count}}</span>
                            </span>
                        </div>
    
                        <div data-role="tile" data-size="wide" class="bg-teal fadeIn ani-hover-horizontal" >
                                <span @click.prevent='upload()'>  <span class="mif-file-upload icon"></span>
                                <span class="branding-bar">Upload Dare</span>
                            </span>
                        </div>
                        
                        <!--<div data-role="tile" data-size="medium"  class='fadeIn ani-hover-horizontal bg-teal'>
                        <span onclick="Metro.dialog.open('#search')">  <span class="mif-search icon"></span>
                                <span class="branding-bar">Search</span>
                            </span>
                        </div>-->
    
                        <div data-role="tile" data-size="wide"
                        class='fadeIn ani-hover-horizontal bg-orange'>
                        <span  @click.prevent='dares()'>  <span class="mif-file-video icon"></span>
                                <span class="branding-bar">Watch Dares</span>
                                <span class="badge-bottom">106</span>
                            </span>
                        </div>
                    </div>
    
    
                    <div data-role="charms" data-opacity="0.8" id='charm' data-position="right">
                        
                        
                            <ul class="sidebar-menu white-color">
                                  
                                    <li><router-link to='/store'> <span class="mif-cart icon"></span> Store</router-link></li>
                                    <li class="divider"></li>
                                    <li><a href='#' @click.prevent='logout()'><span class="mif-settings-power icon"></span> Logout</a></li>
                                    <li class="divider"></li>
                                     <li><router-link to='/homepage'> <span class="mif-menu icon"></span> 
                                        Main Menu</router-link></li>
                                    <li class="divider"></li>
                                    <li><router-link to='/'><span class="mif-home icon"></span> Home Screen</router-link></li>
                                    
                                </ul>
    
                    </div>
    
                       
        </div>
        </div>
    </template>
    
    
    <script>
        export default {
    
            data(){
                return {
                    dare_count:'',
                    pending_dares_count:'',
                }
            },
            mounted() {
                $(document).ready(function(){
                    $(window).scrollTop(0);
                });
    
                //notification for neebies
                this.notify()

                this.get_dare_count()
                this.get_pending_dare_count()
               
            },
            
            methods: {
    
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
                            notify.create("Welcome, Player! Explore more options on this page.");
                            notify.reset();
    
                            Metro.session.setItem('player','player')
                        }
                },
                
                logout(){
                    var activity =  Metro.activity.open({
                    type: 'metro',
                    overlayClickClose: false,
                    text: '<div class=\'mt-2 text-small\'>Please, wait...</div>',
                })
                Metro.session.delItem('userToken');
                               Metro.session.delItem('userId');
                               Metro.session.delItem('userName');
                    
                   Metro.activity.close(activity);
                    this.$router.push({name: "homepage"});
                    },


                    get_dare_count(){
                    fetch('/api/count-dares')
                    .then(res => res.json())
                    .then(res=>{
                        this.dare_count = 47//res.data;
                    
                    
                    })
                    .catch(error =>{
                    console.log(error)
                        })
                    },

                    get_pending_dare_count(){
                        fetch('/api/count-my-pending-dares/'+Metro.session.getItem('userId'))
                    .then(res => res.json())
                    .then(res=>{
                        this.pending_dares_count = 47//res.data;
                    
                    
                    })
                    .catch(error =>{
                    console.log(error)
                        })
                    }
            },
    
           
        }
    </script>
    