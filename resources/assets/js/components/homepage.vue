<template>
    <div class="container">
    
            <h3 class="text-center"> WELCOME TO NERVE  </h3>

            
            <div class="tiles-grid">
                    <div data-role="tile" data-size="medium" class="col-1 row-11">
                            <span @click.prevent=''>  <span class="mif-chrome icon"></span>
                            <span class="branding-bar">Store</span>
                        </span>
                    </div>

                    <div data-role="tile" data-size="medium" class="col-3 row-11"
                     onclick="Metro.dialog.open('#suggest')">
                            <span @click.prevent=''>  <span class="mif-chrome icon"></span>
                            <span class="branding-bar">Suggest a Dare</span>
                        </span>
                    </div>

                    <div data-role="tile" data-size="wide" class="bg-red" @click.prevent='board'>
                            <span >  <span class="mif-chrome icon"></span>
                            <span class="branding-bar">Leader Board</span>
                            <span class="badge-bottom">10</span>
                        </span>
                    </div>

          <div data-role="tile" data-size="large" class="bg-orange" data-effect="hover-slide-left" @click.prevent='dares()'>
                          <span >  <span class="mif-chrome icon"></span>
                            <span class="branding-bar">Watch Dares</span>
                         <!--   <div class="slide-back d-flex flex-justify-center flex-align-center p-4 op-mauve">
                                    <p class="text-center">
                                        Bubos mori in moscua! Tumultumque de brevis historia, aperto heuretes!
                                    </p>
                                </div>-->
                            <span class="badge-bottom">1047</span>
                        </span>
                    </div>

                    <div data-role="tile" data-size="medium" class="bg-teal">
                            <span @click.prevent=''>  <span class="mif-chrome icon"></span>
                            <span class="branding-bar">Search Nerve</span>
                        </span>
                    </div>
                    
                    <div data-role="tile" data-size="medium" class="bg-brown" onclick="Metro.dialog.open('#player')">
                            <span @click.prevent=''>  <span class="mif-chrome icon"></span>
                            <span class="branding-bar">Become a Player</span>
                        </span>
                    </div>

                    <div data-role="tile" data-size="wide" class="bg-cyan" @click.prevent='list()'>
                            <span >  <span class="mif-chrome icon"></span>
                            <span class="branding-bar">Dare List</span>
                            <span class="badge-bottom">106</span>
                        </span>
                    </div>
                </div>



                <!--dialogs suggest-->
                <div class="dialog" data-role="dialog" id='suggest'>
                        <div class="dialog-title">Your Dare Can Be On Nerve</div>
                        <div class="dialog-content">
                                <input type="text" data-role="input" data-prepend="User name: " data-history="true">
                                
                                <p>Describe Dare:</p>
                     <textarea data-role="textarea" data-history="true"></textarea>
                        </div>
                        <div class="dialog-actions">
                            <button class="button ">Send</button>
                            <button class="button primary js-dialog-close">Close</button>
                        </div>
                    </div>


                      <!--dialogs login-->
                <div class="dialog" data-role="dialog" id='player'>
                        <div class="dialog-title">Please Login To Continue</div>
                        <div class="dialog-content">
                                <input type="text" data-role="input" data-prepend="User name: " data-history="true">
                                <br>
                                <input type="password" data-role="input" data-prepend="Password: ">

                                <p class='text-right'><button class="image-button" @click.prevent='newPlayer()'>
                                        <span class="mif-share icon"></span>
                                        <span class="caption">New Player?</span>
                                    </button></p>
                        </div>
                        <div class="dialog-actions">
                            <button class="button ">Ok</button>
                            <button class="button primary js-dialog-close">Close</button>
                        </div>
                    </div>

                      <!--dialogs reg-->
                <div class="dialog" data-role="dialog" id='newPlayer'>
                        <div class="dialog-title">Please Login To Continue</div>
                        <div class="dialog-content">
                                <input type="text" data-role="input" data-prepend="User name: " data-history="true">
                                <br>
                                <input type="password" data-role="input" data-prepend="Password: ">

                                <p class='text-right'><button class="image-button" @click.prevent='oldPlayer'>
                                        <span class="mif-share icon"></span>
                                        <span class="caption">Old Player?</span>
                                    </button></p>
                        </div>
                        <div class="dialog-actions">
                            <button class="button ">Ok</button>
                            <button class="button primary js-dialog-close">Close</button>
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

        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
