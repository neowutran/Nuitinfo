<?php

Yii::import('yiiwheels.widgets.editable.WhEditableSaver');

class UserController extends GxController
{

    public function filters()
    {

        return [
            [
                'common.modules.auth.filters.AuthFilter'
            ],
        ];
    }

    public function actionUpdateEditable()
    {

        $update                 = new WhEditableSaver('User');
        $update->onBeforeUpdate = function ($event) {
            //	$event->sender->setAttribute('updated_at', date('Y-m-d H:i:s'));
        };

        $update->update();
    }

    public function actionCreate()
    {

        $model = new User;

        $this->performAjaxValidation($model, 'user-form');

        if (isset($_POST['User'])) {
            $model->setAttributes($_POST['User']);

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
            $this->loadModel($id, 'User')->delete();

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

        $model = new User('search');
        $model->unsetAttributes();

        if (isset($_GET['User'])) {
            $model->setAttributes($_GET['User']);
        }

        $this->render(
            'admin',
            [
                'model' => $model,
            ]
        );
    }

}
