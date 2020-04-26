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


<!--dialogs login-
<div class="dialog" data-role="dialog" id='oldPlayer'>
  
    <form method="post" data-vv-scope='loginForm'>
            <div class="dialog-title white-color" style="background-color: #07557B">Login To Continue</div>

     <div class="dialog-content">
        <p>User name:</p>
     <input type="text" data-role="input" data-history="true" name="Username"
      v-model='username' v-validate='"required|max:15"'>
      <p class='fg-red shake' v-show="errors.has('loginForm.Username')">{{ errors.first('loginForm.Username') }}</p>
           <p>Password:</p>
     <input type="password" data-role="input" name="Password" 
     v-model='password' v-validate='"required"'>
     <p class='fg-red shake' v-show="errors.has('loginForm.Password')">{{ errors.first('loginForm.Password') }}</p>

            <p class='text-right'><button class="image-button" @click.prevent='newPlayer()'>
                    <span class="mif-user-plus icon"></span>
                    <span class="caption">New Player?</span>
                </button></p>
    </div>
    <div class="dialog-actions">
        <button class="button primary" @click.prevent='login()'>Ok</button>
        <button class="button alert js-dialog-close" @click.prevent=''>Cancel</button>
    </div>
    </form>
</div>

  -dialogs reg--
<div class="dialog" data-role="dialog" id='newPlayer'>
        <form method="post" data-vv-scope='regForm'>
    <div class="dialog-title white-color" style="background-color: #07557B">Start New Game</div>
    <div class="dialog-content">
            <p>User name:</p>
            <input type="text" data-role="input" data-history="true" name="Username"
            v-model='username' v-validate='"required|max:15"'>
            <p class='fg-red shake' v-show="errors.has('regForm.Username')">{{ errors.first('regForm.Username') }}</p>
            <p>Email:</p>
            <input type="email" data-role="input" data-history="true" name="Email"
             v-model='email' v-validate='"required|email|max:100"'>
             <p class='fg-red shake' v-show="errors.has('regForm.Email')">{{ errors.first('regForm.Email') }}</p>
           <p>Password:</p>
            <input type="password" data-role="input" name="Password" 
            v-model='password' v-validate='"required"'>
            <p class='fg-red shake' v-show="errors.has('regForm.Password')">{{ errors.first('regForm.Password') }}</p>

            <p class='text-right'><button class="image-button" @click.prevent='oldPlayer()'>
                    <span class="mif-user icon"></span>
                    <span class="caption">Old Player?</span>
                </button></p>
    </div>
    <div class="dialog-actions">
        <button class="button primary"  @click.prevent='reg()'>Ok</button>
        <button class="button alert js-dialog-close" @click.prevent=''>Cancel</button>
    </div>
    </form>
</div>
-->

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
