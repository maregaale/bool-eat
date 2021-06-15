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

      axios.get('http://localhost:8000/api/search', {
        params: {
          search: this.search
        }
      }).then(function (result) {
        console.log(result.data);
        _this.restaurants = result.data;
        console.log(_this.restaurants);
        return _this.restaurants.filter(function (restaurant) {
          console.log(restaurant);
          return restaurant.genres.name.toLowerCase().match(_this.search); // this.restaurants.genres.forEach((genre) => {
          //   return genre.name.toLowerCase().match(this.search);
        });
      }); //this.restaurants.genres = result.data.genres;
    }
  }
});
/******/ })()
;