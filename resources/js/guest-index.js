new Vue({
    el: '#app',
    data: {
        search: '',
        restaurants: []
    },
    methods:{
    //Filtro per genres
    filterGenre: function() {
     
    axios.get('http://localhost:8000/api/search',{
        params: {
          search: this.search
        }
      }).then((result)=>{
        
        console.log(result.data);
        this.restaurants = result.data;
        console.log(this.restaurants);
        return this.restaurants.filter((restaurant) => {
          console.log(restaurant);
           return restaurant.genres.name.toLowerCase().match(this.search);
           
          // this.restaurants.genres.forEach((genre) => {
          //   return genre.name.toLowerCase().match(this.search);
           });
         
       });
        //this.restaurants.genres = result.data.genres;
      
     
    }
  }





});