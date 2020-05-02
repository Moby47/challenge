<template>
    <div>

            
    
        <div class="desktop">
            <div class="window-area scroll">
                <!-- content here-->

                <vue-particles 
                color="#fdf9c6"
                :particleSize="5"
                >
                </vue-particles>
              
                
                <div class="container">
                
                        <h3 class="text-center fg-white"> Trending Dares </h3>

                        <span v-if='empty'>
                                <div class="remark info text-center">
                                    No Trending Videos Currently
                                     </div>
                        </span>

                        <div class="row">

              <div class="cell-sm-full cell-md-one-third cell-lg-3" v-if='loading' v-for='i in 20'>
                                        <template >
                                            <v-sheet
                                              :color="`grey`"
                                              class="px-3 pt-3 pb-3"
                                            >
                                              <v-skeleton-loader
                                                class="mx-auto"
                                                max-width="auto"
                                                type="list-item-avatar-three-line"
                                              ></v-skeleton-loader>
                                            </v-sheet>
                                          </template>
              </div>

                <div class="cell-sm-full cell-md-one-third cell-lg-3" v-if='!loading' 
                v-for='con in content' v-bind:key='con.id'>
                        <template>
                                <router-link :to="'/dare/'+con.dare_slug+'/'+con.id" class='remove-deco'>
                                <v-card
                                  class="mx-auto"
                                  max-width="344"
                                  outlined
                                >
                                  <v-list-item three-line>
            
                                    <v-list-item-content>
                                            <v-list-item-subtitle class="text-ellipsis text-cap">{{con.dare_name}}</v-list-item-subtitle>
                                            <div class="overline mb-4">By {{con.username}}</div>
                                   <v-list-item-title class=" mb-1">{{con.views}} Views 
                                        <span class='ml-2'>{{con.duration}}</span></v-list-item-title>
                                     </v-list-item-content>
            
                                    <v-list-item-avatar
                                    tile
                                    size="80"
                                    color="grey"
                                  >
                                <v-img 
                                :src='con.poster'
                                :lazy-src="con.poster"></v-img>
                               </v-list-item-avatar>
            
                                  </v-list-item>
                                </v-card>
                                </router-link>
                              </template>
              </div>

              
                    </div>
                    <ul class="pagination" v-if='count > 20'>
                <li class="page-item"><a class="page-link" href="#" @click.prevent="get(pagination.prev_page_url)" :disabled="!pagination.prev_page_url"> Prev </a></li>
               
            <li class="page-item"><a class="page-link" href="#"><span>{{pagination.current_page}} of {{pagination.last_page}}</span></a></li>
                                           
             <li class="page-item"><a class="page-link" href="#" @click.prevent="get(pagination.next_page_url)" :disabled="!pagination.next_page_url">Next </a></li>
            </ul>
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
                    pagination: [],
                    count:'0',
            }
        },
        mounted() {
            $(document).ready(function(){
                $(window).scrollTop(0);
            });

            //notification for neebies
            this.notify()

            this.get()

        },
        
        methods: {

            get(page_url){
                    this.loading = true
                    
                    var   page_url = page_url || '/api/trending-dares';

                fetch(page_url)
                .then(res => res.json())
                .then(res=>{
                   this.content = res.data;
                   this.count = res.meta.total
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
                         Metro.toast.create('A temporary network error occured... Please reload page',
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

            notify(){
                var wel = Metro.session.getItem('welcome')

                    if(wel){
                        //old guest, do nothing
                    }else{
                        //new guest:
                        //notify and save key
                        var notify = Metro.notify;
                        notify.setup({
                            width: 300,
                            duration: 1000,
                            timeout: 15000,
                            animation: 'easeOutBounce'
                        });
                        notify.create("Welcome to <b>Challenge</b>. A fun game of <b> <strike>Truth</strike> or Dare</b>.");
                        notify.create("Click the icon below to <b>START</b>");
                        notify.reset();

                      Metro.session.setItem('welcome','welcome')
                    }
            },
            
                        //meth to check Auth
                        isAuth(){
                            if(Metro.session.getItem('userToken')){
                            // this.loggedOut = false;
                                return true;
                            }else{
                            // this.loggedOut = true;
                                return false;
                            }
                            },


        },

       
    }
</script>
