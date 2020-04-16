<template>
        <div class="container">
        
                <h3 class="text-center"> LIST OF DARES </h3>
            
                <table class="table striped row-hover table-border compact">
                        <thead>
                        <tr>
                             <th>Dare</th>
                            <th>Players Played</th>
                            <th>Points</th>
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
    