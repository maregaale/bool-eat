new Vue ({
  el: '#total',
  data: {
    plates: [],
    sum: 0,
    namePlatesShow: [],
    pricesShow: [],
    namePlates: [],
    prices: [],
    usersId: [],
    display: false,
    total: 0,
    quantity: [],
    show: true,
  },

  
  

  mounted() {
    this.plates = JSON.parse(localStorage.getItem("plates")) || [],
    this.platesId = JSON.parse(localStorage.getItem("platesId")) || [],
    this.namePlates = JSON.parse(localStorage.getItem("namePlates")) || [],
    this.namePlatesShow = JSON.parse(localStorage.getItem("namePlatesShow")) || [],
    this.prices = JSON.parse(localStorage.getItem("prices")) || [],
    this.pricesShow = JSON.parse(localStorage.getItem("pricesShow")) || [],
    this.usersId = JSON.parse(localStorage.getItem("usersId")) || []


    this.quantity = JSON.parse(localStorage.getItem("quantity")) || []
    this.sum = JSON.parse(localStorage.getItem("sum")) || []
  },

  

  watch: {
    plates(newValue, oldValue) {
      localStorage.setItem("plates", JSON.stringify(newValue));
    },
    namePlates(newValue, oldValue) {
      localStorage.setItem("namePlates", JSON.stringify(newValue));
    },
    namePlatesShow(newValue, oldValue) {
      localStorage.setItem("namePlatesShow", JSON.stringify(newValue));
    },
    prices(newValue, oldValue) {
      localStorage.setItem("prices", JSON.stringify(newValue));
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
    namePlates: [],
    prices: [],
    usersId: [],
    display: false,
    total: 0,
    quantity: [],
    show: true,
  },

  
  

  mounted() {
    this.plates = JSON.parse(localStorage.getItem("plates")) || [],
    this.platesId = JSON.parse(localStorage.getItem("platesId")) || [],
    this.namePlates = JSON.parse(localStorage.getItem("namePlates")) || [],
    this.namePlatesShow = JSON.parse(localStorage.getItem("namePlatesShow")) || [],
    this.prices = JSON.parse(localStorage.getItem("prices")) || [],
    this.pricesShow = JSON.parse(localStorage.getItem("pricesShow")) || [],
    this.usersId = JSON.parse(localStorage.getItem("usersId")) || []


    this.quantity = JSON.parse(localStorage.getItem("quantity")) || []
    this.sum = JSON.parse(localStorage.getItem("sum")) || []
  },

  

  watch: {
    plates(newValue, oldValue) {
      localStorage.setItem("plates", JSON.stringify(newValue));
    },
    namePlates(newValue, oldValue) {
      localStorage.setItem("namePlates", JSON.stringify(newValue));
    },
    namePlatesShow(newValue, oldValue) {
      localStorage.setItem("namePlatesShow", JSON.stringify(newValue));
    },
    prices(newValue, oldValue) {
      localStorage.setItem("prices", JSON.stringify(newValue));
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