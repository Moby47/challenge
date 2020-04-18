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
        
                <h3 class="text-center white-color"> Selected Dares</h3>
    
                <table class="table row-hover table-border white-color">
                        <thead>
                        <tr>
                             <th class='white-color'>Dare</th>
                            <th class='white-color'>Countdown</th>
                        </tr>
                        </thead>
                        <tbody>
                                <tr>
                                        <td>learn a javascript programming syntax</td>
                                        <td> 
                              <div data-role="countdown"  data-date="18/04/2020"
                            data-days="1"
                            data-hours="2"
                            data-minutes="3"
                            data-seconds="4"></div>
                        </td>
                                    </tr>
                                    <tr>
                                            <td>watch a scary movie</td>
                                            <td> 
                                                    <div data-role="countdown"  data-date="18/04/2020"
                                                  data-days="1"
                                                  data-hours="2"
                                                  data-minutes="3"
                                                  data-seconds="4"></div>
                                              </td>
                                    </tr>
                        </tbody>
                    </table>

                    <div class="remark success text-center">
                            <router-link to='/upload-dare'> Click here to upload a Dare</router-link>
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
    