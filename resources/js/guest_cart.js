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
      for (let i = 0; i < this.prices.length; i++) {
        this.sum += this.prices[i];
        
      }

      this.display = true;
      
    }

    
  },
  
  
  
    
   
  

    



  
  






});