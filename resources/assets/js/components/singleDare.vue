<template>
        <div class="container">
        
                <h3 class="text-center"> TITLE OF DARE  </h3>

                <div class="grid">
         
                        <div class="row">
                
                            <div class="cell-sm-full cell-md-one-third cell-lg-7">
                
                                    <video data-role="video"
                                    data-src="https://metroui.org.ua/res/oceans.mp4"
                                    data-logo="https://metroui.org.ua/images/logo4.png"
                                    data-logo-height="64"
                                    data-logo-target="https://metroui.org.ua/v4/"
                                    data-poster="https://metroui.org.ua/res/poster-oceans.jpg"
                                    data-aspect-ratio="hd"
                                     ></video>
    
                                     <div class="card-footer">
                                            <button class="flat-button mif-thumbs-up"> 47</button>
                                            <button class="flat-button mif-comment"> 7</button>
                                            <button class="flat-button mif-eye"> 4</button>
                                            <button class="flat-button mif-share"> 4</button>
                                        </div>
                                     <figcaption class="mt-1">
                                         A full title of the dare. A full title of the dare.<b>4hrs ago</b> 
                                        
                                 <span class="badge inside bg-pink fg-white">player's username</span></figcaption>
    
                
                            </div> <!--left side-->
                



                            <div class="cell-sm-full cell-md-two-third cell-lg-4 offset-1">

                                    <h4 class="text-center"> Other Dares  </h4>

                                        <div class="row flex-align-center cell-lg-12">
                                            <div class="cell"></div>
                                            <div class="cell">
                                                  
                                                            <video data-role="video"
                                                            data-src="https://metroui.org.ua/res/oceans.mp4"
                                                            data-logo="https://metroui.org.ua/images/logo4.png"
                                                            data-logo-height="64"
                                                            data-logo-target="https://metroui.org.ua/v4/"
                                                            data-poster="https://metroui.org.ua/res/poster-oceans.jpg"
                                                            data-aspect-ratio="cinema"
                                                             ></video>
                                                             <figcaption class="mt-1 text-center">
                                                                    <router-link to='/single-dare'>A full title of the dare. A full title of the dare. <b>4hrs ago</b>
                                                                        </router-link>
                                                         <span class="badge inside bg-pink fg-white">player's username</span></figcaption>
                            
                                            </div>
                                            <div class="cell"></div>
                                        </div>


                                        

                                        <div class="row flex-align-center cell-lg-12">
                                                <div class="cell"></div>
                                                <div class="cell">
                                                      
                                                                <video data-role="video"
                                                                data-src="https://metroui.org.ua/res/oceans.mp4"
                                                                data-logo="https://metroui.org.ua/images/logo4.png"
                                                                data-logo-height="64"
                                                                data-logo-target="https://metroui.org.ua/v4/"
                                                                data-poster="https://metroui.org.ua/res/poster-oceans.jpg"
                                                                data-aspect-ratio="cinema"
                                                                 ></video>
                                                                 <figcaption class="mt-1 text-center">
                                                                        <router-link to='/single-dare'>A full title of the dare. A full title of the dare. <b>4hrs ago</b>
                                                                            </router-link>
                                                             <span class="badge inside bg-pink fg-white">player's username</span></figcaption>
                                
                                                </div>
                                                <div class="cell"></div>
                                            </div>
                                            
                                      
                
                            </div><!--right side end-->
                
                         
                        </div> <!--total row end-->
                           
                
                
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
    