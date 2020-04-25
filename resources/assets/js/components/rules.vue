<template>
        <div>

            
        <div class="desktop">
                <div class="window-area">
                    <!-- content here-->
                    <div class='bg-rules'></div>
    
                    <div class="container fadeIn">
                   
                    
                            <div  data-role="accordion"
                            data-active-heading-class="bg-cyan fg-white"
                            data-active-content-class="bg-dark fg-white">
                        <div class="frame active">
                            <div class="heading">Prohibited Content</div>
                            <div class="content">
                                <div class="p-2">
                              <ul>
                               <li> Sexually explicit  </li>
                               <li> Content depicting violence or dangerous acts</li>
                               <li>Content that promotes violence or hatred</li>
                               <li>Contents containing threats, bullying and harassment</li>
                              </ul>
                                </div>
                            </div>
                        </div>
                        <div class="frame">
                            <div class="heading">Rules</div>
                            <div class="content">
                                <div class="p-2">Complete a completely safe Dare listed by the App to:
                                    <ul>
                                        <li>Upload accurate videos related to the Dare</li>
                                      
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="frame">
                            <div class="heading">Conclusion</div>
                            <div class="content">
                                    <div class="p-2">
                               The total rules and regulations mentioned above apply to anyone on this platform.
                               Defaulters will have their accounts shutdown immediately.
                               By using this App, you agree to the terms and rules here.
                               </div>
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
    