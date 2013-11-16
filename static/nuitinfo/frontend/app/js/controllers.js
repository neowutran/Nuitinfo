'use strict';

function ControllerTest($scope, Console) {

    $scope.keypressCallback = function ($event) {
        Console.get({command: $scope.donnee}, function (command) {
            writeJson(command);
        });

        $event.preventDefault();
        $scope.donnee = "";
    };

    $scope.about = function () {
        Console.get({command: "about"}, function (command) {
            writeJson(command);
        });

    };

}

function ControllerIdiome($scope, Idiome) {

    $scope.onLoad = function () {
        Idiome.get("", function (idiome) {
            $scope.idiome = idiome.idiome;
        });

    };

}

function ControllerContent($scope, Content) {

    $scope.load = function () {
        console.log("bite");
        Content.get({page: $scope.page, user: $scope.user}, function (content) {
            $scope.content = content.content;
            console.log(content.content);
        });

    };

}

function ControllerGalleryImage($scope, GalleryImage) {

    $scope.images = [];
    $scope.offset = 0;
    $scope.size = 100;
    $scope.gallery = $.urlParam('gallery');
    $scope.galleryStructure = $.urlParam('galleryStructure');

    if (isNaN($scope.gallery) || $scope.gallery === null) {

        $scope.gallery = 5;

    }

    if (isNaN($scope.galleryStructure) || $scope.galleryStructure === null) {

        $scope.galleryStructure = 0;

    }

    $scope.wait = false;
    $scope.timeToWakeUp = 0;
    $scope.canScroll = true;

    $scope.followLink = function (gallery, galleryStructure, index) {

        var indexImage = index;

        console.log(indexImage);

        if ($scope.canScroll) {

            var jsonImage = [];

            var imageVoulu = 15;
            var debut = indexImage - 15;
            var fin = indexImage + 15;

            if (debut < 0) {

                imageVoulu += debut;
                fin -= debut;
                debut = 0;

            }

            if (fin >= $scope.images.length) {

                debut -= (fin - $scope.images.length) + 1;
                imageVoulu += (fin - $scope.images.length) + 1;
                fin = $scope.images.length - 1;

            }

            for (var i = debut; i <= fin; i++) {

                jsonImage.push($scope.images[i]);

            }

            Galleria.ready(function () {

                this.unbind('loadstart');
                this.bind('loadstart', function (e) {

                    var differenceImage = e.index - imageVoulu;
                    imageVoulu = e.index;
                    indexImage += differenceImage;

                    if (e.index === this._data.length - 1 || e.index === 0) {

                        if (indexImage + e.index <= 0) {

                            return;

                        }

                        if ($scope.images.length <= indexImage - 1) {

                            if (e.index === 0) {

                                indexImage = $scope.images.length - 1;

                            } else {

                                indexImage = $scope.images.length - 1;
                                return;
                            }
                        }

                        var jsonImage = [];

                        imageVoulu = 15;
                        var debut = indexImage - 15;
                        var fin = indexImage + 15;
                        if (debut < 0) {

                            imageVoulu += debut;
                            fin -= debut;
                            debut = 0;

                        }

                        if (fin >= $scope.images.length) {

                            debut -= (fin - $scope.images.length) + 1;
                            imageVoulu += (fin - $scope.images.length) + 1;
                            fin = $scope.images.length - 1;

                        }

                        for (var i = debut; i <= fin; i++) {

                            jsonImage.push($scope.images[i]);

                        }

                        this.setOptions("show", imageVoulu);
                        this.load(jsonImage);

                    }

                });

            });

            Galleria.run($(".galleria"), {
                dataSource: jsonImage,
                width     : $(window).width() / 1.1,
                height    : $(window).height() / 1.1,
                transition: 'fade',
                show      : imageVoulu
            });

            $.fancybox($(".galleria"), {
                padding   : 0,
                afterClose: function () {
                    //	Galleria.destroy();

                    Galleria.get(0).destroy();
                    indexImage = null;
                }
            });

        } else {

            $scope.images = [];
            $scope.gallery = gallery;
            $scope.galleryStructure = galleryStructure;
            $scope.wait = false;
            $scope.timeToWakeUp = 0;
            $scope.offset = 0;
            $scope.canScroll = true;

            window.history.pushState({}, '', window.location.pathname + '?gallery=' + $scope.gallery + '&galleryStructure=' + $scope.galleryStructure);

            $scope.nextPage();

        }

    }

    $scope.nextPage = function () {

        if (($scope.wait && $scope.timeToWakeUp > new Date().getTime()) || $scope.wait || !$scope.canScroll) {
            return;
        }

        $scope.wait = true;

        GalleryImage.get({offset: $scope.offset, size: $scope.size, gallery: $scope.gallery, galleryStructure: $scope.galleryStructure}, function (images) {

            var size = 0;

            $.each(images, function (index, image) {

                if (!isNaN(index)) {

                    size++;
                    $scope.offset++;
                    $scope.images.push(image);

                }

                if (index === 'type') {

                    if (image !== 'image') {

                        $scope.canScroll = false;

                    }

                }

            });

            if (size === 0) {

                $scope.timeToWakeUp = new Date().getTime() + 1000 * 10;
                $scope.wait = true;

            } else {

                $scope.wait = false;

            }

        });

    };

}

