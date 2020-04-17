<template>
        <div>
        <div class="container white-color zoomer">
        
                <h3 class="text-center"> THEY GOT NERVE </h3>
            
                <table class="table row-hover table-border ">
                        <thead>
                        <tr >
                             <th class='white-color'>Player</th>
                            <th class='white-color'>Likes</th>
                            <th class='white-color'>Views</th>
                            <th class='white-color'>Points</th>
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
    