<template>
        <div>

            <div class="desktop">
                <div class="window-area scroll">
                    <!-- content here-->
                    <div class="container">
                        <div class="row">

        
                               <!-- <div class="cell-sm-full cell-md-one-third cell-lg-4">
                                    <div class="card image-header">
                                        <div class="card-header fg-white"
                                             style="background-image: url(http://lorempixel.com/1000/600/)">
                                            300 Pts
                                        </div>
                                        <div class="card-content p-2">
                                            Remove ads from upload page
                                        </div>
                                        <div class="card-footer">
                                            <button class="button secondary">Buy</button>
                                        </div>
                                    </div>
                                </div>
                                -->

                                <div class="cell-sm-full cell-md-one-third cell-lg-4" v-for='i in 6'>
                                    <template >
                                        <v-sheet
                                          :color="`grey`"
                                          class="px-3 pt-3 pb-3"
                                        >
                                          <v-skeleton-loader
                                            class="mx-auto"
                                            max-width="auto"
                                            type="card"
                                            :boilerplate="true"
                                          ></v-skeleton-loader>
                                        </v-sheet>
                                      </template>
                                  </div>
            
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
    
            mounted() {
            $(document).ready(function(){
                $(window).scrollTop(0);
            });

            this.notify()

        },

            methods: {
              notify(){
             
                        var notify = Metro.notify;
                        notify.setup({
                            width: 300,
                            duration: 1000,
                            timeout: 10000,
                            animation: 'easeOutBounce'
                        });
                        notify.create("Store coming soon... Keep winning Points.");
                        notify.reset();
            },


          }//meth
          
        }
    </script>
    