<template>
        <div>

    <vue-particles color="#ffffff">
    </vue-particles>

    
    <h1 class="text-center white-color ani-heartbeat">CHALLENGE</h1>
    <div data-role="cube" data-color="black"
    data-flash-color="#00B0FF" class='zoomer'></div>

<h3 class="text-center white-color fadeIn">Choose a Character</h3>

<div class="row text-center fadeIn">
   
    <div class="cell order-1">
        <button class="shortcut rounded primary ani-hover-horizontal" @click.prevent='homepage()' 
        style="background-color: #b82943">
            <span class="caption">Watcher</span>
            <span class="mif-eye icon  ani-float"></span>
        </button>
    </div>

    <div class="cell order-2">
        <button class="shortcut rounded primary ani-hover-horizontal" onclick="Metro.dialog.open('#oldPlayer')"
        style="background-color: #00B0FF">
            <span class="caption">Player</span>
            <span class="mif-gamepad icon  ani-float"></span>
        </button>
    </div>

</div>


<!--dialogs login-->
<div class="dialog" data-role="dialog" id='oldPlayer'>
    <div class="dialog-title white-color" style="background-color: #07557B">Please Login To Continue</div>
    <div class="dialog-content">
        <p>User name:</p>
            <input type="text" data-role="input" data-history="true">
           <p>Password:</p>
            <input type="password" data-role="input">

            <p class='text-right'><button class="image-button" @click.prevent='newPlayer()'>
                    <span class="mif-user-plus icon"></span>
                    <span class="caption">New Player?</span>
                </button></p>
    </div>
    <div class="dialog-actions">
        <button class="button primary">Ok</button>
        <button class="button alert js-dialog-close">Cancel</button>
    </div>
</div>

  <!--dialogs reg-->
<div class="dialog" data-role="dialog" id='newPlayer'>
    <div class="dialog-title white-color" style="background-color: #07557B">Start New Game</div>
    <div class="dialog-content">
            <p>User name:</p>
            <input type="text" data-role="input" data-history="true">
            <p>Email:</p>
            <input type="email" data-role="input" data-history="true">
           <p>Password:</p>
            <input type="password" data-role="input">

            <p class='text-right'><button class="image-button" @click.prevent='oldPlayer()'>
                    <span class="mif-user icon"></span>
                    <span class="caption">Old Player?</span>
                </button></p>
    </div>
    <div class="dialog-actions">
        <button class="button primary">Ok</button>
        <button class="button alert js-dialog-close">Cancel</button>
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
                var sound = '/sounds/welcome.mp3'
                var audio = new Audio(sound);
                audio.play();

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

    }
</script>
