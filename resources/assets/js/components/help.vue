<template>
        <div>


            
        <div class="desktop">
                <div class="window-area">
                    <!-- content here  <div class='bg-help'></div>-->

                   
    
                    <div class="container fadeIn">
                   
                    
                            <div  data-role="accordion"
                            data-active-heading-class="bg-cyan fg-white"
                            data-active-content-class="bg-dark fg-white" >
                        <div class="frame active">
                            <div class="heading">Challenge App</div>
                            <div class="content">
                                <div class="p-2">
                                 Challenge is a fun game of <b> <strike>Truth</strike> or Dare</b>, without the Truth.
                                <br>
                                Play as a <router-link to='/dares'  style="background-color: #b82943; color:white; padding:3px; border-radius:6px">Watcher</router-link> 
                                and watch dares completed by Players
                                 <b>OR</b> be a Player 
                                and do a Dare.
                                </div>
                            </div>
                        </div>
                        <div class="frame">
                            <div class="heading">Dares</div>
                            <div class="content">
                                <div class="p-2">Complete a completely safe Dare listed by the Challenge App to:
                                    <ul>
                                        <li>Earn gold to spend in the Challenge store</li>
                                        <li>Get likes, views and climb the <router-link to='/leader-board' 
                                             style="background-color: #b82943; color:white; padding:3px; border-radius:6px">
                                            Leader Board</router-link></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="frame">
                            <div class="heading">Store</div>
                            <div class="content">
                                <div class="p-2">Browse through the Challenge App <router-link to='/store' 
                                    style="background-color: #b82943; color:white; padding:3px; border-radius:6px">store</router-link> and spend your earned Gold.</div>
                            </div>
                        </div>
                    </div>
    
                    
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
    
                }
            },
    
            mounted() {
            $(document).ready(function(){
                $(window).scrollTop(0);
            });

        },

            methods: {

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
    