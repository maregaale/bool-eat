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

    totalPrice: function () {
      this.sum = 0;
      for (let i = 0; i < this.prices.length; i++) {
        this.sum += this.prices[i];
        
      }

      this.display = true;
      
    }, 

    removePrevCart: function (name, price, index) {

      this.usersId.push(index);
      var pippo = [];
      pippo = JSON.parse(localStorage.getItem("usersId"));
      pippo.push(index);
      for (let i = 0; i < pippo.length; i++) {
        if (pippo[i] != index) {
          pippo = [];

          pippo.push(index);
          this.namePlates = [];
          this.prices = [];
          this.namePlates.push(name);
          this.prices.push(price);
        } else {
          this.namePlates = [];
          this.prices = [];
          this.namePlates.push(name);
          this.prices.push(price);
        }
      };
      

      console.log(pippo);
      console.log(this.namePlates);
      // if (index !== index) {
      //   this.namePlates.splice(-1);
      //   this.prices.splice(-1);
      // }

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
    this.usersId = JSON.parse(localStorage.getItem("usersId")) || []

    // this.namePlates = []
    // this.prices = []
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
    },
    usersId(newValue, oldValue) {
      localStorage.setItem("usersId", JSON.stringify(newValue));
    }
  }  
  
    
   
  

    



  
  






});