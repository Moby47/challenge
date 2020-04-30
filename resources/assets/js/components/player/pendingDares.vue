<template>
        <div>

            
        <div class="desktop">
                <div class="window-area scroll">
                    <!-- content here <vue-particles 
                    color="#00B0FF"
                    shapeType="star"
                    linesColor="#00B0FF"
                    :particleSize="5"
                    >
                    </vue-particles>-->

                    
        
            <div class="container fadeIn">
            
                    <h3 class="text-center white-color"> My Dares</h3>
        
    
                    <span v-if='empty'>
                            <div class="remark info text-center">
                                   Your Dare list is currently empty. <router-link to='/pick-dare'> Click here to add one</router-link>
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
                                type="table-tbody@2"
                              ></v-skeleton-loader>
                            </v-sheet>
                          </template>
    
                          <span v-else>
                    <table class="table row-hover table-border table-dark" >
                            <thead class="thead-dark">
                            <tr>
                                 <th>Dare</th>
                                <th class='text-center'>Countdown</th>
                            </tr>
                            </thead>
                            <tbody>
                                    <tr v-for='con in content' v-bind:key='con.id'>
                                        
                             <td>{{con.dare_name}}</td>
    
                             <td v-if='con.status == 1'> 
                                    <div data-role="countdown" :data-date="con.expire">
                                   </div>
                                   </td>
    
                                   <td v-if='con.status == 0'> 
                                  <div data-role="countdown" :data-date="con.expire" 
                                   data-cls-days="bg-red fg-white"
                                   data-cls-hours="bg-red fg-white"
                                   data-cls-minutes="bg-red fg-white"
                                   data-cls-seconds="bg-red fg-white"
                                   >
                                       </div>
                                       </td>
    
                                       <td v-if='con.status == 3'> 
                                        <p class='text-green pl-4 text-center bold'>DARE COMPLETED!</p>
                                             </td>
    
                                        </tr>
                                      
                            </tbody>
                        </table>
    
                        <div class="remark info text-center">
                            <router-link to='/pick-dare'> Click here to add a Dare</router-link>
                         </div>
    
                        <div class="remark success text-center">
                                <router-link to='/upload-dare'> Click here to upload a Dare</router-link>
                             </div>
                            </span>
                             
                               
                    
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

                var notify = Metro.notify;
                        notify.setup({
                            width: 300,
                            duration: 1000,
                            timeout: 12000,
                            animation: 'easeOutBounce'
                        });
                        notify.create("Completed your Dares before they time-out. Timed-out Dares are permanently lost!");
                        notify.reset();
            },
            
            methods: {
                home(){
                    this.$router.push({name: "index"});
                },

                menu(){
                    this.$router.push({name: "homepage"});
                },

                Pmenu(){
                    this.$router.push({name: "playerHomepage"});
                },

                back(){
                    this.$router.go(-1)
                },
                
                get(){
                        this.loading = true
                    fetch('/api/pending-dares/'+Metro.session.getItem('userId'))
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
    