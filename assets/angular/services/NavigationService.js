app.service('NavigationService', 
  
  [
    '$http',

    function($http) {

      this.menuList = function(siteUrl, cb) {
        $http.get(siteUrl + '/api/menus').then(cb);
      }

    }
  ]

);