<?php
/**
 * api.php configuration file
 *
 * @author    Antonio Ramirez <amigo.cobos@gmail.com>
 * @link      http://www.ramirezcobos.com/
 * @link      http://www.2amigos.us/
 * @copyright 2013 2amigOS! Consultation Group LLC
 * @license   http://www.opensource.org/licenses/bsd-license.php New BSD License
 */
return [
    'basePath'   => realPath(__DIR__ . '/..'),
    'aliases'    => [
        'frontend'     => dirname(__FILE__) . '/../..' . '/frontend',
        'common'       => dirname(__FILE__) . '/../..' . '/common',
        'backend'      => dirname(__FILE__) . '/../..' . '/backend',
        'vendor'       => 'common.lib.vendor',
        'YiiRestTools' => 'common.lib.YiiRestTools'
    ],
    'import'     => [
        'common.extensions.components.*',
        'common.components.*',
        'common.helpers.*',
        'common.models.*',
        'application.controllers.*',
        'application.extensions.*',
        'application.extensions.components.*',
        'application.extensions.behaviors.*',
        'application.extensions.filters.*',
        'application.helpers.*',
        'application.models.*',
    ],
    'components' => [
        'errorHandler' => [
            'errorAction' => 'site/error',
            'class'       => 'EApiErrorHandler'
        ],
        'log'          => [
            'class'  => 'CLogRouter',
            'routes' => [
                [
                    'class'        => 'CDbLogRoute',
                    'connectionID' => 'db',
                    'levels'       => 'error, warning',
                ],
            ],
        ],
        'urlManager'   => [
            'urlFormat'      => 'path',
            'showScriptName' => false,
            'rules'          => [
                // REST patterns
                [
                    '<controller>/index',
                    'pattern' => 'api/<controller:\w+>',
                    'verb'    => 'POST'
                ],
                //	array('<controller>/view', 		'pattern' => 'api/<controller:\w+>/view', 	'verb' => 'POST'),
                [
                    '<controller>/update',
                    'pattern' => 'api/<controller:\w+>/update',
                    'verb'    => 'PUT'
                ],
                [
                    '<controller>/delete',
                    'pattern' => 'api/<controller:\w+>/delete',
                    'verb'    => 'DELETE'
                ],
                [
                    '<controller>/create',
                    'pattern' => 'api/<controller:\w+>/create',
                    'verb'    => 'POST'
                ],
                [
                    '<controller>/index',
                    'pattern' => 'api/<controller:\w+>/<page:\w+>/<user:\d+>',
                    'verb'    => 'POST'
                ],
                //		array('<controller>/view', 'pattern' => 'api/<controller:\w+>/view/<page:\w+>/<user:\d+>',
                //             'verb' => 'POST'),
                [
                    '<controller>/update',
                    'pattern' => 'api/<controller:\w+>/update/<page:\w+>/<user:\d+>',
                    'verb'    => 'PUT'
                ],
                [
                    '<controller>/delete',
                    'pattern' => 'api/<controller:\w+>/delete/<page:\w+>/<user:\d+>',
                    'verb'    => 'DELETE'
                ],
                [
                    '<controller>/create',
                    'pattern' => 'api/<controller:\w+>/create/<page:\w+>/<user:\d+>',
                    'verb'    => 'POST'
                ],
                [
                    '<controller>/view',
                    'pattern' => 'api/<controller:\w+>/view/<page:.+>/<user:.+>',
                    'verb'    => 'GET'
                ],
                [
                    'console/execute',
                    'pattern' => 'console/<model:\w+>/<command:.+>',
                    'verb'    => 'GET'
                ],
            ],
        ]
    ]
];
