new Vue({
    el: '#app',
    data: {
        search: '',
        restaurants: [],
        selectRestaurant: '',
        mntRestaurant: []
    },
    //Mounted
    mounted: function() {
      axios.get('http://localhost:8000/api/search')
      .then( (resp) => {
         this.albums = resp.data;
      });
 
 
 
    },
    //\Mounted

    methods:{
    //Filtro per genres
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
         
       
      
    }

  }





});