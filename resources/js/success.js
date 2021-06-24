new Vue ({
  el: '#success',
  data: {
    prices: [],
    usersId: [],
    namePlates: [],
    namePlatesShow: [],
    pricesShow: [],

    sum: 0,
    quantity: [],

  },

  mounted() {
    this.namePlates = JSON.parse(localStorage.getItem("namePlates")) || [],
    this.namePlatesShow = JSON.parse(localStorage.getItem("namePlatesShow")) || [],
    this.prices = JSON.parse(localStorage.getItem("prices")) || [],
    this.pricesShow = JSON.parse(localStorage.getItem("pricesShow")) || [],
    this.usersId = JSON.parse(localStorage.getItem("usersId")) || []
  
    this.quantity = JSON.parse(localStorage.getItem("quantity")) || []

    this.sum = JSON.parse(localStorage.getItem("sum")) || []
  },
  
  watch: {
    namePlates([], oldValue) {
      localStorage.setItem("namePlates", JSON.stringify([]));
    },
    namePlatesShow([], oldValue) {
      localStorage.setItem("namePlatesShow", JSON.stringify([]));
    },
    pricesShow([], oldValue) {
      localStorage.setItem("pricesShow", JSON.stringify([]));
    },
    prices([], oldValue) {
      localStorage.setItem("prices", JSON.stringify([]));
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