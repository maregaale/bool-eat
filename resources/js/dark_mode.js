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
    theme: '',
    darkThemeLinkEl: '',
    darkTheme: [],
    docHead: '',
    mix:'',
    checked: false,
  },

  mounted () {

    var x = localStorage.getItem( 'data-theme');

    if (x == 'dark') {
      this._addDarkTheme()
      this.checked = true;

    } else {
      this._removeDarkTheme();
      this.checked = false;

    }
  },
  methods: {
    _addDarkTheme() {
      this.darkThemeLinkEl = document.createElement("link");
      this.darkThemeLinkEl.setAttribute("rel", "stylesheet");
      this.darkThemeLinkEl.setAttribute("href", "/css/darktheme.css");
      this.darkThemeLinkEl.setAttribute("id", "dark-theme-style");
      this.mix = localStorage.setItem( 'data-theme', 'dark');  
    
      this.docHead = document.querySelector("head");
      this.docHead.append(this.darkThemeLinkEl);

    },
    _removeDarkTheme() {
      this.darkThemeLinkEl = document.querySelector("#dark-theme-style");
      this.docHead = this.darkThemeLinkEl.parentNode;
      this.docHead.removeChild(this.darkThemeLinkEl);
      this.mix = localStorage.setItem('data-theme', 'light');
    },
    darkThemeSwitch() {
      this.darkThemeLinkEl = document.querySelector("#dark-theme-style");
      if (!this.darkThemeLinkEl) {
        
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
  },
});


