<?php

/**
 * backend.php configuration file
 *
 * @author    Antonio Ramirez <amigo.cobos@gmail.com>
 * @link      http://www.ramirezcobos.com/
 * @link      http://www.2amigos.us/
 * @copyright 2013 2amigOS! Consultation Group LLC
 * @license   http://www.opensource.org/licenses/bsd-license.php New BSD License
 */
defined('APP_CONFIG_NAME') or define('APP_CONFIG_NAME', 'backend');
// web application configuration

return [
    'preload'    => [
        'log',
        'input',
    ],
    // path aliases
    'aliases'    => [
// assumed the use of yiistrap and yiiwheels extensions
        'bootstrap' => dirname(__FILE__) . '/../..' . '/common/lib/vendor/2amigos/yiistrap',
        'yiiwheels' => dirname(__FILE__) . '/../..' . '/common/lib/vendor/2amigos/yiiwheels',

    ],
    'basePath'   => realPath(__DIR__ . '/..'),
    'theme'      => 'bootstrap',
    'import'     => [
        'common.extensions.components.*',
        'common.components.*',
        'common.helpers.*',
        'common.models.*',
        'common.models._base.*',
        'common.modules.*',
        'common.extensions.*',
        'common.extensions.giix.giix-components.*',
        'bootstrap.helpers.TbHtml',
        'application.controllers.*',
        'application.extensions.*',
        'application.helpers.*',
        'application.models.*',
        'application.components.*',
    ],
    'behaviors'  => [
        'common.components.ApplicationConfigBehavior'
    ],
    'modules'    => [
        'gii' => [
            'class'          => 'system.gii.GiiModule',
            'password'       => 'E369E369',
            // If removed, Gii defaults to localhost only. Edit carefully to taste.
            'ipFilters'      => [
                '*',
                '127.0.0.1'
            ],
            'generatorPaths' => [
                'common.extensions.giix.giix-core',
                // giix generators
                'bootstrap.gii',
            ],
        ],
    ],
    // application components
    'components' => [
        'themeManager' => [
            'baseURL'  => '',
            'basePath' => PROJECT_ROOT . 'protected/backend/themes/',
        ],
        'input'        => [
            'class'     => 'common.components.CmsInput',
            'cleanPost' => false,
            'cleanGet'  => true,
        ],
        'image'        => [
            'class'  => 'application.extensions.image.CImageComponent',
            // GD or ImageMagick
            'driver' => 'GD',
            // ImageMagick setup path
//	'params' => array('directory' => 'D:/Program Files/ImageMagick-6.4.8-Q16'),
        ],
        'assetManager' => [
            'baseURL'  => PROJECT_STATIC_URL . 'backend/assets/',
            'basePath' => PROJECT_STATIC_ROOT . 'backend/assets/',
        ],
        'bootstrap'    => [
            'class' => 'bootstrap.components.TbApi',
        ],
        'yiiwheels'    => [
            'class' => 'yiiwheels.YiiWheels',
        ],
        'clientScript' => [
            'scriptMap' => [ //     'bootstrap.min.css' => false,
                //    'bootstrap.min.js'  => false,
                //   'bootstrap-yii.css' => false
            ]
        ],
        'urlManager'   => [
            'urlFormat'        => 'path',
            'showScriptName'   => false,
            'useStrictParsing' => false,
            'caseSensitive'    => true,
            'rules'            => [
                ''                                       => 'site/index',
                '/'                                      => 'site/index',
                '<controller:\w+>/<id:\d+>'              => '<controller>/view',
                '<controller:\w+>/<action:\w+>/<id:\d+>' => '<controller>/<action>',
                '<controller:\w+>/<action:\w+>'          => '<controller>/<action>',
                'gii'                                    => 'gii',
                'gii/<controller:\w+>'                   => 'gii/<controller>',
                'gii/<controller:\w+>/<action:\w+>'      => 'gii/<controller>/<action>',
                'auth'                                   => 'auth',
                'auth/<controller:\w+>'                  => 'auth/<controller>',
                'auth/<controller:\w+>/<action:\w+>'     => 'auth/<controller>/<action>',
                '<controller:\w+>/<action:\w+>/<page>'   => '<controller>/<action>/<page>',
            ],
        ],
    ],
// application-level parameters that can be accessed
// using Yii::app()->params['paramName']
    'params'     => [
        'static_folder' => PROJECT_STATIC_URL . 'backend/',
        'static_path'   => PROJECT_STATIC_ROOT . 'backend/',
        'tmp_path'      => PROJECT_ROOT . 'tmp/',
    ],
];
