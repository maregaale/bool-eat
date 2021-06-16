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
    mntRestaurant: []
  },
  //Mounted
  mounted: function mounted() {
    var _this = this;

    axios.get('http://localhost:8000/api/search').then(function (resp) {
      _this.albums = resp.data;
    });
  },
  //\Mounted
  methods: {
    //Filtro per genres
    filterGenre: function filterGenre() {
      var _this2 = this;

      axios.get('http://localhost:8000/api/filterapi/' + this.search, {// params: {
        //   search: this.search
        // }
      }).then(function (result) {
        console.log(result.data);
        _this2.restaurants = result.data; //console.log(this.restaurants);
      });
    }
  }
});
/******/ })()
;