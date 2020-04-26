<template>
        <div>

          
        <div class="desktop">
            <div class="window-area scroll">
                <!-- content here-->

                <div class='bg-dare'></div>
            
                <div class="container">
                
                        <h3 class="text-center">  </h3>
        
                        <span v-if='empty'>
                            <div class="remark info text-center">
                                No Dare Videos Currently
                                 </div>
                    </span>
            
                 
        
                        <div class="row">
        
                            <div class="cell-sm-full cell-md-one-third cell-lg-4" v-if='loading'>
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
                            <div class="cell-sm-full cell-md-one-third cell-lg-4" v-if='loading'>
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
                                <div class="cell-sm-full cell-md-one-third cell-lg-4" v-if='loading'>
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
                              
        
                                
        
             </div>
            </div>
        
            
        
             <!--dialogs search-->
             <div class="dialog" data-role="dialog" id='search'>
                              
                    <div class="dialog-title fg-white" style="background-color: #07557B">
                        Search</div>
        
        
                        <div class="dialog-content">
                            <p>Search by Player's username</p>
                            <input type="text" data-role="input"
                            placeholder="Enter Username" data-autocomplete="Ukraine, USA, Canada, Marokko, Singapur">
                                <br>
                                <button class="button primary">Find</button>
                        </div>
        
                        <hr>
        
                        
                        <div class="dialog-content">
                                <p>Filter by Dares</p>
                                <select data-role="select">
                                        <option class="fg-cyan">One</option>
                                        <option selected class="text-bold fg-red">Two</option>
                                        <option class="fg-green">Three</option>
                                    </select>
                        </div>
        
                        <div class="dialog-actions">
                            <button class="button alert js-dialog-close">Close</button>
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
                fetch('/api/dares')
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
                         Metro.toast.create('A temporary network error occured...',
                         null, 5000, 'yellow', options);
                       
                    })
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
    