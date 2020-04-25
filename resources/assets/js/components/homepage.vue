<template>
    <div>

            
    
        <div class="desktop">
            <div class="window-area">
                <!-- content here-->

                <vue-particles 
                color="#fdf9c6"
                :particleSize="5"
                >
                </vue-particles>
              

              
                    <div class="row flex-align-center">
                        <div class="cell"></div>
                        <div class="cell mt-4">
<!--
  <div class='home-title'>
    <h2 class="text-center bold fadeIn white-color">I</h2>
    
    <h2 class="text-center bold fadeIn white-color">CHALLENGE</h2>
    
    <h2 class="text-center bold fadeIn white-color">YOU!</h2>
</div>
     -->
                       </div>
                        <div class="cell"></div>
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

        },
        
        methods: {

         

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
                            timeout: 10000,
                            animation: 'easeOutBounce'
                        });
                        notify.create("Welcome to Challenge App. A fun game of <b> <strike>Truth</strike> or Dare</b>.");
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
                    type: 'square',
                    overlayClickClose: false,
                    text: '<div class=\'mt-2 text-small text-white\'>Please, wait...</div>',
                })

                    var input = {'username':this.username, 'description':this.description};
                    axios.post('/api/suggest-dare',input)
                    .then(res => {
                        
                        var options = {
                                showTop: true,
                            }
                          if(res.data == 1){
                            Metro.toast.create('Suggestion sent!',
                             null, 5000, 'success', options);
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
                      var options = {
                                showTop: true,
                            }
                         Metro.toast.create('A temporary network error occured...',
                         null, 5000, 'yellow', options);
                       
                    })
                  }else{ //if error
                    //error is auto shown, dont worry
                  } //if error
                })//val
              
                   }, //suggest



        },

       
    }
</script>
