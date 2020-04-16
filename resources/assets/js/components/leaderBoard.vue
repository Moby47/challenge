<template>
        <div class="container">
        
                <h3 class="text-center"> THEY GOT NERVE </h3>
            
                <table class="table striped row-hover table-border compact">
                        <thead>
                        <tr>
                             <th>Player</th>
                            <th>Likes</th>
                            <th>Views</th>
                            <th>Points</th>
                        </tr>
                        </thead>
                        <tbody>
                                <tr>
                                        <td>Moby47</td>
                                        <td>400</td>
                                        <td>74</td>
                                        <td>47000</td>
                                    </tr>
                                    <tr>
                                            <td>Aj101</td>
                                            <td>400</td>
                                            <td>74</td>
                                            <td>47000</td>
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
    