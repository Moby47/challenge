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

                         <!--tab-->
                <ul data-role="tabs" data-tabs-type="group" data-expand="true">
                        <li><a href="#_target_1">Trending</a></li>
                        <li><a href="#_target_2">Recent</a></li>
                        <li><a href="#_target_3">Scores</a></li>
                    </ul>
                    <div class="border bd-default no-border-top p-2">
                        <div id="_target_1">
                           <!--content tab 1-->
                           
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
                                
                                <div
                                  class="mx-auto bg-white" style='background-color:white !important;'
                                  max-width="344"
                                  outlined
                                >
                                  <v-list-item three-line>
            
                                    <v-list-item-content>
                                            <router-link :to="'/dare/'+con.dare_slug+'/'+con.id" class='remove-deco'>
                                            <v-list-item-subtitle class="text-ellipsis text-cap">{{con.dare_name}}</v-list-item-subtitle>
                                            <div class="overline mb-4 fg-black">By {{con.username}}</div>
                                   <v-list-item-title class=" mb-1">{{con.views}} Views 
                                        <span class='ml-2'>{{con.duration}}</span></v-list-item-title>
                                        </router-link>
                                        <v-list-item-title class=" mb-1">
                                                <p class="fg-gray">
                                                        <whats-app  :url="'https://challenge.com/dare/'+con.dare_slug+'/'+con.id" :title="'Challenge completed by: '+con.username" scale="1.5" ></whats-app> 
                                                         <email  :url="'https://challenge.com/dare/'+con.dare_slug+'/'+con.id" :subject="'Challenge completed by: '+con.username" scale="1.5"></email>  
                                                         <facebook  :url="'https://challenge.com/dare/'+con.dare_slug+'/'+con.id" scale="1.5"></facebook> 
                                                          <twitter  :url="'https://challenge.com/dare/'+con.dare_slug+'/'+con.id" :title="'Challenge completed by: '+con.username" scale="1.5"></twitter>  
                                                         <linkedin  :url="'https://challenge.com/dare/'+con.dare_slug+'/'+con.id" scale="1.5"></linkedin>   
                                                  </p>
                                        </v-list-item-title>
                                     </v-list-item-content>
                                     <router-link :to="'/dare/'+con.dare_slug+'/'+con.id" class='remove-deco'>
                                    <v-list-item-avatar
                                    tile
                                    size="80"
                                    color="grey"
                                  >
                                <v-img 
                                :src='con.poster'
                                :lazy-src="`/images/black-spinner.gif`"></v-img>
                               </v-list-item-avatar>
                               </router-link>
                                  </v-list-item>
                                </div>
                                
                              </template>
              </div>

              
                    </div>
                    <ul class="pagination" v-if='count > 20'>
                <li class="page-item"><a class="page-link" href="#" @click.prevent="get(pagination.prev_page_url)" :disabled="!pagination.prev_page_url"> Prev </a></li>
               
            <li class="page-item"><a class="page-link" href="#"><span>{{pagination.current_page}} of {{pagination.last_page}}</span></a></li>
                                           
             <li class="page-item"><a class="page-link" href="#" @click.prevent="get(pagination.next_page_url)" :disabled="!pagination.next_page_url">Next </a></li>
            </ul>
                        </div>
                        <div id="_target_2">
                        <!--tab 2-->

                        <span v-if='empty2'>
                                <div class="remark info text-center">
                                       Rescent Dare list is currently empty
                                     </div>
                        </span>
                
                        <template v-if='loading2'>
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
                                    <th>Played</th>
                                </tr>
                                </thead>
                                <tbody>
                                        <tr v-for='con in content2' v-bind:key='con.id'>
             
                                  <td>
                <router-link :to='"/result/"+con.dare_slug' class='fg-white' style='text-decoration:underline;'> 
                                        {{con.dare_name}} 
                                    </router-link>
                                       <p class="fg-gray"> Dare a Friend:
                                                                    <whats-app  :url="'https://challenge.com/result/'+con.dare_slug+'/'+con.id" :title="'Challenge completed by: '+con.username" scale="1.7" ></whats-app> 
                                                                     
                                                                     <facebook  :url="'https://challenge.com/result/'+con.dare_slug+'/'+con.id" scale="1.7"></facebook> 
                                                                      <twitter  :url="'https://challenge.com/result/'+con.dare_slug+'/'+con.id" :title="'Challenge completed by: '+con.username" scale="1.7"></twitter>  
                                                                </p>
                                     </td>
                                                <td>{{con.play_count}}</td>
                                            </tr>
                                           
                                </tbody>
                            </table>
                      </span>

                        </div>
                        <div id="_target_3">
                               <!--tab 3-->
                               <span v-if='empty3'>
                                    <div class="remark info text-center">
                                            Leader board is currently empty
                                         </div>
                            </span>
                    
                            <template v-if='loading3'>
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
                                                    <tr class="info" v-for='con in content3' v-bind:key='con.id'>
                                                            <td>{{con.username}}</td>
                                                            <td>{{con.points}}</td>
                                                        </tr>
                                                       
                                            </tbody>
                                        </table>
                            </div>
                    </div>
                    <!--tab-->


                    </div> <!--container end-->

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
                content:[],
                    empty:false,
                    loading:false, 
                    pagination: [],
                    count:'0',
                //rescent
                    content2:[],
                    empty2:false,
                    loading2:false,
                //scores
                    content3:[],
                    empty3:false,
                    loading3:false,
            }
        },
        mounted() {
            $(document).ready(function(){
                $(window).scrollTop(0);
            });

            //notification for neebies
            this.notify()

            this.get()

            this.getdares()

            this.getscores()
        },
        
        methods: {

            getscores(){
                    this.loading3 = true
                fetch('/api/leaderboard')
                .then(res => res.json())
                .then(res=>{
                   this.content3 = res.data;
                  this.loading3 = false
                 console.log(this.content3)
                
                  //to determine if obj is empty 
                          console.log(res.data[0]);
                          if(res.data[0] == undefined){
                              this.empty3 = true;
                          }else{
                              this.empty3 = false;
                          }
                  //to determine if obj is empty
                  
                })
                .catch(error =>{
                  console.log(error)
                    //off loader
                    this.loading3 = false
                    var options = {
                                showTop: true,
                            }
                         Metro.toast.create('A temporary network error occured... Please reload page',
                         null, 5000, 'yellow', options);
                       
                    })
                },



            getdares(){
                        this.loading2 = true
                    fetch('/api/rescent-dares')
                    .then(res => res.json())
                    .then(res=>{
                        this.content2 = res;
                    this.loading2 = false
                    console.log('darenames',this.content2)
                    
                    //to determine if obj is empty 
                            console.log('res state',res[0]);
                            if(res[0] == undefined){
                                this.empty2 = true;
                            }else{
                                this.empty2 = false;
                            }
                    //to determine if obj is empty
                    
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
                            timeout: 10000,
                            animation: 'easeOutBounce'
                        });
                        notify.create("Welcome to <b>Challenge</b>. A fun game of <b> <strike>Truth</strike> or Dare</b>. Click the icon below to <b>START</b>");
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
