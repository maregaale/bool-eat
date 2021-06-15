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
        //this.restaurants.genres = result.data.genres;
      });
    }
    }
});