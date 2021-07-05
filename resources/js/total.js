new Vue ({
  el: '#total',
  data: {
    plates: [],
    sum: 0,
    namePlatesShow: [],
    pricesShow: [],
    usersId: [],
    display: false,
    total: 0,
    quantity: [],
    show: true,
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
    plates(newValue, oldValue) {
      localStorage.setItem("plates", JSON.stringify(newValue));
    },
    namePlatesShow(newValue, oldValue) {
      localStorage.setItem("namePlatesShow", JSON.stringify(newValue));
    },
    pricesShow(newValue, oldValue) {
      localStorage.setItem("pricesShow", JSON.stringify(newValue));
    },
    usersId(newValue, oldValue) {
      localStorage.setItem("usersId", JSON.stringify(newValue));
    },
    sum(newValue, oldValue) {
      localStorage.setItem("sum", JSON.stringify(newValue));
    },
    quantity(newValue, oldValue) {
      localStorage.setItem("quantity", JSON.stringify(newValue));
    },
  }
});


new Vue ({
  el: '#plates',
  data: {
    plates: [],
    sum: 0,
    namePlatesShow: [],
    pricesShow: [],
    usersId: [],
    display: false,
    total: 0,
    quantity: [],
    show: true,
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
    plates(newValue, oldValue) {
      localStorage.setItem("plates", JSON.stringify(newValue));
    },
    namePlatesShow(newValue, oldValue) {
      localStorage.setItem("namePlatesShow", JSON.stringify(newValue));
    },
    pricesShow(newValue, oldValue) {
      localStorage.setItem("pricesShow", JSON.stringify(newValue));
    },
    usersId(newValue, oldValue) {
      localStorage.setItem("usersId", JSON.stringify(newValue));
    },
    sum(newValue, oldValue) {
      localStorage.setItem("sum", JSON.stringify(newValue));
    },
    quantity(newValue, oldValue) {
      localStorage.setItem("quantity", JSON.stringify(newValue));
    },
  }
});