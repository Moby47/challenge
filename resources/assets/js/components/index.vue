<template>
    <div class="container">
    
        <h1 class="text-center"> GOT NERVE?  </h1>
        <div data-role="cube" data-color="black"
        data-flash-color="grey"></div>

    <h3 class="text-center">Choose your character</h3>
    
    <div class="row text-center">
       
        <div class="cell order-1">
            <button class="shortcut default" @click.prevent='homepage()'>
                <span class="caption">Watcher</span>
                <span class="mif-rocket icon"></span>
            </button>
        </div>

        <div class="cell order-2">
            <button class="shortcut default">
                <span class="caption">Player</span>
                <span class="mif-rocket icon"></span>
            </button>
        </div>

    </div>
    


    </div>
</template>

<script>
    export default {

        data(){
            return {

            }
        },

        methods: {

            homepage(){
                this.$router.push({name: "homepage"});
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
