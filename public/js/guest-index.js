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

      axios.get('http://localhost:8000/api/filter', {
        params: {
          search: this.search
        }
      }).then(function (result) {
        console.log(result.data);
        _this.restaurants = result.data;
      });
    }
  }
});
/******/ })()
;