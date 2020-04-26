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


        },

       
    }
</script>
