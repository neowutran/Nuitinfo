<?php

class YiiLogErrorController extends GxController
{

    public function filters()
    {

        return [
            ['auth.filters.AuthFilter'],
        ];
    }

    public function actionView($id)
    {

        $this->render(
            'view',
            [
                'model' => $this->loadModel($id, 'YiiLogError'),
            ]
        );
    }

    public function actionDelete($id)
    {

        if (Yii::app()
            ->getRequest()
            ->getIsPostRequest()
        ) {
            $this
                ->loadModel($id, 'YiiLogError')
                ->delete();

            if (!Yii::app()
                ->getRequest()
                ->getIsAjaxRequest()
            ) {
                $this->redirect(['admin']);
            }
        } else {
            throw new CHttpException(400, Yii::t('app', 'Your request is invalid.'));
        }
    }

    public function actionIndex()
    {

        $model = new YiiLogError('search');
        $model->unsetAttributes();

        if (isset($_GET['YiiLogError'])) {
            $model->setAttributes($_GET['YiiLogError']);
        }

        $this->render(
            'admin',
            [
                'model' => $model,
            ]
        );
    }

}
