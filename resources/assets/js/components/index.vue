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

    <div class="cell order-2" v-if='isAuth()'>
        <button class="shortcut rounded primary ani-hover-horizontal" @click.prevent='player()'
        style="background-color: #00B0FF">
            <span class="caption">Player</span>
            <span class="mif-gamepad icon  ani-float"></span>
        </button>
    </div>

    <div class="cell order-2" v-else>
            <button class="shortcut rounded primary ani-hover-horizontal" onclick="Metro.dialog.open('#oldPlayer')"
            style="background-color: #00B0FF">
                <span class="caption">Player</span>
                <span class="mif-gamepad icon  ani-float"></span>
            </button>
        </div>

</div>


<!--dialogs login-->
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

  <!--dialogs reg-->
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


</div>

</template>


<script>
    export default {

        data(){
            return {
                email:'',
                password:'',
                username:'',
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
            newPlayer(){
                Metro.dialog.close('#oldPlayer')
                Metro.dialog.open('#newPlayer')
            },
            oldPlayer(){
                Metro.dialog.close('#newPlayer')
                Metro.dialog.open('#oldPlayer')
            },
            player(){
                this.$router.push({name: "playerHomepage"});
            },

            login(){
                          //validate specific reg fields
        this.$validator.validateAll('loginForm').then(() => {
             if (!this.errors.any()) {
            var activity =  Metro.activity.open({
                    type: 'metro',
                })

                    var input = {'username':this.username, 'password':this.password};
                    axios.post('/api/login-user',input)
                    .then(res => {
                    var result = res.data.result;

                    
                         if(result == 2){
                            Metro.toast.create('Login failed. Invalid credentials. Refresh and try again',
                             null, 5000, 'yellow');
                             Metro.activity.close(activity);
                          }else{
                            Metro.toast.create('Login Successful!',
                             null, 5000, 'success');
                             Metro.dialog.close('#oldPlayer')
                            //start login 
                               Metro.session.setItem('userToken',res.data.token);
                               Metro.session.setItem('userId',res.data.id);
                               Metro.session.setItem('userName',res.data.username);
                               Metro.activity.close(activity);
                               this.$router.push({name: "playerHomepage"});
                          }
                    })
                    .catch(error =>{
                        Metro.activity.close(activity);
                      console.log(error)
                    })
                  }else{ //if error
                    //error is auto shown, dont worry
                  } //if error
                })//val
              
                   }, //login



                   reg(){
                          //validate
            this.$validator.validateAll('regForm').then(() => {
             if (!this.errors.any()) {
              
              var activity =  Metro.activity.open({
                    type: 'metro',
                })

          //start registeration
          var input = {'username':this.username,'email':this.email,
          'password':this.password };
      
      //send to database with axios
          axios.post('/api/register-user',input)
          .then(res=>{
              console.log(res)
        if(res.data == 1){
            Metro.activity.close(activity);
                Metro.toast.create('Signup was Successful! Please Login',
                             null, 5000, 'success');
                             Metro.dialog.close('#newPlayer')
                             Metro.dialog.open('#oldPlayer')
  

        }else{
            Metro.toast.create('An error occured!',
                             null, 5000, 'alert');
                             Metro.activity.close(activity);
        }

        })
        .catch(error=>{
          console.log(error)
          Metro.activity.close(activity);

          if(error.response.status == 422){
           
            Metro.toast.create('This Email has been taken.',
                             null, 5000, 'yellow');
          }else{
    Metro.toast.create('Please verify that your inputs are correct',
                             null, 5000, 'alert');
          } 
        })
          //start registeration - end
         
        // }
    
//read pId for saving on reg
 
             }else{
               console.log('vee errors exist')
               //val err
               //do nothing, vee val got u
             }
             })//val
            
                  }, //reg

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
