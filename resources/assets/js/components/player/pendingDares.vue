<template>
        <div>
                <vue-particles 
                color="#00B0FF"
                shapeType="star"
                linesColor="#00B0FF"
                :particleSize="5"
                >
                </vue-particles>
    
        <div class="container fadeIn">
        
                <h3 class="text-center white-color"> Pending Dares</h3>
    

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

                <table class="table row-hover table-border white-color" v-else>
                        <thead>
                        <tr>
                             <th class='white-color'>Dare</th>
                            <th class='white-color'>Countdown</th>
                        </tr>
                        </thead>
                        <tbody>
                                <tr v-for='con in content' v-bind:key='con.id'>
                                    
                         <td>{{con.dare_name}}</td>

                         <td v-if='con.status == 1'> 
                                <div data-role="countdown" :data-date="con.expire">
                               </div>
                               </td>
                               <td v-else> 
                              <div data-role="countdown" :data-date="con.expire" 
                               data-cls-days="bg-red fg-white"
                               data-cls-hours="bg-red fg-white"
                               data-cls-minutes="bg-red fg-white"
                               data-cls-seconds="bg-red fg-white"
                               >
                                   </div>
                                   </td>
                                    </tr>
                                  
                        </tbody>
                    </table>

                    <div class="remark success text-center">
                            <router-link to='/upload-dare'> Click here to upload a Dare</router-link>
                         </div>

                         
                             <template>
     
                                    <div class="container fadeIn index">
                                    
                                            <div class="bottom-nav pos-fixed">
                                                    <button class="button"  @click.prevent='home()' style="background-color: #ebebeb">
                                                            <span class="icon mif-home"></span>
                                                            <span class="label">Home Screen</span>
                                                        </button>
                                                    <button class="button"  @click.prevent='menu()' style="background-color: #ebebeb">
                                                        <span class="icon mif-menu"></span>
                                                        <span class="label">Main Menu</span>
                                                    </button>
                                                   
                                                    <button class="button" @click.prevent='Pmenu()'  style="background-color: #ebebeb">
                                                        <span class="icon mif-menu"></span>
                                                        <span class="label">Player Menu</span>
                                                    </button>
                                        
                                                    <button class="button" style="background-color: #ebebeb"  @click.prevent='back()'>
                                                            <span class="icon mif-backspace"></span>
                                                            <span class="label">Back</span>
                                                        </button>
                                                </div>
                            
                                    </div>
                                </template>
                
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
                        notify.create("Complete the Dare before it timesout or you fail. Failed Dares can't be selected again");
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
                        })
                    },
            },
    
           
        }
    </script>
    