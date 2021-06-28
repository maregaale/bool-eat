new Vue({
  el: '#scroll',

  methods: {
    // scroll up
    backToTop: function () {
      $('html,body').animate({ scrollTop: 0 }, 'slow');
  },
  },

  created: function () {        
    window.addEventListener('scroll', this.visible);
  },
});