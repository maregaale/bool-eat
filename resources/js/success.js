new Vue ({
  el: '#success',
  data: {
    prices: [],
    usersId: [],
    namePlates: [],
    sum: 0,

  },

  mounted() {
    
    this.namePlates = JSON.parse(localStorage.getItem("namePlates")) || [],
    this.prices = JSON.parse(localStorage.getItem("prices")) || []
    this.usersId = JSON.parse(localStorage.getItem("usersId")) || []
    this.sum = JSON.parse(localStorage.getItem("sum")) || []
    
    this.usersId = []
    this.prices = []
    this.namePlates = []
    this.sum = 0

    
  },
  
  watch: {
    namePlates(newValue, oldValue) {
      localStorage.setItem("namePlates", JSON.stringify(newValue));
    },
    prices(newValue, oldValue) {
      localStorage.setItem("prices", JSON.stringify(newValue));
    },
    usersId(newValue, oldValue) {
      localStorage.setItem("usersId", JSON.stringify(newValue));
    },
    sum(newValue, oldValue) {
      localStorage.setItem("sum", JSON.stringify(newValue));
    }
  }

});