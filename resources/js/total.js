new Vue ({
  el: '#total',
  data: {
    sum: 0,
  },

  mounted() {
    this.sum = JSON.parse(localStorage.getItem("sum")) || []
  },

  watch: {
    sum(newValue, oldValue) {
      localStorage.setItem("sum", JSON.stringify(newValue));
    }
  }
});