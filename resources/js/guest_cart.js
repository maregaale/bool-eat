new Vue({
  el: '#cart',
  data: {
    namePlates: [],
    prices: [],
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

    totalPrice: function () {
      this.sum = 0;
      for (let i = 0; i < this.prices.length; i++) {
        this.sum += this.prices[i];
        
      }

      this.display = true;
      
    }, 

    removeCartElement: function (index) {
      
      this.namePlates.splice(index, 1);
        
    },

    removePrice: function (index, price) {
      this.prices.splice(index, 1);

      this.sum = this.sum - price;
    },

    // sub: function (price) {
    //   this.total = this.sum;
      
    //     this.total -= price;

      // this.display = false;
      
    // }, 

    
  },
  // mounted() {
  //   if(localStorage.name) this.name = localStorage.name;
  // },
  mounted() {
    this.namePlates = JSON.parse(localStorage.getItem("namePlates")) || [],
    this.prices = JSON.parse(localStorage.getItem("prices")) || []

    this.namePlates = []
    this.prices = []
  },
  // watch:{
  //   name(newName) {
  //     localStorage.name = newName;
  //   }
  watch: {
    namePlates(newValue, oldValue) {
      localStorage.setItem("namePlates", JSON.stringify(newValue));
    },
    prices(newValue, oldValue) {
      localStorage.setItem("prices", JSON.stringify(newValue));
    }
  }  
  
    
   
  

    



  
  






});