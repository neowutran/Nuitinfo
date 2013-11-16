<?php

/**
 * @author    Antonio Ramirez <amigo.cobos@gmail.com>
 * @link      http://www.ramirezcobos.com/
 * @link      http://www.2amigos.us/
 * @copyright 2013 2amigOS! Consultation Group LLC
 * @license   http://www.opensource.org/licenses/bsd-license.php New BSD License
 */
return [
    'name'       => 'Nuit de l\'info',
    'preload'    => [
        'log',
        'input',
    ],
    'aliases'    => [
        'frontend'  => dirname(__FILE__) . '/../..' . '/frontend',
        'common'    => dirname(__FILE__) . '/../..' . '/common',
        'backend'   => dirname(__FILE__) . '/../..' . '/backend',
        'vendor'    => dirname(__FILE__) . '/../..' . '/common/lib/vendor',
        'auth'      => dirname(__FILE__) . '/../..' . '/common/modules/auth',
        'bootstrap' => dirname(__FILE__) . '/../..' . '/common/lib/vendor/2amigos/yiistrap',
        'yiiwheels' => dirname(__FILE__) . '/../..' . '/common/lib/vendor/2amigos/yiiwheels',

    ],
    'import'     => [
        'common.extensions.components.*',
        'common.components.*',
        'common.helpers.*',
        'common.models.*',
        'common.modules.*',
        'common.extensions.*',
        //'auth.*',
        'bootstrap.helpers.TbHtml',
        'application.controllers.*',
        'application.extensions.*',
        'application.helpers.*',
        'application.models.*',
        'application.components.*',
        'common.extensions.giix.components.*',
    ],
    'modules'    => [
        'auth' => [
            'strictMode'     => true,
            // when enabled authorization items cannot be assigned children of the same type.
            'userClass'      => 'User',
            // the name of the user model class.
            'userIdColumn'   => 'id',
            // the name of the user id column.
            'userNameColumn' => 'username',
            // the name of the user name column.
            'viewDir'        => null,
            // the path to view files to use with this module.
        ],
    ],
    'components' => [
        /*
    'clientScript'    => [
        'class'             => 'common.extensions.compressor.CompressorClientScript',
        //use whatever location you put the extension
//the following options are optional and the values defined in this example are the default ones
        'compress'          => true,
        //wheter to minify and compress the files. Defaults to true
//see YUICompressor class for more details
        'compressorOptions' => [
//Insert a line breaks after '}' characters for css files or
//Insert a line break after the specified column number for js files
            'linebreak'  => false,
            //Display informational messages and warnings. (useful for cleaning up your JS)
            'verbose'    => false,
            //Minify only, no symbol obfuscation. Valid for js files
            'nomunge'    => false,
            //Preserve unnecessary semicolons (such as right before a '}'). Valid for js files
            'semi'       => false,
            //Disable all the built-in micro optimizations. Valid for js files
            'nooptimize' => false,
            //path to the java binary
//you can use, for example, 'C:\Program Files (x86)\Java\jre7\bin\java.exe' if you are windows
            'javaBin'    => 'java',
        ],
    ],*/
        'db'              => [
            'class'                 => 'CDbConnection',
            'connectionString'      => 'mysql:host=localhost;dbname=nuitinfo',
            'emulatePrepare'        => true,
            'username'              => 'root',
            'password'              => 'dentifisedu06',
            'charset'               => 'utf8',
            'enableProfiling'       => true,
            'enableParamLogging'    => true,
            'schemaCachingDuration' => 3600,
            //'enableProfiling'      => true,
            //'enableParamLogging'   => true,
        ],
        'input'           => [
            'class'     => 'common.components.CmsInput',
            'cleanPost' => true,
            'cleanGet'  => true,
        ],
        'bootstrap'       => [
            'class' => 'bootstrap.components.TbApi',
        ],
        'yiiwheels'       => [
            'class' => 'yiiwheels.YiiWheels',
        ],
        'file'            => [
            'class' => 'common.extensions.file.CFile',
        ],
        'messages'        => [
            'class'           => 'CPhpMessageSource',
            'language'        => 'en',
            'cachingDuration' => 36000,
        ],
        'cache'           => [
            'class' => 'CApcCache',
        ],
        // uncomment the following to use a MySQL database
        'user'            => [
            // enable cookie-based authentication
            'allowAutoLogin' => true,
            'class'          => 'common.modules.auth.components.AuthWebUser',
            //  'class'          => 'auth.components.AuthWebUser',
        ],
        'request'         => [
            'enableCsrfValidation'   => true,
            'enableCookieValidation' => true,
        ],
        'securityManager' => [
            'encryptionKey'  => 'f~;[N=ggX)]+@B4K"uCZCuFS6![Q8EUgTjZe6:rRYWxa}D^)(;C`j@"~v9n\'ukw/&;bdB,,
            vEb8BrPkHVDaQt`RTF#E9_+cR;@-~R2y#wg5-^*Kfw}@cR]V5:DHj[t,S',
            'validationKey'  => 'r<}y.3LW]x}"RPqPYd)2rR[Z4Ev!S$d2m*4NEm@\'Ts(j9GbW.+C6$j&gS"EA82!fuBJD`,(@,kr}-_=Q+",
            A/*m#RsVM>zb\';\'d$KaSnwrE@ZWdBh}af:g_DE8;^CRcn',
            'cryptAlgorithm' => [
                'rijndael-256',
                '',
                'ofb',
                ''
            ],
            'hashAlgorithm'  => 'sha1',
        ],
        'authManager'     => [
            'class'           => 'common.modules.auth.components.CachedDbAuthManager',
            //'class'           => 'auth.components.CachedDbAuthManager',
            'cachingDuration' => 3600,
            'connectionID'    => 'db',
            'behaviors'       => [
                'auth' => [
                    //		'appLayout'=>'application.themes.bootstrap.views.layouts.main',
                    'class'  => 'common.modules.auth.components.AuthBehavior',
                    // 'class'  => 'auth.components.AuthBehavior',
                    'admins' => [
                        'neowutran'
                    ],
                    // users with full access
                ],
            ],
        ],
        'errorHandler'    => [
            'errorAction' => 'site/error',
        ],
        'log'             => [
            'class'  => 'CLogRouter',
            'routes' => [
                [
                    'class'  => 'CFileLogRoute',
                    'levels' => 'error, warning',
                    'filter' => 'CLogFilter',
                ],
                [
                    'class'  => 'CEmailLogRoute',
                    'levels' => 'error',
                    'emails' => ADMIN_MAIL,
                    'filter' => 'CLogFilter',
                ],
                [
                    'class'        => 'CDbLogRoute',
                    'levels'       => 'error, warning',
                    'connectionID' => 'db',
                    'logTableName' => 'YiiLogError',
                    'filter'       => 'CLogFilter',
                ],
                /*
                  array(
                  'class'=>'CDbLogRoute',
                  'levels'=>'info, trace, profile',
                  'connectionID'=>'db',
                  'logTableName'=>'YiiLogInfo',
                  'filter'=>'CLogFilter',
                  ),
                 */
                // uncomment the following to show log messages on web pages

                [
                    'class' => 'CWebLogRoute',
                ],

            ],
        ],
    ],
    // application parameters
    'params'     => [
        'adminEmail'         => ADMIN_MAIL,
        'path'               => PROJECT_ROOT,
        'static_path'        => PROJECT_STATIC_ROOT,
        'frontend'           => 'frontend/',
        'backend'            => 'backend/',
        'php.timezone'       => 'Europe/Paris',
        'php.defaultCharset' => 'utf8',
        //	'gallery_path'          => 'frontend/gallery/',
        'static_url'         => PROJECT_STATIC_URL,
        //	'gallery_url'           => 'frontend/gallery/',
    ],
];
