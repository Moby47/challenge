<template>
        <div class="container white-color">
        
                <h3 class="text-center"> Full title of the dare </h3>

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
                                         A full title of the dare. A full title of the dare. <b> 4hrs ago</b> 
                                        
                                 <span class="badge inside fg-white"
                                 style="background-color: #fa6800">player's username</span></figcaption>
    
                
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
                                                                    <router-link to='/single-dare'
                                                                    class='white-color'>A full title of the dare. A full title of the dare. <b>4hrs ago</b>
                                                                        </router-link>
                                                         <span class="badge inside fg-white"
                                                         style="background-color: #fa6800">player's username</span></figcaption>
                            
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
                                                                        <router-link to='/single-dare'
                                                                        class='white-color'>A full title of the dare. A full title of the dare. <b>4hrs ago</b>
                                                                            </router-link>
                                                             <span class="badge inside fg-white"
                                                             style="background-color: #fa6800">player's username</span></figcaption>
                                
                                                </div>
                                                <div class="cell"></div>
                                            </div>
                                            
                                      
                
                            </div><!--right side end-->
                
                         
                        </div> <!--total row end-->
                           
                
                
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







            <template>
     
                    <div class="container fadeIn index">
                    
                            <div class="bottom-nav pos-fixed">
                                    <button class="button"  @click.prevent='home()' style="background-color: #ebebeb">
                                            <span class="icon mif-home"></span>
                                            <span class="label">Home</span>
                                        </button>
                                    <button class="button"  @click.prevent='menu()' style="background-color: #ebebeb">
                                        <span class="icon mif-menu"></span>
                                        <span class="label">Menu</span>
                                    </button>
                                   
                                    <button class="button" style="background-color: #ebebeb" onclick="Metro.dialog.open('#search')">
                                        <span class="icon mif-search"></span>
                                        <span class="label">Search</span>
                                    </button>
                        
                                    <button class="button" style="background-color: #ebebeb"    @click.prevent='back()'>
                                            <span class="icon mif-backspace"></span>
                                            <span class="label">Back</span>
                                        </button>
                                </div>
            
                    </div>
                </template>


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
                console.log('Component mounted.')
            }
        }
    </script>
    