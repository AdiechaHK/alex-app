app.controller('NavigationCtrl',
  [ 
    '$scope', 
    'NavigationService',

    function($scope, NavigationService) {

      var menus = {};

      var init = function() {
        var siteUrl = $('#site-url').data('url');
        NavigationService.menuList(siteUrl, function(res) {
          menus = res.data;
        });
      }

      $scope.getBaseMenus = function() { return menus.base_list; };

      $scope.getLink = function() { return '#'; };

      $scope.getSubMenu = function(key) { return menus[key]; };

      init();
    }
  ]
)