<template>
        <div>

            
        <div class="desktop">
                <div class="window-area scroll">
                    <!-- content here     <div class='bg-leader'></div>-->

                

        <div class="container  fadeIn">

        <span v-if='empty'>
                <div class="remark info text-center">
                        Leader board is currently empty
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
                    type="table-tbody"
                  ></v-skeleton-loader>
                </v-sheet>
              </template>

                <table class="table row-hover table-border table-striped table-dark" v-else>
                        <thead class="thead-dark">
                        <tr >
                             <th>Player</th>
                            <th>Points</th>
                        </tr>
                        </thead>
                        <tbody>
                                <tr class="info" v-for='con in content' v-bind:key='con.id'>
                                        <td>{{con.username}}</td>
                                        <td>{{con.points}}</td>
                                    </tr>
                                   
                        </tbody>
                    </table>

    
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
                fetch('/api/leaderboard')
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
                    var options = {
                                showTop: true,
                            }
                         Metro.toast.create('A temporary network error occured... Please reload page',
                         null, 5000, 'yellow', options);
                       
                    })
                },




            },
    
          
        }
    </script>
    