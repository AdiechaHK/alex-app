app.controller('NavigationCtrl',
  [
    '$scope', 
    '$translate',
    '$cookies',
    '$location',

    function($scope, $translate, $cookies, $location) {

      var lastJson = null;

      var setLang = function(lang) {
        $translate.use(lang);
        $cookies.put('lang', lang);
        $scope.lang = lang;
      }

      var getLink = function(json) {
        var path = json.link;
        if(json.type == "PAGE") {
          path = "/" + $scope.lang + "/show/" + json.page;
        } else if(json.type == "PARENT") {
          path = "";
        }
        return path;
      }

      var init = function() {
        $scope.lang = $translate.use();
        if(typeof $scope.lang == "undefined") setLang($cookies.get('lang'));
      }
      
      $scope.changeLang = function() {
        setLang($scope.lang);
        if(lastJson != null) {
          $scope.linkTo(lastJson);
        }
      }

      $scope.linkTo = function(json) {
        lastJson = json;
        var path = getLink(json);
        $location.path(path);
      }

      $scope.setClass = function(json) {
        console.log(json);
        var currentPath = $location.path();
        var jsonPath = getLink(json);
        console.log(currentPath + " :: " + jsonPath);
        var cls = currentPath == jsonPath ? "active": "";
        console.log("Class: "+ cls);
        return cls;
      }

      init();
    }
  ]
);