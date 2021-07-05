new Vue ({
  el: '#success',
  data: {
    plates: [],
    usersId: [],
    namePlatesShow: [],
    pricesShow: [],
    platesId: [],
    sum: 0,
    quantity: [],
  },

  mounted() {
    this.plates = JSON.parse(localStorage.getItem("plates")) || [],
    this.platesId = JSON.parse(localStorage.getItem("platesId")) || [],
    this.namePlatesShow = JSON.parse(localStorage.getItem("namePlatesShow")) || [],
    this.pricesShow = JSON.parse(localStorage.getItem("pricesShow")) || [],
    this.usersId = JSON.parse(localStorage.getItem("usersId")) || []
    this.quantity = JSON.parse(localStorage.getItem("quantity")) || []
    this.sum = JSON.parse(localStorage.getItem("sum")) || []
  },
  
  watch: {
    plates([], oldValue) {
      localStorage.setItem("plates", JSON.stringify([]));
    },
    platesId([], oldValue) {
      localStorage.setItem("platesId", JSON.stringify([]));
    },
    namePlatesShow([], oldValue) {
      localStorage.setItem("namePlatesShow", JSON.stringify([]));
    },
    pricesShow([], oldValue) {
      localStorage.setItem("pricesShow", JSON.stringify([]));
    },
    usersId([], oldValue) {
      localStorage.setItem("usersId", JSON.stringify([]));
    },
    sum( newValue , oldValue) {
      localStorage.setItem("sum", 0);
    },
    quantity([], oldValue) {
      localStorage.setItem("quantity", JSON.stringify([]));
    },
  }
});