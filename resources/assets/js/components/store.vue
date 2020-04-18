<template>
        <div>

                <vue-particles 
                color="#ffffff"
                shapeType="polygon"
                :particleSize="2"
                >
                </vue-particles>
    
                <div class="container">
                <ul id="paintings"
                    data-role="list"
                    data-sort-class="painting-price"
                    data-sort-dir="desc"
                    data-cls-list="unstyled-list row flex-justify-center mt-4"
                    data-cls-list-item="cell-sm-6 cell-md-4"
                    class='white-color'
                >
                   
                    <li>
                        <figure class="text-center">
                            <div class="img-container thumbnail">
                                <img src="/images/bg-game.png" alt="Sezann, Players in cards">
                            </div>
                           <!-- <figcaption class="painting-name">Players in cards</figcaption> -->
                            <figcaption class="painting-author text-bold">Buy to remove Ads</figcaption>
                            <figcaption class="painting-price" data-format="money">$ 250M</figcaption>
                        </figure>
                    </li>
                    <li>
                            <figure class="text-center">
                                <div class="img-container thumbnail">
                                    <img src="/images/bg-game.png" alt="Sezann, Players in cards">
                                </div>
                               <!-- <figcaption class="painting-name">Players in cards</figcaption> -->
                                <figcaption class="painting-author text-bold">Buy to remove Ads</figcaption>
                                <figcaption class="painting-price" data-format="money">$ 250M</figcaption>
                            </figure>
                        </li>
                        <li>
                                <figure class="text-center">
                                    <div class="img-container thumbnail">
                                        <img src="/images/bg-game.png" alt="Sezann, Players in cards">
                                    </div>
                                   <!-- <figcaption class="painting-name">Players in cards</figcaption> -->
                                    <figcaption class="painting-author text-bold">Buy to remove Ads</figcaption>
                                    <figcaption class="painting-price" data-format="money">$ 250M</figcaption>
                                </figure>
                            </li>
                  
                </ul>
                
</div>



          <floating></floating>

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
    