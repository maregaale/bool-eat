/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
/*!*************************************!*\
  !*** ./resources/js/guest-index.js ***!
  \*************************************/
new Vue({
  el: '#app',
  data: {
    search: '',
    restaurants: []
  },
  methods: {
    //Filtro per genres
    filterGenre: function filterGenre() {
      var _this = this;

      axios.get('http://localhost:8000/api/filterapi/' + this.search, {// params: {
        //   search: this.search
        // }
      }).then(function (result) {
        console.log(result.data);
        _this.restaurants = result.data; //console.log(this.restaurants);
        //return this.restaurants.filter((restaurant) => {
        //console.log(restaurant);
        //return restaurant.genres.name.toLowerCase().match(this.search);
        // this.restaurants.genres.forEach((genre) => {
        //   return genre.name.toLowerCase().match(this.search);
      }); //});
      //this.restaurants.genres = result.data.genres;
    }
  }
});
/******/ })()
;