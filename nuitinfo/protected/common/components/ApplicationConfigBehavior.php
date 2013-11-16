<?php

class ApplicationConfigBehavior extends CBehavior
{

    /**
     * Declares events and the event handler methods
     * See yii documentation on behavior
     */
    public function events()
    {

        return array_merge(
            parent::events(),
            [
                'onBeginRequest' => 'beginRequest',
            ]
        );

    }



    public function beginRequest()
    {

        Yii::import('common.vendors.*');

        define('PHP_FIREWALL_REQUEST_URI', strip_tags($_SERVER['REQUEST_URI']));
        define('PHP_FIREWALL_ACTIVATION', false);
        require_once('php-firewall/firewall.php');
        Yii::import('common.modules.*');
        //	$this->language();

    }
}
