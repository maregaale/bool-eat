new Vue({
  el: '#cart',
  data: {
    namePlates: [],
    prices: [],
    usersId: [],
    sum: 0,
    display: false,
    total: 0,
  },

  //Methods
  methods:{
    
    addElementsToCart: function (name, price) {
      this.namePlates.push(name);
      this.prices.push(price);
    },

    totalPrice: function (price) {

      this.prices.push(price);

      this.sum = 0;

      for (let i = 0; i < this.prices.length; i++) {
        this.sum += this.prices[i];
      }

      this.display = true;
    }, 

    removePrevCart: function (name, price, index) {

      this.usersId.push(index);
      
      for (let i = 0; i < this.usersId.length; i++) {
        if (this.usersId[i] != index) {
            this.usersId = [];
  
            this.usersId.push(index);
            this.namePlates = [];
            this.prices = [];
         
          
        } else {
          this.namePlates;
          this.prices;
        }
      };

      this.namePlates.push(name);
    },

    removeCartElement: function (index) {
      
      this.namePlates.splice(index, 1);
        
    },

    removePrice: function (index, price) {
      this.prices.splice(index, 1);

      this.sum = this.sum - price;
    },

  },
  
  mounted() {
    this.usersId = []
    
    this.namePlates = JSON.parse(localStorage.getItem("namePlates")) || [],
    this.prices = JSON.parse(localStorage.getItem("prices")) || []
    this.usersId = JSON.parse(localStorage.getItem("usersId")) || []

    for (let i = 0; i < this.prices.length; i++) {
      this.sum += this.prices[i];
    }
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