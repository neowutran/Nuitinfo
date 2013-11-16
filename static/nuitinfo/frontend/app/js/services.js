'use strict';

/* Services */

angular.module('neowutran.RestServiceConsole', ['ngResource']).factory('Console', function ($resource) {
    return $resource('https://presentation.sephirothgeek.ch/api/console/execute/:command', {}, {
        query: {method: 'GET', params: {command: 'command'}, isArray: true}
    });
});

angular.module('neowutran.RestServiceIdiome', ['ngResource']).factory('Idiome', function ($resource) {
    return $resource('https://presentation.sephirothgeek.ch/api/idiome/view', {}, {
        query: {method: 'GET', isArray: true}
    });
});

angular.module('neowutran.RestServiceContent', ['ngResource']).factory('Content', function ($resource) {
    return $resource('https://presentation.sephirothgeek.ch/api/content/view/?page=:page&user=:user', {}, {
        query: {method: 'GET', params: {page: 'page', user: 'user'}, isArray: true}
    });
});

angular.module('neowutran.RestServiceGalleryImage', ['ngResource']).factory('GalleryImage', function ($resource) {
    return $resource('https://presentation.sephirothgeek.ch/api/gallery/image/?gallery=:gallery&offset=:offset&size=:size&galleryStructure=:galleryStructure', {}, {
        query: {method: 'GET', params: {gallery: 'gallery', offset: 'offset', galleryStructure: 'galleryStructure', size: 'size'}, isArray: true}
    });
});

angular.module('neowutran.RestServiceGalleryAudio', ['ngResource']).factory('GalleryAudio', function ($resource) {
    return $resource('https://presentation.sephirothgeek.ch/api/gallery/audio/?gallery=:gallery&offset=:offset&size=:size&galleryStructure=:galleryStructure', {}, {
        query: {method: 'GET', params: {gallery: 'gallery', offset: 'offset', galleryStructure: 'galleryStructure', size: 'size'}, isArray: true}
    });
});
