var app = angular.module('app', ['ngRoute', 'ui.bootstrap']);


app.run(function($rootScope) {
    // var views = $('#site-url').data('url');
    // $rootScope.$on("$locationChangeStart", function(event, next, current) { 
    //     console.log(current);
    // });
});

app.config(function($routeProvider, $locationProvider) {

  var views = $('#site-url').data('url');

  $routeProvider
   .when('/show/:id', {
    templateUrl: function(params) {
      return views + '/views/show/' + params.id;
    }
   })
   .when('/page/:page', {templateUrl: function(params) {
      return views.substr(0, views.indexOf('index.php')) + 'assets/angular/views/' + params.page + '.html';
    }
   })
     .when('/Book/:bookId', {
    templateUrl: 'book.html',
    controller: 'BookController',
    resolve: {
      // I will cause a 1 second delay
      delay: function($q, $timeout) {
        var delay = $q.defer();
        $timeout(delay.resolve, 1000);
        return delay.promise;
      }
    }
  })
  .when('/Book/:bookId/ch/:chapterId', {
    templateUrl: 'chapter.html',
    controller: 'ChapterController'
  });

  // configure html5 to get links working on jsfiddle
  // $locationProvider.html5Mode(true);
});
