'use strict';

// Declare app level module which depends on filters, and services
angular.module('neowutran', ['neowutran.filters', 'neowutran.directives', 'neowutran.RestServiceConsole', 'neowutran.RestServiceIdiome', 'neowutran.RestServiceContent', 'neowutran.RestServiceGalleryImage', 'neowutran.RestServiceGalleryAudio', 'ngSanitize', 'ui.keypress', 'ngResource', 'infinite-scroll']).config(['$routeProvider', function ($routeProvider) {

    //$routeProvider.when ( '/', {templateUrl: 'partials/partial1.html', controller: ControllerTest} );
    $routeProvider.otherwise({redirectTo: '/'});
}]);
