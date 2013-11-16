<?php
/**
 * SiteController class
 *
 * @author    Antonio Ramirez <amigo.cobos@gmail.com>
 * @link      http://www.ramirezcobos.com/
 * @link      http://www.2amigos.us/
 * @copyright 2013 2amigOS! Consultation Group LLC
 * @license   http://www.opensource.org/licenses/bsd-license.php New BSD License
 */
//Yii::setPathOfAlias('auth', dirname(__FILE__) . '/../../../presentation/protected/common/modules/auth');
//Yii::import('auth.*');
//Yii::import('auth');
//Yii::import('auth.components.*');

class SiteController extends Controller
{

    /*
    public function filters()
    {

        return array(
            array('auth.filters.AuthFilter'),
        );

    }
*/
    public function allowedActions()
    {

        return 'login,error,index';
    }

    /**
     * Displays the login page
     */
    public function actionLogin()
    {

        $model = new LoginForm;

        // if it is ajax validation request
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'login-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }

        // collect user input data
        if (isset($_POST['LoginForm'])) {
            $model->attributes = $_POST['LoginForm'];
            // validate user input and redirect to the previous page if valid
            if ($model->validate() && $model->login()) {
                $this->redirect(Yii::app()->user->returnUrl);
            }
        }
        // display the login form
        $this->render('login', ['model' => $model]);
    }

    /**
     * Logs out the current user and redirect to homepage.
     */
    public function actionLogout()
    {

        Yii::app()->user->logout();
        $this->redirect(Yii::app()->homeUrl);
    }

    /**
     * Renders index
     */
    public function actionIndex()
    {

        $this->render('index');
    }

    /**
     * This is the action to handle external exceptions.
     */
    public function actionError()
    {

        if ($error = Yii::app()->errorHandler->error) {
            if (Yii::app()->request->isAjaxRequest) {
                echo $error['message'];
            } else {
                $this->render('error', $error);
            }
        }
    }
}
