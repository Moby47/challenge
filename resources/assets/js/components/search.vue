<template>
        <div>
            
                <div class="desktop">
                        <div class="window-area scroll">
                            <!-- content here-->
                            

                            <form class="login-form1 bg-white p-6 mx-auto border bd-default win-shadow fadeIn"
                            method="post" data-vv-scope='usernameForm'>

                            <span v-if='empty'>
                                    <div class="remark info text-center">
                                         No user found
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
                                        type="action, sentences@1"
                                      ></v-skeleton-loader>
                                    </v-sheet>
                                  </template>
                                  <span v-else>
                          <h5 class="text-light">Search by Username</h5>
                          <hr class="thin mt-4 mb-4 bg-white">
                          <div class="form-group">
                                  <select data-role="select" data-prepend="<span class='mif-user'>" 
                                        name="Username"  v-model='userID' v-validate='"required"'>
             <option selected class="text-bold" :value='con.id' v-for='con in content' v-bind:key='con.id'>
                             {{con.username}}
                         </option>
                                    </select>                      
                          </div>
                          </span>
                      </form>
                  
                      


                      <form class="login-form2 bg-white p-6 mx-auto border bd-default win-shadow fadeIn" 
                      method="post" data-vv-scope='darenameForm'>

                      <span v-if='empty2'>
                            <div class="remark info text-center">
                                 No Dare found
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
                                type="action, sentences@1"
                              ></v-skeleton-loader>
                            </v-sheet>
                          </template>

                          <span v-else>
                    <h5 class="text-light">Search by Dare</h5>
                    <hr class="thin mt-4 mb-4 bg-white">
                    <div class="form-group">
                        
                            <select data-role="select" data-prepend="<span class='mif-file-video'>" 
                                    name="Darename"  v-model='darename' v-validate='"required"'>
                                    <option selected class="text-bold" :value='con.dare_slug' v-for='con in content2' v-bind:key='con.id'>
                                            ({{con.play_count}}) - {{con.dare_name}}
                                            </option>
                                </select>
                                </div>
                            </span>
                </form>
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
                    userID:'',
                    darename:'',

                    content:[],
                    empty:false,
                    loading:false,

                    content2:[],
                    empty2:false,
                    loading2:false,
                }
            },
            mounted() {
                $(document).ready(function(){
                    $(window).scrollTop(0);
                });
                this.getUsernames()
                this.getdares()
            },
            
            methods: {
               
                getUsernames(){
                        this.loading = true
                    fetch('/api/username-dropdown')
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


                    getdares(){
                        this.loading2 = true
                    fetch('/api/dropdown-dare-name')
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

               
            },

            watch:{

                userID(a,b){
             if(a){

                var activity =  Metro.activity.open({
                    type: 'square',
                    overlayClickClose: false,
                    text: '<div class=\'mt-2 text-small  text-white\'>Please, wait...</div>',
                })

                this.$router.push({name:'result', params:{'data':this.userID}});

                Metro.activity.close(activity);
                
             
              }
             }, // meth

                darename(a,b){
             if(a){

                var activity =  Metro.activity.open({
                    type: 'square',
                    overlayClickClose: false,
                    text: '<div class=\'mt-2 text-small  text-white\'>Please, wait...</div>',
                })

                this.$router.push({name:'result', params:{'data':this.darename}});

                Metro.activity.close(activity);
                
             
              }
             }, // meth

            }//watcher
           
        }
    </script>
    