function ControllerGalleryAudio($scope, GalleryAudio) {

    $scope.audios = [];
    $scope.JplayerAudio = [];
    $scope.offset = 0;
    $scope.size = 1000;
    $scope.gallery = $.urlParam('gallery');
    $scope.galleryStructure = $.urlParam('galleryStructure');

    if (isNaN($scope.gallery) || $scope.gallery === null) {

        $scope.gallery = 2;

    }

    if (isNaN($scope.galleryStructure) || $scope.galleryStructure === null) {

        $scope.galleryStructure = 0;

    }

    $scope.wait = false;
    $scope.timeToWakeUp = 0;
    $scope.canScroll = true;

    $scope.loadAudio = function (galleryStructure, gallery) {

        $scope.galleryStructure = galleryStructure;
        $scope.gallery = gallery;

        GalleryAudio.get({offset: $scope.offset, size: $scope.size, gallery: $scope.gallery, galleryStructure: $scope.galleryStructure}, function (audios) {

            $.each(audios, function (index, audio) {

                //	console.log(audio);

                if (typeof(audio.ogg) !== "undefined") {
                    $scope.audios.push(audio);

                    var jplayerJson = {};
                    jplayerJson.oga = audio.ogg;
                    jplayerJson.title = audio.title;
                    jplayerJson.free = true;
                    //	console.log ( JplayerJson );
                    $scope.JplayerAudio.push(jplayerJson);
                }

                //	console.log(index);
                if (index === 'data') {

                    $.each(audio, function (dataIndex, dataAudio) {

                        if (typeof(dataAudio) !== "undefined") {

                            //console.log(dataAudio);
                            $scope.audios.push(dataAudio);

                            var jplayerJson = {};
                            jplayerJson.oga = dataAudio.ogg;
                            jplayerJson.title = dataAudio.title;
                            jplayerJson.free = true;
                            //	console.log ( JplayerJson );
                            $scope.JplayerAudio.push(jplayerJson);

                        }

                    });

                }
            });

            //console.log ( $scope.JplayerAudio );
            //	console.log ( audios );
            new jPlayerPlaylist({
                jPlayer            : '#jquery_jplayer',
                cssSelectorAncestor: '#jp_container'
            }, $scope.JplayerAudio, {
                supplied     : 'oga',
                smoothPlayBar: true,
                keyEnabled   : true,
                solution     : 'html',
                wmode        : 'window'
            });

        });

    }

    $scope.nextPage = function () {

        if (($scope.wait && $scope.timeToWakeUp > new Date().getTime()) || $scope.wait || !$scope.canScroll) {
            return;
        }

        $scope.wait = true;

        GalleryAudio.get({offset: $scope.offset, size: $scope.size, gallery: $scope.gallery, galleryStructure: $scope.galleryStructure}, function (audios) {

            var size = 0;

            $.each(audios, function (index, audio) {

                if (!isNaN(index)) {

                    size++;
                    $scope.offset++;
                    $scope.audios.push(audio);

                }

                if (index === 'type') {

                    if (audio !== 'audio') {

                        $scope.canScroll = false;

                    }

                }

            });

            if (size === 0) {

                $scope.timeToWakeUp = new Date().getTime() + 1000 * 10;
                $scope.wait = true;

            } else {

                $scope.wait = false;

            }

        });

    };

}

