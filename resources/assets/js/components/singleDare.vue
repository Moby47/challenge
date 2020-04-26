<template>

    <div>


          
        <div class="desktop">
                <div class="window-area scroll">
                    <!-- content here-->
                    <div class="container white-color">
        
                            <h3 class="text-center">  </h3>
            
                            <div class="grid">
                     
                                    <div class="row">
                            <!--left-->
                                        <div class="cell-sm-full cell-md-one-third cell-lg-7">
                            
                                              
                      <template>
                         <v-container class="grey lighten-5">
                                                          <v-row no-gutters>
                                                            <v-col
                                                              cols="12"
                                                              sm="12"
                                                            >
                                                              <v-card
                                                                class="pa-2"
                                                                outlined
                                                                tile
                                                              >
                        
                                         
                                              <div class="card-header">
                                             <video data-role="video"
                                             data-src="https://metroui.org.ua/res/oceans.mp4"
                                             data-poster="/images/home.svg"
                                             data-aspect-ratio="hd"
                                              ></video>
                                                       </div>
                                               <div class="card-content p-2">
                                            10 push ups
                            <p class="fg-gray">21 views. 470 likes. 7 shares</p>
                                                                  </div>
                                           
                            <button class="button fg-white"  style="background-color: #1ba1e2"
                                                                   id="dropdown_toggle_1">Comments</button>
                                                                  <div class="pos-relative">
                                                                      <div
                                                                              data-role="dropdown"
                                                                              data-toggle-element="#dropdown_toggle_1">
                                                                          <p class="p-10 text-center">
                                                                              In Metro 4 you can transform any element to dropdown.
                                                                              In Metro 4 you can transform any element to dropdown.
                                                                              In Metro 4 you can transform any element to dropdown.
                                                                              In Metro 4 you can transform any element to dropdown.
                                                                              In Metro 4 you can transform any element to dropdown.
                                                                              In Metro 4 you can transform any element to dropdown.
                                                                              In Metro 4 you can transform any element to dropdown.
                                                                              In Metro 4 you can transform any element to dropdown.
                                                                              In Metro 4 you can transform any element to dropdown.
                                                                              In Metro 4 you can transform any element to dropdown.
                                                                          </p>
                                                                      </div>
                                                                  </div>
                                                              
                                  <span class="badge inside  fg-white"
                              style="background-color: #b82943">player's username</span>
                        
                                                              </v-card>
                                                            </v-col>
                                                          </v-row>
                                                        </v-container>
                                                      </template>     
                                        
                
                            
                                        </div> <!--left side-->
                            
            
            
            <!--right-->
                                        <div class="cell-sm-full cell-md-two-third cell-lg-4" >
            
                                                <template>
                                                        <v-container class="grey lighten-5">
                                                          <v-row no-gutters>
                                                            <v-col
                                                            v-for='i in 6' v-bind:key='i'
                                                              cols="12"
                                                              sm="12"
                                                            >
                                                              <v-card
                                                                class="pa-2"
                                                                outlined
                                                                tile
                                                              >
                        
                                                              <div class="card image-header">
                                                                  <div class="card-header fg-yellow"
                                                                     style="background-image: url(/images/home.svg)">
                                                                      4:07
                                                                  </div>
                                                                  <div class="card-content p-2">
                                                                     10 push ups
                                                <p class="fg-gray">21 views. 470 likes. 7 shares</p>
                                                                  </div>
                                                              </div>
                                                              
                                                              <span class="badge inside  fg-white"
                                                              style="background-color: #b82943">player's username</span>
                        
                                                              </v-card>
                                                            </v-col>
                                                          </v-row>
                                                        </v-container>
                                                      </template>
                                            <!--
                                                <h4 class="text-center">  </h4>
            
                                                    <div class="row flex-align-center cell-lg-12">
                                                        <div class="cell"></div>
                                                        <div class="cell">
                                                              
                                                                <template>
                                                                        <v-card
                                                                          class="mx-auto"
                                                                          max-width="344"
                                                                        >
                                                                        <video data-role="video"
                                                                data-src="https://metroui.org.ua/res/oceans.mp4"
                                                                data-logo="https://metroui.org.ua/images/logo4.png"
                                                                data-logo-height="64"
                                                                data-logo-target="https://metroui.org.ua/v4/"
                                                                data-poster="https://metroui.org.ua/res/poster-oceans.jpg"
                                                                data-aspect-ratio="hd"
                                                                
                                                                 ></video>
                                                                      
                                                                          <v-card-title>
                                                                                <div class="card-footer">
                                                                                        <button class="flat-button mif-thumbs-up "> 47</button>
                                                                                        <button class="flat-button mif-comment "> 7</button>
                                                                                        <button class="flat-button mif-eye "> 4</button>
                                                                                        <button class="flat-button mif-share "> 4</button>
                                                                                    </div>
                                                                          </v-card-title>
                                                                      
                                                                          <v-card-subtitle>
                                                                                <figcaption class="mt-1 text-center">
                                                         <router-link to='/single-dare' class=''>A full title of the dare. 
                                                            A full title of the dare.   A full title of the dare.
                                                                                        </router-link> 
                                                                               </figcaption>
                                                                          </v-card-subtitle>
                                                                      
                                                                        </v-card>
                                                                      </template>
                                                                      <span class="badge inside  fg-white"
                                                                      style="background-color: #b82943">player's username</span>
                                                        
                                        
                                                        </div>
                                                        <div class="cell"></div>
                                                    </div>
            
            
                                                    
            
                                                    <div class="row flex-align-center cell-lg-12">
                                                            <div class="cell"></div>
                                                            <div class="cell">
                                                                    <template>
                                                                            <v-card
                                                                              class="mx-auto"
                                                                              max-width="344"
                                                                            >
                                                                            <video data-role="video"
                                                                    data-src="https://metroui.org.ua/res/oceans.mp4"
                                                                    data-logo="https://metroui.org.ua/images/logo4.png"
                                                                    data-logo-height="64"
                                                                    data-logo-target="https://metroui.org.ua/v4/"
                                                                    data-poster="https://metroui.org.ua/res/poster-oceans.jpg"
                                                                    data-aspect-ratio="hd"
                                                                    
                                                                     ></video>
                                                                          
                                                                              <v-card-title>
                                                                                    <div class="card-footer">
                                                                                            <button class="flat-button mif-thumbs-up "> 47</button>
                                                                                            <button class="flat-button mif-comment "> 7</button>
                                                                                            <button class="flat-button mif-eye "> 4</button>
                                                                                            <button class="flat-button mif-share "> 4</button>
                                                                                        </div>
                                                                              </v-card-title>
                                                                          
                                                                              <v-card-subtitle>
                                                                                    <figcaption class="mt-1 text-center">
                                                             <router-link to='/single-dare' class=''>A full title of the dare. 
                                                                A full title of the dare.   A full title of the dare.
                                                                                            </router-link> 
                                                                                   </figcaption>
                                                                              </v-card-subtitle>
                                                                          
                                                                            </v-card>
                                                                          </template>
                                                                          <span class="badge inside  fg-white"
                                                                          style="background-color: #b82943">player's username</span>
                                                           
                                            
                                                            </div>
                                                            <div class="cell"></div>
                                                        </div>
                                                    -->
                                                  
                            
                                        </div><!--right side end-->
                            
                                     
                                    </div> <!--total row end-->
                                       
                            
                            
                                    </div>
            
            
            
                      
                        </div>
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
    
                }
            },
    
            methods: {

                home(){
                    this.$router.push({name: "index"});
                },

                menu(){
                    this.$router.push({name: "homepage"});
                },

                back(){
                    this.$router.go(-1)
                }
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
                    
                
                
                
                
                
                    //this.errors.clear()
                // this.$validator.reset()
             },1) 
            
             }); //validator
    */
            },
    
            mounted() {
                $(document).ready(function(){
                $(window).scrollTop(0);
            });
            }
        }
    </script>
    