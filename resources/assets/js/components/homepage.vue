<template>
    <div>
            <vue-particles 
            color="#9E9E9E"
            shapeType="edge"
            >
            </vue-particles>
            

    <div class="container">
    
            <h3 class="text-center">   </h3>

            
            <div class="tiles-grid mt-5">
                    <div data-role="tile" data-size="medium" class="col-1 row-11 fadeIn ani-hover-horizontal">
                            <span onclick="Metro.charms.toggle('#charm')">
                                  <span class="mif-more-vert icon"></span>
                            <span class="branding-bar">More Options</span>
                        </span>
                    </div>

                    <div data-role="tile" data-size="medium" class="col-3 row-11 bg-teal fadeIn ani-hover-horizontal">
                            <span onclick="Metro.dialog.open('#suggest')" >  <span class="mif-compass2 icon"></span>
                            <span class="branding-bar">Suggest a Dare</span>
                        </span>
                    </div>

                    <div data-role="tile" data-size="wide"  class='fadeIn ani-hover-horizontal'>
                            <span @click.prevent='board()'>  <span class="mif-clipboard icon"></span>
                            <span class="branding-bar">Leader Board</span>
                            <span class="badge-bottom">10</span>
                        </span>
                    </div>

                    
          <div data-role="tile" data-size="large" class="bg-orange fadeIn ani-hover-horizontal"
           data-effect="hover-slide-left">
                          <span  @click.prevent='dares()'>  <span class="mif-file-video icon"></span>
                            <span class="branding-bar">Watch Dares</span>
                       
                            <span class="badge-bottom">1047</span>
                        </span>
                    </div>

                    <div data-role="tile" data-size="medium" class="bg-teal fadeIn ani-hover-horizontal" >
                            <span onclick="Metro.dialog.open('#search')">  <span class="mif-search icon"></span>
                            <span class="branding-bar">Search</span>
                        </span>
                    </div>
                    
                    <div data-role="tile" data-size="medium" v-if='isAuth()'
                    style="background-color: #b82943" class='fadeIn ani-hover-horizontal'>
                            <span @click.prevent='player()'>  <span class="mif-gamepad icon"></span>
                            <span class="branding-bar">Play</span>
                        </span>
                    </div>

                    <div data-role="tile" data-size="medium" v-else
                    style="background-color: #b82943" class='fadeIn ani-hover-horizontal'>
                            <span onclick="Metro.dialog.open('#oldPlayer')">  <span class="mif-gamepad icon"></span>
                            <span class="branding-bar">Become a Player</span>
                        </span>
                    </div>

                    <div data-role="tile" data-size="wide"  style="background-color: #b82943"
                    class='fadeIn ani-hover-horizontal'>
                            <span @click.prevent='list()'>  <span class="mif-list icon"></span>
                            <span class="branding-bar">Dare List</span>
                            <span class="badge-bottom">106</span>
                        </span>
                    </div>
                </div>


                <div data-role="charms" data-opacity="0.8" id='charm' data-position="right">
                    
                    
                        <ul class="sidebar-menu white-color">
                              
                                <li><router-link to='/store'> <span class="mif-cart icon"></span> Store</router-link></li>
                                <li class="divider"></li>
                                <li><router-link to='/help'> <span class="mif-help icon"></span> How to Play</router-link></li>
                                <li class="divider"></li>
                                <li><router-link to='/rules'> <span class="mif-books icon"></span> Rules</router-link></li>
                                <li class="divider"></li>
                                <li v-if='isAuth()'><router-link to='/player-homepage'> <span class="mif-menu icon"></span> 
                                Player Menu</router-link></li>
                                <li v-else><a href='#' @click.prevent="guest()"> <span class="mif-menu icon"></span> 
                                    Player Menu</a></li>
                                <li class="divider"></li>
                                <li><a href='mailto:honred47@yahoo.com'> <span class="mif-mail icon"></span> Contact Us</a></li>
                                <li class="divider"></li>
                                <li><router-link to='/'><span class="mif-home icon"></span> Home Screen</router-link></li>
                                
                            </ul>

                </div>

                <!--dialogs suggest-->
                <div class="dialog " data-role="dialog" id='suggest' >
                        <div class="dialog-title white-color" style="background-color: #07557B">Suggest a Dare</div>
                        <div class="dialog-content">
                                <p>User name:</p>    
                            <input type="text" data-role="input" data-history="true">
                            <p>Add Description:</p>    
                     <textarea data-role="textarea" data-history="true"></textarea>
                        </div>
                        <div class="dialog-actions">
                            <button class="button primary">Send</button>
                            <button class="button alert js-dialog-close">Cancel</button>
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
    


                      <!--dialogs search-->
                <div class="dialog" data-role="dialog" id='search'>
                      
                    <div class="dialog-title white-color" style="background-color: #07557B">
                        Search</div>


                        <div class="dialog-content">
                            <p>Search by Player's username</p>
                            <input type="text" data-role="input"
                            placeholder="Enter Username" data-autocomplete="Ukraine, USA, Canada, Marokko, Singapur">
                                <br>
                                <button class="button primary">Find</button>
                        </div>

                        <hr>

                        
                        <div class="dialog-content">
                                <p>Filter by Dares</p>
                                <select data-role="select">
                                        <option class="fg-cyan">One</option>
                                        <option selected class="text-bold fg-red">Two</option>
                                        <option class="fg-green">Three</option>
                                    </select>
                        </div>

                        <div class="dialog-actions">
                            <button class="button alert js-dialog-close">Close</button>
                        </div>
                    </div>
                   
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
        mounted() {
            $(document).ready(function(){
                $(window).scrollTop(0);
            });

            //notification for neebies
            this.notify()
           
        },
        
        methods: {

            guest(){
                Metro.charms.toggle('#charm')
                Metro.dialog.open('#oldPlayer')
            },

            dares(){
                this.$router.push({name: "dares"});
            },

            board(){
                this.$router.push({name: "leaderBoard"});
            },
            list(){
                this.$router.push({name: "dareList"});
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
            notify(){
                var wel = Metro.session.getItem('welcome')

                    if(wel){
                        //old guest, do nothing
                    }else{
                        //new guest:
                        //notify and save key
                        var notify = Metro.notify;
                        notify.setup({
                            width: 300,
                            duration: 1000,
                            timeout: 6000,
                            animation: 'easeOutBounce'
                        });
                        notify.create("Welcome to Challenge App. Explore all options from this page.");
                        notify.reset();

                        Metro.session.setItem('welcome','welcome')
                    }
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


                
                            login(){
                          //validate specific reg fields
        this.$validator.validateAll('loginForm').then(() => {
             if (!this.errors.any()) {
            var activity =  Metro.activity.open({
                    type: 'metro',
                })

                    var input = {'username':this.username, 'password':this.password};
                    axios.post('/login-user',input)
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
          axios.post('/register-user',input)
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
