new Vue({
    el: '#app',
    data: {
        search: '',
        restaurants: [],
        restaurantName: '',
        users: [],
        genres: []
    },
    //Mounted
    mounted: function() {
      axios.get('http://localhost:8000/api/genres')
      .then( (resp) => {
         this.genres = resp.data;
         console.log(this.genres);
      });
 
 
 
    },
    //\Mounted

    methods:{
    //Filtro per genres!!!!!
    filterGenre: function() {
     
    axios.get('http://localhost:8000/api/filterapi/' + this.search, {
        // params: {
        //   search: this.search
        // }
      }).then((result)=>{
        
        console.log(result.data);
        this.restaurants = result.data;
        //console.log(this.restaurants);
           });
         
    },
    //Fine Funzione Filtro per genres!!!!!!!!!!!!


    //Filtro per categorie con bottoni
    filterGenreButtons: function(value) {
      
     
      axios.get('http://localhost:8000/api/filterapi/' + value, {
          // params: {
          //   search: this.search
          // }
        }).then((result)=>{
          
          console.log(result.data);
          this.restaurants = result.data;
          //console.log(this.restaurants);
             });
           
      },
      // Fine Filtro per categorie con bottoni

      searchName: function() {
        let link = 'http://localhost:8000/api/names'
        axios.get(link,{
            params: {
              restaurant_name:this.restaurantName
            }
          }).then((result)=>{
            this.users = result.data;
          });
        }



  }





});