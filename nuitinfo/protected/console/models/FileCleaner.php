<?php
/**
 * Created by JetBrains PhpStorm.
 * User: sephiroth
 * Date: 04/07/13
 * Time: 20:36
 * To change this template use File | Settings | File Templates.
 */

class  FileCleaner
{

    public static function CleanSessionFolder($lastSessionModifiedBeforeDelete = 1000000000)
    {

        $sessionPath = Yii::app()->params['path'] . 'session/';
        FileCleaner::DeleteFolder($lastSessionModifiedBeforeDelete, $sessionPath);

    }

    public static function CleanTmpFile($lastModifiedTimeBeforeDelete = 300000)
    {

        $tmpPath = Yii::app()->params['path'] . 'tmp/';
        FileCleaner::DeleteFolder($lastModifiedTimeBeforeDelete, $tmpPath);

    }

    private static function DeleteFolder($lastModifiedTimeBeforeDelete, $folderPath)
    {

        $files     = scandir($folderPath);
        $timestamp = time();

        foreach ($files as $file) {

            $filePath = $folderPath . $file;

            if (is_file($filePath)) {

                $lastModifiedTime = filemtime($filePath);

                if ($lastModifiedTime === false) {

                    Yii::log("Cannot use filemtime on " . $filePath, CLogger::LEVEL_ERROR);
                    throw new CHttpException(500, "Server error");

                }

                if ($lastModifiedTime < $timestamp - $lastModifiedTimeBeforeDelete) {

                    if (!unlink($filePath)) {

                        Yii::log("Cannot delete file " . $filePath, CLogger::LEVEL_ERROR);
                        throw new CHttpException(500, "Server error");

                    } else {

                        Yii::log("File " . $filePath . " deleted.", CLogger::LEVEL_TRACE);

                    }

                }

            }

        }

    }

}
