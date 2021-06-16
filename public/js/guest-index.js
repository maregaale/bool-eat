/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
/*!*************************************!*\
  !*** ./resources/js/guest-index.js ***!
  \*************************************/
new Vue({
  el: '#app',
  data: {
    search: '',
    restaurants: [],
    selectRestaurant: '',
    genres: []
  },
  //Mounted
  mounted: function mounted() {
    var _this = this;

    axios.get('http://localhost:8000/api/genres').then(function (resp) {
      _this.genres = resp.data;
      console.log(_this.genres);
    });
  },
  //\Mounted
  methods: {
    //Filtro per genres!!!!!
    filterGenre: function filterGenre() {
      var _this2 = this;

      axios.get('http://localhost:8000/api/filterapi/' + this.search, {// params: {
        //   search: this.search
        // }
      }).then(function (result) {
        console.log(result.data);
        _this2.restaurants = result.data; //console.log(this.restaurants);
      });
    },
    //Fine Funzione Filtro per genres!!!!!!!!!!!!
    //Filtro per categorie con bottoni
    filterGenreButtons: function filterGenreButtons(value) {
      var _this3 = this;

      axios.get('http://localhost:8000/api/filterapi/' + value, {// params: {
        //   search: this.search
        // }
      }).then(function (result) {
        console.log(result.data);
        _this3.restaurants = result.data; //console.log(this.restaurants);
      });
    } // Fine Filtro per categorie con bottoni

  }
});
/******/ })()
;