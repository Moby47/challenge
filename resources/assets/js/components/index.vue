<template>
        <div>

    <vue-particles color="#fdf9c6">
    </vue-particles>

    
    <h2 class="text-center white-color">CHALLENGE</h2>
    <div data-role="cube" data-color="black"
    data-flash-color="#fdf9c6" class='zoomer'></div>

<h4 class="text-center white-color fadeIn">Choose a Character</h4>

<div class="row text-center fadeIn">
   
    <div class="cell order-1">
        <button class="shortcut rounded primary ani-hover-horizontal" @click.prevent='homepage()' 
        style="background-color: #b82943">
            <span class="caption">Watcher</span>
            <span class="mif-eye icon  ani-float"></span>
        </button>
    </div>

    <div class="cell order-2" v-if='isAuth()'>
        <button class="shortcut rounded primary ani-hover-horizontal" @click.prevent='homepage()' 
        style="background-color: #00B0FF">
            <span class="caption">Player</span>
            <span class="mif-gamepad icon  ani-float"></span>
        </button>
    </div>

    <div class="cell order-2" v-else>
            <button class="shortcut rounded primary ani-hover-horizontal" @click.prevent='login()' 
            style="background-color: #00B0FF">
                <span class="caption">Player</span>
                <span class="mif-gamepad icon  ani-float"></span>
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

            mounted(){


                
            },

            homepage(){
               // var sound = '/sounds/welcome.mp3'
               // var audio = new Audio(sound);
               // audio.play();

                this.$router.push({name: "homepage"});
            },
            login(){
                this.$router.push({name: "login"});
                },
            player(){
                this.$router.push({name: "playerHomepage"});
            },

        

                  //meth to check Auth
                  isAuth(){
                    if(Metro.session.getItem('userToken')){
                     // this.loggedOut = false;
                          return true;
                    }else{
                     // this.loggedOut = true;
                          return false;
                    }
                     },
        },

    }
</script>
