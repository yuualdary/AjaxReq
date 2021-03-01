<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div id="app">
        <ul>
         </ul>
        <br>
        <label for="">Add Name</label><br>
        <input type="text" v-model="newValue" @keyup.enter="AddName">
        <br>

        <ul>
            <li v-for="(nama, index) in names">
            <button type="button" v-on:click="RemoveName(index,nama)">Delete</button>
            @{{nama.name}}

            {{-- <input type="text" v-model="newValue"> --}}
            <button type="button" v-on:click="EditName(index)">Edit</button>
        </li>
  



        </ul>


    </div>
        <script src="https://cdn.jsdelivr.net/npm/vue@2.6.12/dist/vue.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/vue-resource@1.5.1"></script>

        <script>
        new Vue({
            el : "#app",
            data :{
                content:"",
                newValue:"",
                names:[]
        
            },
            methods:{
                
                AddName: function(){
                    let TextInput = this.newValue.trim();
                    if(TextInput){
                    this.$http.post('/api/create', {name: TextInput}).then(response => {
                        this.names.unshift(
                            {name : TextInput}
                        )
                           
                    });
                }
                 
                    // this.names.push(this.content);
                    // this.content='';
                },
                
                RemoveName: function(index,nama){
                    this.$http.delete('/api/userdelete/'+ nama.id).then(response => {
                          this.names.splice(index,1)
                     });

                },
                ToggleComplete :function(){
                    todo.done = !todo.done  
                    },
                EditName: function(index){
                    this.names.splice(index,1,this.newValue)
                },
        
           
            
            },
            mounted: function(){
                 // GET /someUrl
                  this.$http.get('/api/user').then(response => {
                let result = response.body.data
                // get body data
                    this.names=result
                });
            },
          
        });
        </script>
       
      
        
   
</body>
</html>