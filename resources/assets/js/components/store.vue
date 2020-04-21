<template>
        <div>

                
                        <div class='bg-store'></div>
    
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
                            <template>
                                    <v-card
                                      class="mx-auto"
                                      max-width="344"
                                      outlined
                                    >
                                      <v-list-item three-line>
                                        <v-list-item-content>
                                          <div class="overline mb-4">Remove Ads</div>
                                          <v-list-item-title class="headline mb-1">Purchase to remove Ads</v-list-item-title>
                                        </v-list-item-content>
                                  
                                        <v-list-item-avatar
                                          tile
                                          size="80"
                                          color="grey"
                                        > <v-img src="/images/store.svg"></v-img>
                                    </v-list-item-avatar>
                                      </v-list-item>
                                  
                                      <v-card-actions>
                                            <v-list-item-subtitle>47 Pts</v-list-item-subtitle>
                                        <v-btn color='green'>Buy</v-btn>
                                      </v-card-actions>
                                    </v-card>
                                  </template>
                    </li>
                    <li>
                            <template>
                                    <v-card
                                      class="mx-auto"
                                      max-width="344"
                                      outlined
                                    >
                                      <v-list-item three-line>
                                        <v-list-item-content>
                                          <div class="overline mb-4">Remove Ads</div>
                                          <v-list-item-title class="headline mb-1">Purchase to remove Ads</v-list-item-title>
                                        </v-list-item-content>
                                  
                                        <v-list-item-avatar
                                          tile
                                          size="80"
                                          color="grey"
                                        > <v-img src="/images/store.svg"></v-img>
                                    </v-list-item-avatar>
                                      </v-list-item>
                                  
                                      <v-card-actions>
                                            <v-list-item-subtitle>47 Pts</v-list-item-subtitle>
                                        <v-btn color='green'>Buy</v-btn>
                                      </v-card-actions>
                                    </v-card>
                                  </template>
                        </li>
                        <li>
                                <template>
                                        <v-card
                                          class="mx-auto"
                                          max-width="344"
                                          outlined
                                        >
                                          <v-list-item three-line>
                                            <v-list-item-content>
                                              <div class="overline mb-4">Remove Ads</div>
                                              <v-list-item-title class="headline mb-1">Purchase to remove Ads</v-list-item-title>
                                            </v-list-item-content>
                                      
                                            <v-list-item-avatar
                                              tile
                                              size="80"
                                              color="grey"
                                            > <v-img src="/images/store.svg"></v-img>
                                        </v-list-item-avatar>
                                          </v-list-item>
                                      
                                          <v-card-actions>
                                                <v-list-item-subtitle>47 Pts</v-list-item-subtitle>
                                            <v-btn color='green'>Buy</v-btn>
                                          </v-card-actions>
                                        </v-card>
                                      </template>
                            </li>
                  
                            <li>
                                    <template>
                                            <v-card
                                              class="mx-auto"
                                              max-width="344"
                                              outlined
                                            >
                                              <v-list-item three-line>
                                                <v-list-item-content>
                                                  <div class="overline mb-4">Remove Ads</div>
                                                  <v-list-item-title class="headline mb-1">Purchase to remove Ads</v-list-item-title>
                                                </v-list-item-content>
                                          
                                                <v-list-item-avatar
                                                  tile
                                                  size="80"
                                                  color="grey"
                                                > <v-img src="/images/store.svg"></v-img>
                                            </v-list-item-avatar>
                                              </v-list-item>
                                          
                                              <v-card-actions>
                                                    <v-list-item-subtitle>47 Pts</v-list-item-subtitle>
                                                <v-btn color='green'>Buy</v-btn>
                                              </v-card-actions>
                                            </v-card>
                                          </template>
                            </li>

                            <li>
                                    <template>
                                            <v-card
                                              class="mx-auto"
                                              max-width="344"
                                              outlined
                                            >
                                              <v-list-item three-line>
                                                <v-list-item-content>
                                                  <div class="overline mb-4">Remove Ads</div>
                                                  <v-list-item-title class="headline mb-1">Purchase to remove Ads</v-list-item-title>
                                                </v-list-item-content>
                                          
                                                <v-list-item-avatar
                                                  tile
                                                  size="80"
                                                  color="grey"
                                                > <v-img src="/images/store.svg"></v-img>
                                            </v-list-item-avatar>
                                              </v-list-item>
                                          
                                              <v-card-actions>
                                                    <v-list-item-subtitle>47 Pts</v-list-item-subtitle>
                                                <v-btn color='green'>Buy</v-btn>
                                              </v-card-actions>
                                            </v-card>
                                          </template>
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
    