<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');

// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
defined('APP_CONFIG_NAME') or define('APP_CONFIG_NAME', 'frontend');
return [

    'aliases'    => [
        'bootstrap' => 'vendor.yii-twbs.yiistrap',
        'yiiwheels' => 'vendor.2amigos.yiiwheels'
    ],
    'basePath'   => realPath(__DIR__ . '/..'),
    'theme'      => 'bootstrap',
    'behaviors'  => ['common.components.ApplicationConfigBehavior'],
    // preloading 'log' component

    'components' => [

        'themeManager' => [

            'baseURL'  => '',
            'basePath' => PROJECT_ROOT . 'protected/frontend/themes/',

        ],
        'assetManager' => [

            'baseURL'  => PROJECT_STATIC_URL . 'frontend/assets/',
            'basePath' => PROJECT_STATIC_ROOT . 'frontend/assets/',

        ],
        'urlManager'   => [
            'urlFormat'        => 'path',
            'showScriptName'   => false,
            'useStrictParsing' => true,
            'caseSensitive'    => true,
            'rules'            => [
                ''                                       => 'site/index',
                '/'                                      => 'site/index',
                'gallery'                                => 'gallery/index',
                '<controller:\w+>/<id:\d+>'              => '<controller>/view',
                '<controller:\w+>/<action:\w+>/<id:\d+>' => '<controller>/<action>',
                '<controller:\w+>/<action:\w+>'          => '<controller>/<action>',
                '<controller:\w+>/<action:\w+>/<page>'   => '<controller>/<action>/<page>',

            ],
        ],

    ],
    // application-level parameters that can be accessed
    // using Yii::app()->params['paramName']
    'params'     => [
        // this is used in contact page

        'static_folder'         => PROJECT_STATIC_URL . 'frontend/',
        'static_path'           => PROJECT_STATIC_ROOT . 'frontend/',
        'recaptcha_private_key' => '6LfNJtQSAAAAAFZXGNqaR-OoVal_OWs8WZLi9yPK',
        'recaptcha_public_key'  => '6LfNJtQSAAAAAPopPmeHNDYmTDSRRWbD4ZWWLxdk',

    ],
];
