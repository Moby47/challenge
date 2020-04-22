<template>
        <div>

                <div class='bg-darelist'></div>

        <div class="container fadeIn">
        
                <h3 class="text-center"> </h3>

                <span v-if='empty'>
                        <div class="remark info text-center">
                                Dare list is currently empty
                             </div>
                </span>
        
                <template v-if='loading'>
                        <v-sheet
                          :color="`grey`"
                          class="px-3 pt-3 pb-3"
                        >
                          <v-skeleton-loader
                            class="mx-auto"
                            max-width="auto"
                            type="table"
                          ></v-skeleton-loader>
                        </v-sheet>
                      </template>
            
                <table class="table row-hover table-border" v-else>
                        <thead>
                        <tr>
                             <th>Dare</th>
                            <th>Players Played</th>
                            <th>Points</th>
                        </tr>
                        </thead>
                        <tbody>
                                <tr class="info">
                                        <td> </td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                   
                        </tbody>
                    </table>

                </div>
    
            <floating></floating>
           

        </div>
    </template>
    
    <script>
        export default {
    
            data(){
                return {
                    content:[],
                    empty:false,
                    loading:false,    
                }
            },
    
            mounted() {
            $(document).ready(function(){
                $(window).scrollTop(0);
            });

            this.get()
        },
        
            methods: {

                get(){
                    this.loading = true
                fetch('/api/dare-list')
                .then(res => res.json())
                .then(res=>{
                   this.content = res.data;
                  this.loading = false
                 console.log(this.content)
                
                  //to determine if obj is empty 
                          console.log(res.data[0]);
                          if(res.data[0] == undefined){
                              this.empty = true;
                          }else{
                              this.empty = false;
                          }
                  //to determine if obj is empty
                  
                })
                .catch(error =>{
                  console.log(error)
                    //off loader
                    this.loading = false
                    })
                },

            },
    
        }
    </script>
    