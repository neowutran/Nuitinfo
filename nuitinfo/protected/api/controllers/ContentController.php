<?php
/**
 * Created by JetBrains PhpStorm.
 * User: sephiroth
 * Date: 27/04/13
 * Time: 16:51
 * To change this template use File | Settings | File Templates.
 */

class ContentController extends EApiController
{

    public function actionIndex()
    {

        // just drop API request :)
        $this->renderJson($this->getJsonInputAsArray());
    }

    public function actionView()
    {

        $page = Yii::app()->request->getQuery('page');
        $user = Yii::app()->request->getQuery('user');

        if (preg_match("#^\w+$#", $page) != 1 || preg_match("#^\d+$#", $user) != 1) {

            return;

        }

        $query            = new CDbCriteria();
        $query->select    = "html";
        $query->join      = "LEFT JOIN " . Page::model()->tableName() . " ON " . Content::model(
            )->tableAlias . ".page_id = " . Page::model()->tableName() . ".id ";
        $query->condition = Page::model()->tableName() . ".nom = :page AND " . Content::model()->tableAlias . ".user_id =
		:user_id";
        $query->params    = [
            ":page"    => $page,
            ":user_id" => $user
        ];

        $about = Content::model()->find($query);

        $resultat = ["content" => $about['html']];

        $this->renderJson($resultat);

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
