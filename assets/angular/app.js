var app = angular.module('app', [
  'ngRoute',
  'ui.bootstrap',
  'pascalprecht.translate',
  'ngCookies']);

app.config(function($routeProvider, $locationProvider, $translateProvider) {

  var views = $('#site-url').data('url');


  var initTranslater = function(lang) {
    $translateProvider.useStaticFilesLoader({
      prefix: 'assets/lang/',
      suffix: '.json'
    });

    $translateProvider.preferredLanguage(lang);
  }

  angular.injector(['ngCookies']).invoke(['$cookies', function($cookies) {
    var lang = $cookies.get('lang');
    lang = typeof lang == "undefined"? 'fr': lang;
    console.log(lang);
    initTranslater(lang);
    $cookies.put('lang', lang);
  }]);

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
