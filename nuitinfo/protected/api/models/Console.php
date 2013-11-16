<?php
/**
 * Created by JetBrains PhpStorm.
 * User: sephiroth
 * Date: 27/01/13
 * Time: 22:38
 * To change this template use File | Settings | File Templates.
 */
class Console
{

    public static function  execute($command)
    {

        $command = strtolower($command);
        switch ($command) {
            case "about":
                return "Ce site est en cours de developpement, il utilise Yii, bootstrap, jquery,angularjs. J'ai 19 ans etc etc";
            case "help":
                return "Liste des commandes:  about | help";
            default:
                return $command;
        }
    }
}
