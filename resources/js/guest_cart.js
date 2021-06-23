new Vue({
  el: '#cart',
  data: {
    namePlatesShow: [],
    pricesShow: [],
    namePlates: [],
    prices: [],
    usersId: [],
    sum: 0,
    display: false,
    total: 0,
    quantity: [],
    show: true,
  },

  //Methods
  methods:{
    addStorage: function (params) {
      
      this.quantity = this.quantity;
    },

    adding: function (index) {
      this.show = false;
      
      this.quantity[index] = this.quantity[index] + 1;
      
      this.show = true;
      
      this.sum = 0;
      
      for (let i = 0; i < this.pricesShow.length; i++) {

        for (let k = 0; k < this.quantity[i]; k++) {
          
          this.sum = this.sum + this.pricesShow[i];
        }
      }
    },

    remove: function (index) {
      this.show = false;

      if (this.quantity[index] > 1) {
        
        this.quantity[index] = this.quantity[index] - 1;
      }
      
      this.show = true;
      
      this.sum = 0;
      
      for (let i = 0; i < this.pricesShow.length; i++) {

        for (let k = 0; k < this.quantity[i]; k++) {
          
          this.sum = this.sum + this.pricesShow[i];
        }
      }
    },

    summatory: function () {

      this.sum = 0;
      this.prices = [];

      for (let i = 0; i < this.namePlates.length; i++) {

        for (let k = 0; k < this.quantity[i] - 1; k++) {
          
          this.namePlates.push(this.namePlates[i]);
        }
      }

      for (let i = 0; i < this.namePlatesShow.length; i++) {
        
        for (let k = 0; k < this.quantity[i]; k++) {
          this.prices.push(this.pricesShow[i]);
        }
      }
      
      for (let i = 0; i < this.prices.length; i++) {
        this.sum += this.prices[i];
      }
    },
    
    addElementsToCart: function (name, price) {
      this.namePlates.push(name);
      this.prices.push(price);
    },
    
    removePrevCart: function (name, price, index) {
      
      this.show = true;

      this.usersId.push(index);

      if (this.namePlatesShow.includes(name)) {
        return;
      } else {
        this.quantity.push(1);
      }
      
      for (let i = 0; i < this.usersId.length; i++) {
        if (this.usersId[i] != index) {
            this.usersId = [];
  
            this.usersId.push(index);
            this.namePlates = [];
            this.namePlatesShow = [];

            this.prices = [];
            this.pricesShow = [];
        } else {
          this.namePlates;
          this.prices;
        }
      };

      this.namePlates.push(name);

      if (!this.namePlatesShow.includes(name)) {
        this.namePlatesShow.push(name);
      }

    },

    totalPrice: function (price) {
      if (!this.pricesShow.includes(price)) {
        this.pricesShow.push(price);
      }
      
      this.prices.push(price);

      this.sum = 0;

      for (let i = 0; i < this.pricesShow.length; i++) {

        for (let k = 0; k < this.quantity[i]; k++) {
          
          this.sum = this.sum + this.pricesShow[i];
        }
      }

      this.display = true;
    }, 

    removeCartElement: function (index) {
      
      this.namePlates.splice(index, 1);
      this.namePlatesShow.splice(index, 1);
      this.quantity.splice(index, 1);
    },

    removePrice: function (index, price) {
      this.prices.splice(index, 1);
      this.pricesShow.splice(index, 1);
      
      this.sum = 0;
      for (let i = 0; i < this.pricesShow.length; i++) {
          this.sum += this.quantity[i] * this.pricesShow[i];
      }
    },
  },
  
  mounted() {
    this.usersId = []

    this.quantity = JSON.parse(localStorage.getItem("quantity")) || [],
    this.namePlates = JSON.parse(localStorage.getItem("namePlates")) || [],
    this.namePlatesShow = JSON.parse(localStorage.getItem("namePlatesShow")) || [],
    this.prices = JSON.parse(localStorage.getItem("prices")) || [],
    this.pricesShow = JSON.parse(localStorage.getItem("pricesShow")) || [],
    this.usersId = JSON.parse(localStorage.getItem("usersId")) || []

    for (let i = 0; i < this.pricesShow.length; i++) {

      for (let k = 0; k < this.quantity[i]; k++) {
        
        this.sum = this.sum + this.pricesShow[i];
      }
    }
  },
  
  watch: {
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




