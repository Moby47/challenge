<template>
    <div>


    
        <div class="desktop">
            <div class="window-area">
                <!-- content here-->
            </div>
            <taskbar></taskbar>
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
                description:'',
                dare_count:'',
                dare_vids_count:'',
            }
        },
        mounted() {
            $(document).ready(function(){
                $(window).scrollTop(0);
            });

            //notification for neebies
            this.notify()

            this.get_dare_count()
           
           this.get_dare_vids_count()
        },
        
        methods: {

            get_dare_count(){
                    fetch('/api/count-dares')
                    .then(res => res.json())
                    .then(res=>{
                        this.dare_count = res//res.data;
                    
                    
                    })
                    .catch(error =>{
                    console.log(error)
                        })
                    },

                    get_dare_vids_count(){
                    fetch('/api/count-dare-vids')
                    .then(res => res.json())
                    .then(res=>{
                        this.dare_vids_count = res//res.data;
                    
                    })
                    .catch(error =>{
                    console.log(error)
                        })
                    },

            guest(){
                Metro.charms.toggle('#charm')
                Metro.dialog.open('#oldPlayer')
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
                    overlayClickClose: false,
                    text: '<div class=\'mt-2 text-small\'>Please, wait...</div>',
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
                    overlayClickClose: false,
                    text: '<div class=\'mt-2 text-small\'>Please, wait...</div>',
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
                Metro.toast.create('Signup was Successful!',
                             null, 5000, 'success');
                             Metro.dialog.close('#newPlayer')
                            // Metro.dialog.open('#oldPlayer')
                            this.login()


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



                     suggest(){
                          //validate specific reg fields
        this.$validator.validateAll('suggForm').then(() => {
             if (!this.errors.any()) {
            var activity =  Metro.activity.open({
                    type: 'metro',
                    overlayClickClose: false,
                    text: '<div class=\'mt-2 text-small\'>Please, wait...</div>',
                })

                    var input = {'username':this.username, 'description':this.description};
                    axios.post('/api/suggest-dare',input)
                    .then(res => {
                
                          if(res.data == 1){
                            Metro.toast.create('Suggestion sent!',
                             null, 5000, 'success');
                             Metro.dialog.close('#suggest')
                             Metro.activity.close(activity);

                             setTimeout(func=>{
                                this.username = '';
                                this.description = '';
                                
                             //   setTimeout(func=>{
                               //     this.errors.clear();
                               //   },5)
                                },2000)
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
              
                   }, //suggest



        },

       
    }
</script>
