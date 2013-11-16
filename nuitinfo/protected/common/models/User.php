<?php

Yii::import('common.models._base.BaseUser');

class User extends BaseUser
{

    public static function model($className = __CLASS__)
    {

        return parent::model($className);
    }

    protected function beforeSave()
    {

        if (isset($this->password)) {
            $this->password = convert_uuencode(Yii::app()->getSecurityManager()->encrypt($this->password));
        }
        if (isset($this->email)) {
            $this->email = convert_uuencode(Yii::app()->getSecurityManager()->encrypt($this->email));
        }

        return true;

    }

    protected function afterFind()
    {

        if (isset($this->password)) {
            $this->password = Yii::app()->getSecurityManager()->decrypt(convert_uudecode($this->password));
        }
        if (isset($this->email)) {
            $this->email = Yii::app()->getSecurityManager()->decrypt(convert_uudecode($this->email));
        }
        parent::afterFind();

    }
}
