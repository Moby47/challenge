<template>
        <div>
                <vue-particles 
                color="#00B0FF"
                shapeType="star"
                linesColor="#00B0FF"
                :particleSize="5"
                >
                </vue-particles>
    
        <div class="container fadeIn">
        
                <h3 class="text-center white-color"> Upload Dare</h3>
    
                <p>Select Dare</p>
               <p data-role="hint"
               data-hint-text="Select Dare you want to upload its video"
                data-hint-position="top">
                <select data-role="select">
                        <option class="fg-cyan">One</option>
                        <option selected class="text-bold fg-red">Two</option>
                        <option class="fg-green">Three</option>
                    </select></p>

<p>Video upload</p>
<input type="file" data-role="file" data-mode="drop">

<br>
<button class="button primary">Done</button>

                    <div class="remark info text-center">
                           <router-link to='/pending-dares'> Click here to view your pending Dares</router-link>
                          
                        </div>


                       
                             <template>
     
                                    <div class="container fadeIn index">
                                    
                                            <div class="bottom-nav pos-fixed">
                                                    <button class="button"  @click.prevent='home()' style="background-color: #ebebeb">
                                                            <span class="icon mif-home"></span>
                                                            <span class="label">Home Screen</span>
                                                        </button>
                                                    <button class="button"  @click.prevent='menu()' style="background-color: #ebebeb">
                                                        <span class="icon mif-menu"></span>
                                                        <span class="label">Main Menu</span>
                                                    </button>
                                                   
                                                    <button class="button" @click.prevent='Pmenu()'  style="background-color: #ebebeb">
                                                        <span class="icon mif-menu"></span>
                                                        <span class="label">Player Menu</span>
                                                    </button>
                                        
                                                    <button class="button" style="background-color: #ebebeb"  @click.prevent='back()'>
                                                            <span class="icon mif-backspace"></span>
                                                            <span class="label">Back</span>
                                                        </button>
                                                </div>
                            
                                    </div>
                                </template>
                

                                <div class="info-box" data-role="infobox" id='ad' data-width='550'>
                                        <span class="button square closer"></span>
                                 <div class="info-box-content">
                                       
                                    
                                    <div data-role="carousel"
                                        data-cls-bullet="bullet-big"
                                        data-auto-start="true"
                                        data-cls-controls="fg-white"
                                        data-bullets-position="right"
                                        data-period="3000"
                                        data-control-next="<span class='mif-chevron-right fg-cyan'></span>"
                                        data-control-prev="<span class='mif-chevron-left fg-cyan'></span>"
                                   >
                                      
                                       <div class="slide" data-cover="images/rules.svg">
                                      </div>
                                   
                                       <div class="slide p-2 pl-10 pr-10" data-cover="images/help.svg">
                                       </div>

                                       <div class="slide" data-cover="images/rules.svg">
                                       </div>
                                      
                                          <div class="slide p-2 pl-10 pr-10" data-cover="images/help.svg">
                                          </div>

                                   </div>


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

               setTimeout(function(){
                Metro.infobox.open('#ad')
               },5000)
            },
            
            methods: {
                home(){
                    this.$router.push({name: "index"});
                },

                menu(){
                    this.$router.push({name: "homepage"});
                },

                Pmenu(){
                    this.$router.push({name: "playerHomepage"});
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
    