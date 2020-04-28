<template>
        <div>

    
    <h2 class="text-center white-color">404 - Page Not Found</h2>
    

<h4 class="text-center white-color fadeIn">Choose a Character</h4>

<div class="row text-center fadeIn">
   
    <div class="cell order-1">
        <button class="shortcut rounded primary ani-hover-horizontal" @click.prevent='homepage()' 
        style="background-color: #b82943">
            <span class="caption">Watcher</span>
            <span class="mif-eye icon  ani-float"></span>
        </button>
    </div>

    <div class="cell order-2">
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
            homepage(){
                this.$router.push({name: "homepage"});
            },
            login(){
                this.$router.push({name: "login"});
                },
        
        },

    }
</script>
