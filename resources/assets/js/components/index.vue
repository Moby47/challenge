<template>
    <div >
    <div class="container ">
    
        <h1 class="text-center white-color ani-heartbeat"> GOT NERVE?  </h1>
        <div data-role="cube" data-color="black"
        data-flash-color="#00B0FF"></div>

    <h3 class="text-center white-color zoomer">Choose your character</h3>
    
    <div class="row text-center zoomer">
       
        <div class="cell order-1">
            <button class="shortcut rounded primary" @click.prevent='homepage()' style="background-color: #b82943">
                <span class="caption">Watcher</span>
                <span class="mif-eye icon  ani-float"></span>
            </button>
        </div>

        <div class="cell order-2">
            <button class="shortcut rounded primary" onclick="Metro.dialog.open('#oldPlayer')"
            style="background-color: #1ba1e2">
                <span class="caption">Player</span>
                <span class="mif-gamepad icon  ani-float"></span>
            </button>
        </div>

    </div>
    

  <!--dialogs login-->
  <div class="dialog" data-role="dialog" id='oldPlayer'>
        <div class="dialog-title">Please Login To Continue</div>
        <div class="dialog-content">
                <input type="text" data-role="input" data-prepend="User name: " data-history="true">
                <br>
                <input type="password" data-role="input" data-prepend="Password: ">

                <p class='text-right'><button class="image-button" @click.prevent='newPlayer()'>
                        <span class="mif-share icon"></span>
                        <span class="caption">New Player?</span>
                    </button></p>
        </div>
        <div class="dialog-actions">
            <button class="button ">Ok</button>
            <button class="button primary js-dialog-close">Cancel</button>
        </div>
    </div>

      <!--dialogs reg-->
<div class="dialog" data-role="dialog" id='newPlayer'>
        <div class="dialog-title">Start New Game</div>
        <div class="dialog-content">
                <input type="text" data-role="input" data-prepend="User name: " data-history="true">
                <br>
                <input type="email" data-role="input" data-prepend="User name: " data-history="true">
                <br>
                <input type="password" data-role="input" data-prepend="Password: ">

                <p class='text-right'><button class="image-button" @click.prevent='oldPlayer()'>
                        <span class="mif-share icon"></span>
                        <span class="caption">Old Player?</span>
                    </button></p>
        </div>
        <div class="dialog-actions">
            <button class="button ">Ok</button>
            <button class="button primary js-dialog-close">Cancel</button>
        </div>
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
            },
            newPlayer(){
                Metro.dialog.close('#oldPlayer')
                Metro.dialog.open('#newPlayer')
            },
            oldPlayer(){
                Metro.dialog.close('#newPlayer')
                Metro.dialog.open('#oldPlayer')
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
