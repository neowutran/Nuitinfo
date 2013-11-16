<?php

/**
 * Bootstrap index file
 *
 * @author    Antonio Ramirez <amigo.cobos@gmail.com>
 * @link      http://www.ramirezcobos.com/
 * @link      http://www.2amigos.us/
 * @copyright 2013 2amigOS! Consultation Group LLC
 * @license   http://www.opensource.org/licenses/bsd-license.php New BSD License
 */
require(__DIR__ . '/../../../nuitinfo/ini_file.php');
require(__DIR__ . '/../../protected/common/lib/vendor/autoload.php');
require(__DIR__ . '/../../protected/common/lib/vendor/yiisoft/yii/framework/yiilite.php');

//Yii::setPathOfAlias('auth', '/var/www/presentation/protected/common/modules/auth');
Yii::setPathOfAlias('auth', PROJECT_ROOT.'/protected/common/modules/auth');
Yii::import('auth.*');
//Yii::import('auth.filters.*');
//Yii::import('auth.components.*');

Yiinitializr\Helpers\Initializer::create(
    __DIR__ . '/../../protected/backend/',
    'backend',
    array(
        __DIR__ . '/../../protected/common/config/main.php',
        __DIR__ . './../../protected/common/config/env.php',
        __DIR__ . './../../protected/common/config/local.php'
    )
)->run();

