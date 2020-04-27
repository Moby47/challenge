<template>
        <div>

          
        <div class="desktop">
            <div class="window-area scroll">
                <!-- content here 
                <div class='bg-dare'></div>-->

            
                <div class="container">
                
                        <h3 class="text-center">  </h3>
        
                        <span v-if='empty'>
                            <div class="remark info text-center">
                                No Dare Videos Currently
                                 </div>
                    </span>
            
                 
        
                        <div class="row">
        
                            <div class="cell-sm-full cell-md-one-third cell-lg-4" v-if='loading' v-for='i in 6'>
                            <template >
                                <v-sheet
                                  :color="`grey`"
                                  class="px-3 pt-3 pb-3"
                                >
                                  <v-skeleton-loader
                                    class="mx-auto"
                                    max-width="auto"
                                    type="card"
                                  ></v-skeleton-loader>
                                </v-sheet>
                              </template>
                            </div>
                         
                            <template v-if='!loading'>
                                <v-container class="grey lighten-5">
                                  <v-row>
                                    <v-col
                                    v-for='con in content' v-bind:key='con.id'
                                      cols="12"
                                      sm="4"
                                    >
                                      <v-card
                                        class="pa-2"
                                        outlined
                                        tile
                                      >
                                    <router-link :to="'/dare/'+con.dare_slug+'/'+con.id" class='remove-deco'>
                                      <div class="card image-header">
                            <div>

                                <video data-role="video"
                                :data-src="con.url"
                                data-poster="/images/poster.png"
                                data-aspect-ratio="hd"
                                data-logo="/images/play.png"
                                data-logo-height="40"
                                data-show-loop="false"
                                data-show-play="false"
                                data-show-stop="false"
                                data-show-stream="false"
                                data-show-volume="false"
                                data-show-mute="false"
                                data-show-full="false"
                                 ></video>
                                          </div>
                                          <div class="card-content p-2 text-ellipsis">
                                             {{con.dare_name}}
                        <p class="fg-gray">{{con.views}} views. {{con.likes}} likes.</p>
                                          </div>
                                      </div>
                                    </router-link>

                                      <span class="badge inside  fg-white"
                                      style="background-color: #b82943">{{con.username}}</span>

                                      </v-card>
                                    </v-col>
                                  </v-row>
                                </v-container>

                                <ul class="pagination" v-if='count > 15'>
                     <li class="page-item"><a class="page-link" href="#" @click.prevent="get(pagination.prev_page_url)" :disabled="!pagination.prev_page_url"> Prev </a></li>
        
                     <li class="page-item"><a class="page-link" href="#"><span>{{pagination.current_page}} of {{pagination.last_page}}</span></a></li>
                                    
                      <li class="page-item"><a class="page-link" href="#" @click.prevent="get(pagination.next_page_url)" :disabled="!pagination.next_page_url">Next </a></li>
                                </ul>

                              </template>
<!--
       <div class="cell-sm-full cell-md-one-third cell-lg-4" v-for='con in content' v-bind:key='con.id'>
                                    
                                        <template>
                                                <v-card
                                                  class="mx-auto"
                                                >
                                                <video data-role="video"
                                        :data-src="con.url"
                                        data-logo-height="64"
                                        data-poster="/images/home.svg"
                                        data-aspect-ratio="hd"
                                        data-on-play
                                        id='one'
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
                                 <router-link to='/single-dare' class=''> {{con.dare_name}}  </router-link> 
                                                       </figcaption>
                                                  </v-card-subtitle>
                                              
                                                </v-card>
                                              </template>
                                              <span class="badge inside  fg-white"
                                              style="background-color: #b82943">{{con.username}}</span>
                                </div>
                              -->
        
                                
        
             </div>
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
            this.get()
        },
        
            methods: {

                get(page_url){
                    this.loading = true
                    
                    var   page_url = page_url || '/api/dares';

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

                home(){
                    this.$router.push({name: "index"});
                },

                menu(){
                    this.$router.push({name: "homepage"});
                },

                back(){
                    this.$router.go(-1)
                }
   
            },
    
          
        }
    </script>
    