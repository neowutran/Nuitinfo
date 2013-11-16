<?php

Yii::import('yiiwheels.widgets.editable.WhEditableSaver');

class PageController extends GxController
{

    public function filters()
    {

        return [
            [
                'auth.filters.AuthFilter'
            ],
        ];
    }

    public function actionUpdateEditable()
    {

        //	print_r($_POST);
        //	print_r($_GET);
        $update                 = new WhEditableSaver('Page');
        $update->onBeforeUpdate = function ($event) {
            //	$event->sender->setAttribute('updated_at', date('Y-m-d H:i:s'));
        };

        $update->update();
    }

    public function actionCreate()
    {

        $model = new Page;

        $this->performAjaxValidation($model, 'page-form');

        if (isset($_POST['Page'])) {
            $model->setAttributes($_POST['Page']);

            if ($model->save()) {
                if (Yii::app()->getRequest()->getIsAjaxRequest()) {
                    Yii::app()->end();
                } else {
                    $this->redirect(
                        [
                            'index',
                            'id' => $model->id
                        ]
                    );
                }
            }
        }

        $this->render(
            'create',
            [
                'model' => $model
            ]
        );
    }

    public function actionDelete($id)
    {

        if (Yii::app()->getRequest()->getIsPostRequest()) {
            $this->loadModel($id, 'Page')->delete();

            if (!Yii::app()->getRequest()->getIsAjaxRequest()) {
                $this->redirect(
                    [
                        'admin'
                    ]
                );
            }
        } else {
            throw new CHttpException(400, Yii::t('app', 'Your request is invalid.'));
        }
    }

    public function actionIndex()
    {

        $model = new Page('search');
        $model->unsetAttributes();

        if (isset($_GET['Page'])) {
            $model->setAttributes($_GET['Page']);
        }

        $this->render(
            'admin',
            [
                'model' => $model,
            ]
        );
    }

}
