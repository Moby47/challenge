<template>
        <div>
                        <div class='bg-leader'></div>

        <div class="container  fadeIn">
            
                <table class="table row-hover table-border table-striped ">
                        <thead>
                        <tr >
                             <th>Player</th>
                            <th>Likes</th>
                            <th>Views</th>
                            <th>Points</th>
                        </tr>
                        </thead>
                        <tbody>
                                <tr class="info">
                                        <td>Moby47</td>
                                        <td>400</td>
                                        <td>74</td>
                                        <td>47000</td>
                                    </tr>
                                    <tr class="info">
                                            <td>Aj101</td>
                                            <td>400</td>
                                            <td>74</td>
                                            <td>47000</td>
                                    </tr>
                                    <tr class="info">
                                            <td>Aj101</td>
                                            <td>400</td>
                                            <td>74</td>
                                            <td>47000</td>
                                    </tr>
                                    <tr class="info">
                                            <td>Aj101</td>
                                            <td>400</td>
                                            <td>74</td>
                                            <td>47000</td>
                                    </tr>
                                   
                        </tbody>
                    </table>
    
                    </div>

                    <floating></floating>

                    
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
        },

            methods: {
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
    