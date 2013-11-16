'use strict';

/* Filters */

angular.module('neowutran.filters', ['ui.keypress', 'ngResource']).
    filter('interpolate', ['version', function (version) {
        return function (text) {
            return String(text).replace(/\%VERSION\%/mg, version);
        }
    }]);
