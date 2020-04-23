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
        
                <h3 class="text-center white-color"> Select Dares to Add</h3>
    
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
                            type="sentences"
                          ></v-skeleton-loader>
                        </v-sheet>
                      </template>

               <p data-role="hint" v-else
               data-hint-text="Select Dares you want to attempt, to add them to your Dare list."
                data-hint-position="top">
                <select data-role="select" v-model='selected'>
                        <option selected class="text-bold" :value='con.id'
                        v-for='con in content' v-bind:key='con.id'>
                        {{con.dare_name}}</option>
                    </select></p>


                    <div class="remark info text-center">
                           <router-link to='/pending-dares'> Click here to view your pending Dares</router-link>
                        </div>


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
                    selected:'',
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
                    fetch('/api/dropdown-dare-list')
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
                }

            },
    
            watch:{
                selected(a,b){
             if(a){

              console.log('selected vendor')

              var dia = confirm('You are about to add the selected Dare to your list')

              if (dia){
                  
              }
               
              }
             },
            }
           
        }
    </script>
    