new Vue({
  el: '#cart',
  data: {
    namePlates: [],
    prices: [],
  },
  //Mounted
  mounted: function() {
    



  },
  //\Mounted

  methods:{

    addElementsToCart: function (name, price) {
      this.namePlates.push(name);
      this.prices.push(price);
    }

  },
  






});