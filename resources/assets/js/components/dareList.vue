<template>
        <div>

                <div class='bg-darelist'></div>

        <div class="container fadeIn">
        
                <h3 class="text-center"> </h3>
            
                <table class="table row-hover table-border">
                        <thead>
                        <tr>
                             <th>Dare</th>
                            <th>Players Played</th>
                            <th>Points</th>
                        </tr>
                        </thead>
                        <tbody>
                                <tr class="info">
                                        <td>learn a javascript programming syntax</td>
                                        <td>400</td>
                                        <td>74</td>
                                    </tr>
                                    <tr class="info">
                                            <td>watch a scary movie</td>
                                            <td>40</td>
                                            <td>74</td>
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
    