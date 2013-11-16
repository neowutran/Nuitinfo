<?php
/**
 * Created by JetBrains PhpStorm.
 * User: sephiroth
 * Date: 26/04/13
 * Time: 23:31
 * To change this template use File | Settings | File Templates.
 */

class IdiomeController extends EApiController
{

    public function actionIndex()
    {

        // just drop API request :)
        $this->renderJson($this->getJsonInputAsArray());
    }

    public function actionView()
    {

        $idiome           = Yii::app()->db
            ->createCommand()
            ->select('idiome')
            ->from('Idiome')
            ->order('RAND()')
            ->limit(1)
            ->queryRow();
        $idiome['idiome'] = nl2br($idiome['idiome'], false);
        $this->renderJson($idiome);

    }

    public function actionCreate()
    {

        $this->renderJson($this->getJsonInputAsArray());
    }

    public function actionUpdate()
    {

        $this->renderJson($this->getJsonInputAsArray());
    }

    public function actionDelete()
    {

        $this->renderJson($this->getJsonInputAsArray());
    }

}
