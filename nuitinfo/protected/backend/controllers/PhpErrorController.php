<?php
/**
 * Created by JetBrains PhpStorm.
 * User: draragar
 * Date: 01/08/13
 * Time: 17:27
 * To change this template use File | Settings | File Templates.
 */

class PhpErrorController extends Controller
{

    public function filters()
    {
        /*	return array(
                array('auth.filters.AuthFilter'),
            );*/
    }

    public function allowedActions()
    {

        return 'index';
    }

    public function actionShowPHPLog()
    {

        $error = $this->showLog(ERROR_LOG_FILE);
        $this->render('phpLog', ["error" => $error]);

    }

    private function showLog($file)
    {

        $error = file_get_contents($file);

        if (false === $error) {

            throw new CHttpException(HHttp::ERROR_INTERNAL_500, "Cannot get contents from " . $file);

        }

        return $error;

    }

    public function actionIndex()
    {

        $this->render('index');
    }

    public function actionShowFirewallLog()
    {

        $error = $this->showLog(PHP_FIREWALL_LOG_FILE);
        $this->render('firewallLog', ["error" => $error]);

    }

    private function emptyFile($file)
    {

        if (!file_put_contents($file, "")) {

            throw new CHttpException(HHttp::ERROR_INTERNAL_500, "Cannot set contents to " . $file);

        }

    }

}