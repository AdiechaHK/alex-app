app.controller('NavigationCtrl',
  [
    '$scope', 
    '$translate',
    '$cookies',

    function($scope, $translate, $cookies) {

      var setLang = function(lang) {
        $translate.use(lang);
        $cookies.put('lang', lang);
        $scope.lang = lang;
      }

      var init = function() {
        $scope.lang = $translate.use();
        if(typeof $scope.lang == "undefined") setLang($cookies.get('lang'));
      }
      
      $scope.changeLang = function() {
        setLang($scope.lang);
      }

      init();
    }
  ]
);