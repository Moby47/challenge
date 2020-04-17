<template>
     
        <div class="container fadeIn">
        
    
              <!--floating left - home-->
            <v-btn 
                  fab 
                  dark
                  color="#1ba1e2"
                  small
                  relative
                  bottom
                  left
                  fixed
            @click.prevent='home()'
                    >
                  <v-icon dark>home</v-icon>
                  </v-btn>

                   <!--floating right - back-->
			<v-btn 
            fab 
            dark
            color="#b82943"
            small
            relative
            bottom
            right
            fixed
      @click.prevent='back()'
              >
            <v-icon dark>arrow_back</v-icon>
            </v-btn>
           

        </div>
    </template>



    <script>
        export default {
    
            data(){
                return {
    
                }
            },
    
            methods: {

                home(){
                    this.$router.push({name: "homepage"});
                },

                back(){
                    this.$router.go(-1)
                }
    /*
                this.$validator.validateAll().then(() => {
               
               if (!this.errors.any()) {
                //
                }else{
                //
                }
             
                        //
                })
                .catch(err=>{
                    
                }),
          
             setTimeout(func=>{
                 //this.errors.clear()
                // this.$validator.reset()
             },1) 
            
             }); //validator
    */
            },
    
            mounted() {
                console.log('Component mounted.')
            }
        }
    </script>
    