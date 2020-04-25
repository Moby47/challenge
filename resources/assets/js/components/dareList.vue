<template>
        <div>


            
        <div class="desktop">
                <div class="window-area scroll">
                    <!-- content here 
                    <div class='bg-darelist'></div>-->

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
                            type="table-tbody"
                          ></v-skeleton-loader>
                        </v-sheet>
                      </template>
                      
                      <span v-else>
                <table class="table row-hover table-border table-striped table-dark">
                        <thead class="thead-dark">
                        <tr>
                             <th>Dare</th>
                            <th>Players Played</th>
                            <th>Points</th>
                        </tr>
                        </thead>
                        <tbody>
                                <tr v-for='con in content' v-bind:key='con.id'>
                                        <td>{{con.dare_name}} </td>
                                        <td>{{con.play_count}}</td>
                                        <td>{{con.points}}</td>
                                    </tr>
                                   
                        </tbody>
                    </table>

                    <ul class="pagination" v-if='count > 9'>
                            <li class="page-item"><a class="page-link" href="#" @click.prevent="get(pagination.prev_page_url)" :disabled="!pagination.prev_page_url"> Prev </a></li>

                            <li class="page-item"><a class="page-link" href="#"><span>{{pagination.current_page}} of {{pagination.last_page}}</span></a></li>
                            
                  <li class="page-item"><a class="page-link" href="#" @click.prevent="get(pagination.next_page_url)" :disabled="!pagination.next_page_url">Next </a></li>
                        </ul>
                </span>

                </div>
                </div>
                <taskbar></taskbar>
            </div>
    
                
    

        </div>
    </template>
    
    <style scoped>
      
            </style>

    <script>
        export default {
    
            data(){
                return {
                    content:[],
                    empty:false,
                    loading:false,    
                    pagination: [],
                    count:'0',
                }
            },
    
            mounted() {
            $(document).ready(function(){
                $(window).scrollTop(0);
            });

            this.get()
        },
        
            methods: {

                get(page_url){
                    this.loading = true

                    var   page_url = page_url || '/api/dare-list';

                fetch(page_url)
                .then(res => res.json())
                .then(res=>{
                   this.content = res.data;
                    this.count = res.meta.total
                 console.log(this.content)
                
                  //to determine if obj is empty 
                          console.log(res.data[0]);
                          if(res.data[0] == undefined){
                              this.empty = true;
                          }else{
                              this.empty = false;
                          }
                  //to determine if obj is empty
                  this.makePagination(res.meta, res.links);
                  this.loading = false
                })
                .catch(error =>{
                  console.log(error)
                    //off loader
                    this.loading = false
                    var options = {
                                showTop: true,
                            }
                         Metro.toast.create('A temporary network error occured...',
                         null, 5000, 'yellow', options);
                       
                    })
                },


                makePagination(meta, links){
          var pagination = {
                          current_page: meta.current_page,
                          last_page: meta.last_page,
                          next_page_url: links.next,
                          prev_page_url: links.prev
                           }
            document.body.scrollTop = 0;
           document.documentElement.scrollTop = 0;
          this.pagination = pagination;
              },


            },//meth end
    
           
        }
    </script>
    