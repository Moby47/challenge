<template>

    <div>


          
        <div class="desktop">
                <div class="window-area scroll">
                    <!-- content here-->
                    <div class="container white-color">
        
                            <h3 class="text-center">  </h3>
            
                            <div class="grid">
                     
                                    <div class="row">
                       

                            
               <!--left-->  <div class="cell-sm-full cell-md-one-third cell-lg-7">
                            
                  <template v-if='loading'>
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

                      <template v-else>
                         <v-container class="grey lighten-5">
                                                          <v-row no-gutters>
                                                            <v-col
                                                              cols="12"
                                                              sm="12"
                                                            >
                                                              <v-card
                                                                class="pa-2"
                                                                outlined
                                                                tile
                                                              >
                        
                                              <div class="card-header">
                                             <video 
                                             data-role="video"
                                             :data-src="single.url"
                                             data-poster="single.poster"
                                             data-aspect-ratio="hd"
                                             data-autoplay="true"
                                             data-loop="true"
                                              ></video>
                                                       </div>
                                               <div class="card-content p-2 text-cap">
                                            {{single.dare_name}} 
                                            <p><b>{{single.views}} views</b> <i class='pl-5 fg-gray'>

                                                Completed {{single.created_at}}</i> </p>
                                            <p class="fg-gray">
                                              <whats-app  :url="url" :title="'Challenge completed by: '+single.username" scale="1.7" ></whats-app> 
                                               <email  :url="url" :subject="'Challenge completed by: '+single.username" scale="1.7"></email>  
                                               <facebook  :url="url" scale="1.7"></facebook> 
                                                <twitter  :url="url" :title="'Challenge completed by: '+single.username" scale="1.7"></twitter>  
                                               <linkedin  :url="url" scale="1.7"></linkedin>   
                                        </p>
                                        <p class="p-5 text-center">

                                            <vue-disqus shortname="challenge-app"
                                            :identifier="id_disqus"
                                            :url="url_disqus">
                                           </vue-disqus>
      
                                              </p>
                                                                  </div>
                            <!--              
                            <button class="button fg-white m-1"  style="background-color: #1ba1e2"
                                                                   id="dropdown_toggle_1">Comments</button>
                                                                  <div class="pos-relative">
                                                                      <div
                                                                      data-role="dropdown"
                                                                       data-toggle-element="#dropdown_toggle_1">
                                                                  
                                                                      </div>
                                                                  </div>-->
                                                              
                                  <span class="badge inside  fg-white"
                              style="background-color: #b82943">{{single.username}}</span>
                        
                                                              </v-card>
                                                            </v-col>
                                                          </v-row>
                                                        </v-container>
                                                      </template>     
                                        
                
                            
                                        </div> <!--left side-->
                            
            
            
            <!--right-->
                                        <div class="cell-sm-full cell-md-two-third cell-lg-4">
            
                                            <template v-if='loading2' v-for='i in 6'>
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

                                            <template v-if='!loading2'>
                                                <v-container class="grey lighten-5">
                                                  <v-row>
                                                    <v-col
                                                    v-for='con in content' v-bind:key='con.id'
                                                      cols="12"
                                                      sm="12"
                                                    >
                                                      <v-card
                                                        class="pa-2"
                                                        outlined
                                                        tile
                                                      >
                                   <router-link :to="'/dare-video/'+con.dare_slug+'/'+con.id" class='remove-deco'>
                                    <div class="card image-header">
                                        <div class="card-header fg-white"
                                        :style="'background-image: url('+con.poster+')'">
                                    <span style="background-color: #2c2a2a; padding:2px; border-radius:5px;"
                                    class='fg-white'>
                                       {{con.duration}}
                                       </span>
                                   </div>
                                        <div class="card-content p-2 text-ellipsis text-cap">
                                           {{con.dare_name}}
                                           <p><b>{{single.views}} views</b>  </p>
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
                                     <li class="page-item"><a class="page-link" href="#" @click.prevent="others(pagination.prev_page_url)" :disabled="!pagination.prev_page_url"> Prev </a></li>
                        
                                     <li class="page-item"><a class="page-link" href="#"><span>{{pagination.current_page}} of {{pagination.last_page}}</span></a></li>
                                                    
                                      <li class="page-item"><a class="page-link" href="#" @click.prevent="others(pagination.next_page_url)" :disabled="!pagination.next_page_url">Next </a></li>
                                                </ul>
                
                                              </template>
                                           
                            
                                        </div><!--right side end-->
                            
                                     
                                    </div> <!--total row end-->
                                       
                            
                            
                                    </div>
            
            
            
                      
                        </div>
                    <!-- content here-->
                </div>
                <taskbar></taskbar>
            </div>
    
    
     
        </div>
    </template>
    
    <script>

 //share icons
 import {
      Facebook,
      Twitter,
      Linkedin,
      WhatsApp,
      Email,
      Google
    } from "vue-socialmedia-share";
    //share icons
        export default {
       
          //share icons
         components: {
        Facebook,
        Twitter,
        Linkedin,
        WhatsApp,
        Email,
        Google
      },
      //share icons
          
            data(){
                return {
                  single:[],
                  loading: true,
                  content:[],
                  count:'',
                  loading2:true,
                  url_disqus:'',
                  id_disqus:'',
                  url:'',
                }
            },
    
            methods: {

              video(){

                this.loading = true
                fetch('/api/single-dare-video/'+ this.$route.params.slug + '/' + this.$route.params.id)
                .then(res => res.json())
                .then(res=>{
                   this.single = res.data;
                  this.loading = false
                 console.log(this.single)
                
                  /*to determine if obj is empty 
                          console.log(res.data[0]);
                          if(res.data[0] == undefined){
                              this.empty = true;
                          }else{
                              this.empty = false;
                          }
                  //to determine if obj is empty */
                  
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

              others(page_url){
                this.loading2 = true
                    
                    var   page_url = page_url || '/api/dares';

                fetch(page_url)
                .then(res => res.json())
                .then(res=>{
                   this.content = res.data;
                   this.count = res.meta.total
                  this.loading2 = false
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
                  this.loading2 = false
                })
                .catch(error =>{
                  console.log(error)
                    //off loader
                    this.loading2 = false
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

              scrollToTop() {
                window.scrollTo(0,0);
               },

              reloadVideo(){
               // this.scrollToTop()

                this.loading = true
                fetch('/api/single-dare-video/'+ this.$route.params.slug + '/' + this.$route.params.id)
                .then(res => res.json())
                .then(res=>{
                   this.single = res.data;
                  this.loading = false
                 console.log(this.single)
                 document.body.scrollTop = 0;
				document.documentElement.scrollTop = 0;
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
    
            mounted() {

              this.video()

                $(document).ready(function(){
                $(window).scrollTop(0);
            });

            setTimeout(() => {
                this.others()
              }, 1000);

              this.url = String(window.location)

              var url = String(window.location)

              var id = this.$route.params.id
                if(id){
             this.url_disqus = url+`/`+id
             this.id_disqus = id
                }

            },//mount end

            watch:{
               //watch for url param changes, meaning user clicked another video
            /*   $route (to,from){
                this.reloadVideo();
                }, */
                
            }
        }
    </script>
    