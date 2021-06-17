new Vue({
  el: '#cart',
  data: {
    namePlates: [],
    prices: [],
    sum: 0,
    display: false,
  },
  //\Mounted
  
  methods:{
    
    addElementsToCart: function (name, price) {
      this.namePlates.push(name);
      this.prices.push(price);
    },

    total: function () {
      this.sum = 0;
      for (let i = 0; i < this.prices.length; i++) {
        this.sum += this.prices[i];
        
      }

      this.display = true;
      
    }

    
  },
  // mounted() {
  //   if(localStorage.name) this.name = localStorage.name;
  // },
  mounted() {
    this.namePlates = JSON.parse(localStorage.getItem("namePlates")) || [],
    this.prices = JSON.parse(localStorage.getItem("prices")) || []
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