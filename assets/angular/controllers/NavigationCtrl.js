
app.directive('menu', function() {
  return {
    restrict: 'A',
    scope: {
      menu: '=menu',
      cls: '=ngClass'
    },
    replace: true,
    template: '<ul><li ng-repeat="item in menu" menu-item="item"></li></ul>',
    link: function(scope, element, attrs) {
      element.addClass(attrs.class);
      element.addClass(scope.cls);
    }
  };
});

app.directive('menuItem', function($compile) {
  return {
    restrict: 'A',
    replace: true,
    scope: {
      item: '=menuItem'
    },
    template: '<li active-link><a href={{item.href}}>{{item.title}}</a></li>',
    link: function (scope, element, attrs) {
      if (scope.item.header) {
        element.addClass('nav-header');
        element.text(scope.item.header);
      }
      if (scope.item.divider) {
        element.addClass('divider');
        element.empty();
      }
      if (scope.item.submenu) {
        element.addClass('dropdown');

        var text = element.children('a').text();
        element.empty();
        var $a = $('<a class="dropdown-toggle">'+text+'</a>');
        element.append($a);

        var $submenu = $('<div menu="item.submenu" class="dropdown-menu"></div>');
        element.append($submenu);
      }
      if (scope.item.click) {
        console.log('hello');
        element.find('a').attr('ng-click', 'item.click()');
      }
      $compile(element.contents())(scope);
    }
  };
});


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
);

app.controller('testCtrl', ['$scope', function($scope) {
  $scope.menu = [
    {
      "title": "Home",
      "href": "#"
    },
    {
      "title": "About",
      "href": "about"
    },
    {
      "title": "History",
      "href": "about/history"
    },
    {
      "title": "Contact",
      "href": "contact"
    },
    {
      "title": "Other things - in a list. (Click here)",
      "submenu": [
        {
          "header": "Sample Header"
        },
        {
          "title": "Some Link",
          "href": "some/place"
        },
        {
          "title": "Another Link",
          "href": "some/other/place"
        },
        {
          "divider": "true"
        },
        {
          "header": "Header 2"
        },
        {
          "title": "Again...a link.",
          "href": "errrr"
        },
        {
          "title": "Nest Parent",
          "submenu": [
            {
              "title": "nested again",
              "href": "nested/again"
            },
            {
              "title": "me too",
              "href": "sample/place"
            }
          ]
        }
      ]
    }
  ];
}])