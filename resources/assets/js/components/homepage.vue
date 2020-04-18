<template>
    <div>
            <vue-particles 
            color="#ffffff"
            shapeType="edge"
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

                    <div data-role="tile" data-size="medium" class="col-3 row-11 bg-teal fadeIn ani-hover-horizontal">
                            <span onclick="Metro.dialog.open('#suggest')" >  <span class="mif-compass2 icon"></span>
                            <span class="branding-bar">Suggest a Dare</span>
                        </span>
                    </div>

                    <div data-role="tile" data-size="wide"  class='fadeIn ani-hover-horizontal'>
                            <span @click.prevent='board()'>  <span class="mif-clipboard icon"></span>
                            <span class="branding-bar">Leader Board</span>
                            <span class="badge-bottom">10</span>
                        </span>
                    </div>

          <div data-role="tile" data-size="large" class="bg-orange fadeIn ani-hover-horizontal"
           data-effect="hover-slide-left">
                          <span  @click.prevent='dares()'>  <span class="mif-file-video icon"></span>
                            <span class="branding-bar">Watch Dares</span>
                       
                            <span class="badge-bottom">1047</span>
                        </span>
                    </div>

                    <div data-role="tile" data-size="medium" class="bg-teal fadeIn ani-hover-horizontal" >
                            <span onclick="Metro.dialog.open('#search')">  <span class="mif-search icon"></span>
                            <span class="branding-bar">Search Nerve</span>
                        </span>
                    </div>
                    
                    <div data-role="tile" data-size="medium" 
                    style="background-color: #b82943" class='fadeIn ani-hover-horizontal'>
                            <span onclick="Metro.dialog.open('#oldPlayer')">  <span class="mif-gamepad icon"></span>
                            <span class="branding-bar">Become a Player</span>
                        </span>
                    </div>

                    <div data-role="tile" data-size="wide"  style="background-color: #b82943"
                    class='fadeIn ani-hover-horizontal'>
                            <span @click.prevent='list()'>  <span class="mif-list icon"></span>
                            <span class="branding-bar">Dare List</span>
                            <span class="badge-bottom">106</span>
                        </span>
                    </div>
                </div>


                <div data-role="charms" data-opacity="0.8" id='charm' data-position="right">
                    
                    
                        <ul class="sidebar-menu white-color">
                              
                                <li><router-link to='/store'> <span class="mif-cart icon"></span> Store</router-link></li>
                                <li class="divider"></li>
                                <li><router-link to='/help'> <span class="mif-help icon"></span> How to Play</router-link></li>
                                <li class="divider"></li>
                                <li><router-link to='/rules'> <span class="mif-books icon"></span> Rules</router-link></li>
                                <li class="divider"></li>
                                <li><router-link to='/player-homepage'> <span class="mif-menu icon"></span> 
                                Player Menu</router-link></li>
                                <li class="divider"></li>
                                <li><a href='mailto:honred47@yahoo.com'> <span class="mif-mail icon"></span> Contact Us</a></li>
                                <li class="divider"></li>
                                <li><router-link to='/'><span class="mif-home icon"></span> Home Screen</router-link></li>
                                
                            </ul>

                </div>

                <!--dialogs suggest-->
                <div class="dialog " data-role="dialog" id='suggest' >
                        <div class="dialog-title white-color" style="background-color: #07557B">Suggest a Dare</div>
                        <div class="dialog-content">
                                <p>User name:</p>    
                            <input type="text" data-role="input" data-history="true">
                                
                     <textarea data-role="textarea" data-history="true"></textarea>
                        </div>
                        <div class="dialog-actions">
                            <button class="button primary">Send</button>
                            <button class="button alert js-dialog-close">Cancel</button>
                        </div>
                    </div>


                       <!--dialogs login-->
  <div class="dialog" data-role="dialog" id='oldPlayer'>
        <div class="dialog-title white-color" style="background-color: #07557B">Please Login To Continue</div>
        <div class="dialog-content">
            <p>User name:</p>
                <input type="text" data-role="input" data-history="true">
               <p>Password:</p>
                <input type="password" data-role="input">

                <p class='text-right'><button class="image-button" @click.prevent='newPlayer()'>
                        <span class="mif-user-plus icon"></span>
                        <span class="caption">New Player?</span>
                    </button></p>
        </div>
        <div class="dialog-actions">
            <button class="button primary">Ok</button>
            <button class="button alert js-dialog-close">Cancel</button>
        </div>
    </div>

      <!--dialogs reg-->
<div class="dialog" data-role="dialog" id='newPlayer'>
        <div class="dialog-title white-color" style="background-color: #07557B">Start New Game</div>
        <div class="dialog-content">
                <p>User name:</p>
                <input type="text" data-role="input" data-history="true">
                <p>Email:</p>
                <input type="email" data-role="input" data-history="true">
               <p>Password:</p>
                <input type="password" data-role="input">

                <p class='text-right'><button class="image-button" @click.prevent='oldPlayer()'>
                        <span class="mif-user icon"></span>
                        <span class="caption">Old Player?</span>
                    </button></p>
        </div>
        <div class="dialog-actions">
            <button class="button primary">Ok</button>
            <button class="button alert js-dialog-close">Cancel</button>
        </div>
    </div>


                      <!--dialogs search-->
                <div class="dialog" data-role="dialog" id='search'>
                      
                    <div class="dialog-title white-color" style="background-color: #07557B">
                        Search</div>


                        <div class="dialog-content">
                            <p>Search by Player's username</p>
                            <input type="text" data-role="input"
                            placeholder="Enter Username" data-autocomplete="Ukraine, USA, Canada, Marokko, Singapur">
                                <br>
                                <button class="button primary">Find</button>
                        </div>

                        <hr>

                        
                        <div class="dialog-content">
                                <p>Filter by Dares</p>
                                <select data-role="select">
                                        <option class="fg-cyan">One</option>
                                        <option selected class="text-bold fg-red">Two</option>
                                        <option class="fg-green">Three</option>
                                    </select>
                        </div>

                        <div class="dialog-actions">
                            <button class="button alert js-dialog-close">Close</button>
                        </div>
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
            $(document).ready(function(){
                $(window).scrollTop(0);
            });

            //notification for neebies
            this.notify()
           
        },
        
        methods: {

            dares(){
                this.$router.push({name: "dares"});
            },

            board(){
                this.$router.push({name: "leaderBoard"});
            },
            list(){
                this.$router.push({name: "dareList"});
            },
            newPlayer(){
                Metro.dialog.close('#oldPlayer')
                Metro.dialog.open('#newPlayer')
            },
            oldPlayer(){
                Metro.dialog.close('#newPlayer')
                Metro.dialog.open('#oldPlayer')
            },

            notify(){
                var wel = Metro.session.getItem('welcome')

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
                        notify.create("Welcome to Nerve. Explore all options from this page.");
                        notify.reset();

                        Metro.session.setItem('welcome','welcome')
                    }
            },
            
/*
            this.$validator.validateAll().then(() => {
           
           if (!this.errors.any()) {
            //
            }else{
            //
            }
         
                    //
            })
            .catch(err=>{
                
            }),
      
         setTimeout(func=>{
             //this.errors.clear()
            // this.$validator.reset()
         },1) 
        
         }); //validator
*/
        },

       
    }
</script>
