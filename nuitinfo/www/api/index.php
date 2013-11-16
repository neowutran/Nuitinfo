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

Yiinitializr\Helpers\Initializer::create(
    __DIR__ . '/../../protected/api/',
    'api',
    array(
        __DIR__ . '/../../protected/common/config/main.php',
        __DIR__ . './../../protected/common/config/env.php',
        __DIR__ . './../../protected/common/config/local.php'
    )
)->run();