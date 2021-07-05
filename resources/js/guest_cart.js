new Vue({
  el: '#cart',
  data: {
    plates: [],
    platesId: [],
    namePlatesShow: [],
    pricesShow: [],
    usersId: [],
    sum: 0,
    display: false,
    total: 0,
    quantity: [],
    show: true,
  },

  //Methods
  methods: {

    adding: function (index) {
      // fisso quantity
      this.quantity.push(1);
      this.quantity.pop();

      this.show = false;
      this.show = true;

      // incremento
      this.quantity[index] = this.quantity[index] + 1;

      // setto la somma
      this.sum = 0;

      for (let i = 0; i < this.pricesShow.length; i++) {

        for (let k = 0; k < this.quantity[i]; k++) {

          this.sum = this.sum + this.pricesShow[i];
        }
      }
    },

    remove: function (index) {
      // fisso quantity
      this.quantity.push(1);
      this.quantity.pop();

      this.show = false;
      this.show = true;

      // decremento
      if (this.quantity[index] > 1) {

        this.quantity[index] = this.quantity[index] - 1;
      }

      // setto somma
      this.sum = 0;

      for (let i = 0; i < this.pricesShow.length; i++) {

        for (let k = 0; k < this.quantity[i]; k++) {

          this.sum = this.sum + this.pricesShow[i];
        }
      }
    },


    generalAdding: function (plate, id, name, price, index) {
      this.show = true;

      for (let i = 0; i < this.usersId.length; i++) {
        if (this.usersId[i] != index) {
          this.quantity = [];
        }
      }

      if (this.namePlatesShow.includes(name)) {
        return;
      } else {
        this.quantity.push(1);
      }

      for (let i = 0; i < this.usersId.length; i++) {
        if (this.usersId[i] != index) {
          this.namePlatesShow = [];
          this.platesId = [];
          this.plates = [];
          this.pricesShow = [];
        } 
      };

      // pusho negli id dei piatti
      if (!this.platesId.includes(id)) {
        this.platesId.push(id);
      }

      // pusho nei piatti da mostrare
      if (!this.namePlatesShow.includes(name)) {
        this.namePlatesShow.push(name);
      }

      // pusho nei piatti
      if (!this.plates.includes(plate)) {
        this.plates.push(plate);
      }

      // pusho negli id degli user
      if (!this.usersId.includes(index)) {
        this.usersId = [];
        this.usersId.push(index);
      }
    },

    totalPrice: function (price) {

      if (!this.pricesShow.includes(price)) {
        this.pricesShow.push(price);
      }

      this.sum = 0;

      for (let i = 0; i < this.pricesShow.length; i++) {

        for (let k = 0; k < this.quantity[i]; k++) {
          this.sum = this.sum + this.pricesShow[i];
        }
      }

      this.display = true;
    },

    removeCartElement: function (index) {
      this.plates.splice(index, 1);
      this.platesId.splice(index, 1);
      this.namePlatesShow.splice(index, 1);
      this.quantity.splice(index, 1);
    },

    removePrice: function (index, price) {
      this.pricesShow.splice(index, 1);

      this.sum = 0;
      for (let i = 0; i < this.pricesShow.length; i++) {
        this.sum += this.quantity[i] * this.pricesShow[i];
      }
    },
  },

  mounted() {
    this.usersId = []
    this.plates = JSON.parse(localStorage.getItem("plates")) || [],
    this.platesId = JSON.parse(localStorage.getItem("platesId")) || [],
    this.namePlatesShow = JSON.parse(localStorage.getItem("namePlatesShow")) || [],
    this.pricesShow = JSON.parse(localStorage.getItem("pricesShow")) || [],
    this.usersId = JSON.parse(localStorage.getItem("usersId")) || []
    this.quantity = JSON.parse(localStorage.getItem("quantity")) || []

    for (let i = 0; i < this.pricesShow.length; i++) {

      for (let k = 0; k < this.quantity[i]; k++) {
        this.sum = this.sum + this.pricesShow[i];
      }
    }
  },

  created() {
    this.quantity = [];
    this.quantity = JSON.parse(localStorage.getItem("quantity")) || []
  },

  watch: {
    plates(newValue, oldValue) {
      localStorage.setItem("plates", JSON.stringify(newValue));
    },
    platesId(newValue, oldValue) {
      localStorage.setItem("platesId", JSON.stringify(newValue));
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
      localStorage.setItem("quantity", JSON.stringify(this.quantity));
    },
  }
});




