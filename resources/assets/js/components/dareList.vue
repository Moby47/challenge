<template>
        <div>
        <div class="container white-color zoomer">
        
                <h3 class="text-center"> DARE LIST </h3>
            
                <table class="table row-hover table-border">
                        <thead>
                        <tr>
                             <th class='white-color'>Dare</th>
                            <th class='white-color'>Players Played</th>
                            <th class='white-color'>Points</th>
                        </tr>
                        </thead>
                        <tbody>
                                <tr>
                                        <td>learn a javascript programming syntax</td>
                                        <td>400</td>
                                        <td>74</td>
                                    </tr>
                                    <tr>
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
    
            mounted() {
                console.log('Component mounted.')
            }
        }
    </script>
    