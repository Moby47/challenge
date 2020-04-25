<template>
        <div>

            
        <div class="desktop">
                <div class="window-area scroll">
                    <!-- content here  <vue-particles 
                    color="#00B0FF"
                    shapeType="star"
                    linesColor="#00B0FF"
                    :particleSize="5"
                    >
                    </vue-particles>-->
                   
        
            <div class="container fadeIn">
            
                    <h3 class="text-center white-color"> Upload Dare</h3>
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
                                type="action, article@2"
                              ></v-skeleton-loader>
                            </v-sheet>
                          </template>
    
                    <span v-else>
            <form  enctype="multipart/form-data" method="POST">
            <p class='white-color'>Select Dare</p>
                   <p data-role="hint"
                   data-hint-text="Select a Dare you want to upload its video"
                    data-hint-position="top">
                    <select data-role="select" v-model='selected' v-validate='"required"' name='dare'>
                            <option selected class="text-bold" :value='con.id'
                            v-for='con in content' v-bind:key='con.id'>
                            {{con.dare_name}}</option>
                        </select></p>
                        <p class='fg-yellow shake' v-show="errors.has('dare')">{{ errors.first('dare') }}</p>
    
                    <p class='white-color'>Video upload</p>
                    <input type="file" data-role="file" data-mode="drop" name='video'
                    @change='videoSelect' v-validate='"required|ext:mp4,3gp|size:50000"'>
                    <p class='fg-yellow shake' v-show="errors.has('video')">{{ errors.first('video') }}</p>
    
                    <br>
                    <button class="button primary" @click.prevent='send()'>Done</button>
                    </form>
    
                    <div class="remark info text-center">
                            <router-link to='/pick-dare'> Click here to add another dare</router-link>
                         </div>
                         
                         <div class="remark info text-center">
                                <router-link to='/pending-dares'> Click here to view your Dare list</router-link>
                             </div>
                        </span>
    
                           
                                    <div class="info-box" data-role="infobox" id='ad' data-width='550'>
                                            <span class="button square closer"></span>
                                     <div class="info-box-content">
                                           
                                        
                                        <div data-role="carousel"
                                            data-cls-bullet="bullet-big"
                                            data-auto-start="true"
                                            data-cls-controls="fg-white"
                                            data-bullets-position="right"
                                            data-period="3000"
                                            data-control-next="<span class='mif-chevron-right fg-cyan'></span>"
                                            data-control-prev="<span class='mif-chevron-left fg-cyan'></span>"
                                       >
                                          
                                           <div class="slide" data-cover="images/rules.svg">
                                          </div>
                                       
                                           <div class="slide p-2 pl-10 pr-10" data-cover="images/help.svg">
                                           </div>
    
                                           <div class="slide" data-cover="images/rules.svg">
                                           </div>
                                          
                                              <div class="slide p-2 pl-10 pr-10" data-cover="images/help.svg">
                                              </div>
    
                                       </div>
    
    
                                       </div>
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
                    selected:'',
                    video:'',
                }
            },
            mounted() {
                $(document).ready(function(){
                    $(window).scrollTop(0);
                });

               setTimeout(function(){
                Metro.infobox.open('#ad')
               },5000)

               this.get()
            },
            
            methods: {

                send(){
         this.$validator.validateAll().then(() => {
           
           if (!this.errors.any()) {

            var dia = confirm("Upload the selected video? this can't be undone")

                if (dia){
                                //run code
            var activity =  Metro.activity.open({
                    type: 'square',
                    overlayClickClose: false,
                    text: '<div class=\'mt-2 text-small  text-white\'>Please, wait...</div>',
                })

            const formdata  = new FormData();

    //append form data to formdata
    formdata.append('selected',  this.selected);
    formdata.append('video', this.video);
    formdata.append('userid', Metro.session.getItem('userId'));

        axios.post('/api/upload-dare',formdata)
        .then(res=>{
            console.log(res)
            var options = {
                                showTop: true,
                            }

			if(res.data == 1){
        Metro.activity.close(activity);
        this.get()
      //  document.getElementById("addForm").reset();
    
      Metro.toast.create('Upload Successful!',
        null, 5000, 'success', options);
			
			}else{
        Metro.activity.close(activity);
        Metro.toast.create('An error occured, refresh and try again',
         null, 5000, 'alert', options);
			}
				
			})
			.catch(err=>{
        console.log(err)
        Metro.activity.close(activity);
      })

                }
      
            }else{
            //do nothing, v validate will work
            }
         
                    //
            })
                },


                videoSelect(event){
                this.video = event.target.files[0];
                console.log(this.video)
               
                },

                get(){
                        this.loading = true
                    fetch('/api/upload-dare-list/'+Metro.session.getItem('userId'))
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

                Pmenu(){
                    this.$router.push({name: "playerHomepage"});
                },

                back(){
                    this.$router.go(-1)
                }
                
   
            },
    
           
        }
    </script>
    