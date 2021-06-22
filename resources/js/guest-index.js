new Vue({
  el: '#app',
  data: {
    search: '',
    restaurants: [],
    // restaurant_image: [
    //   'https://images.unsplash.com/photo-1552566626-52f8b828add9?ixid=MnwxMjA3fDB8MHxzZWFyY2h8MXx8cmVzdGF1cmFudHxlbnwwfHwwfHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=60',
    //   'https://images.unsplash.com/photo-1517248135467-4c7edcad34c4?ixid=MnwxMjA3fDB8MHxzZWFyY2h8MTh8fHJlc3RhdXJhbnR8ZW58MHx8MHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=60',
    //   'https://images.unsplash.com/photo-1551632436-cbf8dd35adfa?ixid=MnwxMjA3fDB8MHxzZWFyY2h8OXx8cmVzdGF1cmFudHxlbnwwfHwwfHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=60',
    //   'https://images.unsplash.com/photo-1498654896293-37aacf113fd9?ixid=MnwxMjA3fDB8MHxzZWFyY2h8MTF8fHJlc3RhdXJhbnR8ZW58MHx8MHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=60',
    //   'https://images.unsplash.com/photo-1514933651103-005eec06c04b?ixid=MnwxMjA3fDB8MHxzZWFyY2h8Mnx8cmVzdGF1cmFudHxlbnwwfHwwfHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=60',
    //   'https://images.unsplash.com/photo-1579027989536-b7b1f875659b?ixid=MnwxMjA3fDB8MHxzZWFyY2h8Mjl8fHJlc3RhdXJhbnR8ZW58MHx8MHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=60',
    //   'https://images.unsplash.com/photo-1546195643-70f48f9c5b87?ixid=MnwxMjA3fDB8MHxzZWFyY2h8Mzd8fHJlc3RhdXJhbnR8ZW58MHx8MHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=60',
    //   'https://images.unsplash.com/photo-1505275350441-83dcda8eeef5?ixid=MnwxMjA3fDB8MHxzZWFyY2h8Mzh8fHJlc3RhdXJhbnR8ZW58MHx8MHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=60',
    //   'https://images.unsplash.com/photo-1564758866811-4780aa0a1f49?ixid=MnwxMjA3fDB8MHxzZWFyY2h8NTV8fHJlc3RhdXJhbnR8ZW58MHx8MHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=60'
    // ],
    restaurantName: '',
    users: [],
    genres: [],
    vegans: [],
    usersId: [],
  },
  //Mounted
  mounted: function () {
    axios.get('http://localhost:8000/api/genres')
      .then((resp) => {
        this.genres = resp.data;
        console.log(this.genres);
      });

    axios.get('http://localhost:8000/api/vegan')
      .then((resp) => {
        this.vegans = resp.data;
        console.log(this.vegans);
      });


    // this.usersId = JSON.parse(localStorage.getItem("usersId")) || []




  },
  //\Mounted

  // watch: {
  //   usersId(newValue, oldValue) {
  //     localStorage.setItem("usersId", JSON.stringify(newValue));
  //   }
  // },

  methods: {
    //Filtro per genres!!!!!
    filterGenre: function () {

      axios.get('http://localhost:8000/api/filterapi/' + this.search, {
        // params: {
        //   search: this.search
        // }
      }).then((result) => {

        console.log(result.data);
        this.restaurants = result.data;
        //console.log(this.restaurants);
      });

    },
    //Fine Funzione Filtro per genres!!!!!!!!!!!!


    //Filtro per categorie con bottoni
    filterGenreButtons: function (value) {


      axios.get('http://localhost:8000/api/filterapi/' + value, {
        // params: {
        //   search: this.search
        // }
      }).then((result) => {
        this.users = [];

        console.log(result.data);
        this.restaurants = result.data;
        //console.log(this.restaurants);
      });

    },
    // Fine Filtro per categorie con bottoni

    searchName: function () {
      let link = 'http://localhost:8000/api/names'
      axios.get(link, {
        params: {
          restaurant_name: this.restaurantName
        }
      }).then((result) => {
        this.restaurants = [];

        this.users = result.data;
      });
    },
    // message: function (id) {
    //   console.log(this.usersId);
    //   if (id != this.usersId[0]) {
    //     alert();
    //   }
    // },
  },
});