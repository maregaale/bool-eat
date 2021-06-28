new Vue({
  el: '#dark',
  data: {
    search: '',
    restaurants: [],
    restaurantName: '',
    users: [],
    genres: [],
    vegans: [],
    usersId: [],
    theme: ''
  },
  methods: {
    _addDarkTheme() {
      let darkThemeLinkEl = document.createElement("link");
      darkThemeLinkEl.setAttribute("rel", "stylesheet");
      darkThemeLinkEl.setAttribute("href", "/css/darktheme.css");
      darkThemeLinkEl.setAttribute("id", "dark-theme-style");
    
      let docHead = document.querySelector("head");
      docHead.append(darkThemeLinkEl);
    },
    _removeDarkTheme() {
      let darkThemeLinkEl = document.querySelector("#dark-theme-style");
      let parentNode = darkThemeLinkEl.parentNode;
      parentNode.removeChild(darkThemeLinkEl);
    },
    darkThemeSwitch() {
      let darkThemeLinkEl = document.querySelector("#dark-theme-style");
      if (!darkThemeLinkEl) {
        this._addDarkTheme()
      } else {
        this._removeDarkTheme()
      }
    },

    toggleTheme() {
      if (this.theme == '') {
        this.theme = 'darkmode';
        
      } else if (this.theme == 'darkmode') {
        this.theme = '';
      }
 
    },
  }



});


