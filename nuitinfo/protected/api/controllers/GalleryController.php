<?php
/**
 * Created by JetBrains PhpStorm.
 * User: sephiroth
 * Date: 26/05/13
 * Time: 20:43
 * To change this template use File | Settings | File Templates.
 */

class GalleryController extends EApiController
{

    public function actionAudio()
    {

        $galleryForm             = new GalleryForm('audio');
        $galleryForm->attributes = $_GET;

        if ($galleryForm->validate()) {

            if (GalleryStructure::model()->findByPk($galleryForm->galleryStructure) == null && Gallery::model(
                )->findByPk($galleryForm->gallery) == null
            ) {

                Yii::log('info', 'wrong params');
                $this->renderJson('Incorrect params');

                return;

                //throw new CHttpException(412, 'Incorrect params');

            }

            if (GalleryStructure::model()->findByPk(
                    $galleryForm->galleryStructure
                ) != null && GalleryStructure::canUpload($galleryForm->galleryStructure)
            ) {

                $audioForm             = new GalleryForm('audio');
                $audioForm->attributes = $_GET;

                if ($audioForm->validate()) {

                    $criteria            = new CDbCriteria();
                    $criteria->limit     = $audioForm->size;
                    $criteria->offset    = $audioForm->offset;
                    $criteria->condition = 'folder=' . $audioForm->galleryStructure;
                    $criteria->order     = "name";
                    $audios              = GalleryAudio::model()->findAll($criteria);

                    $result         = [];
                    $result["type"] = 'audio';

                    for ($index = 0; $index < count($audios); $index++) {

                        $result[$index]['title']                      = $audios[$index]['name'];
                        $result[$index]['description']                = $audios[$index]['description'];
                        $gallery_id                                   = GalleryStructure::model()->findByPk(
                            $audioForm->galleryStructure
                        )
                        ['gallery_id'];
                        $gallery_path                                 = Gallery::model()->findByPk($gallery_id)['path'];
                        $result[$index]['gallery']                    = $gallery_id;
                        $result[$index]['galleryStructure']           = $audioForm->galleryStructure;
                        $gallery_structure_path                       = GalleryStructure::getPathByPk(
                            $audioForm->galleryStructure
                        )['path'];
                        $result[$index][$audios[$index]['extension']] = Yii::app()->params['static_url'] . Yii::app(
                            )->params['frontend'] . $gallery_path . $gallery_structure_path . $audios[$index]['subfolder'] . $audios[$index]['file_name'] . '.' . $audios[$index]['extension'];

                    }

                    $this->renderJson($result);

                } else {

                    Yii::log('info', 'wrong params');
                    $this->renderJson('Incorrect params');

                    return;

                }

            } else {

                if (GalleryStructure::model()->findByPk($galleryForm->galleryStructure) != null) {

                    $audios = GalleryStructure::getSubGallery($galleryForm->galleryStructure);

                    $result         = [];
                    $result['type'] = 'gallery';
                    $data           = GalleryAudio::getAll($galleryForm->gallery, $galleryForm->galleryStructure);

                    for ($index = 0; $index < count($data); $index++) {

                        $criteria                                         = new CDbCriteria();
                        $criteria->condition                              = "id=" . $data[$index]['folder'];
                        $galleryStructure                                 = GalleryStructure::model()->find($criteria);
                        $criteria                                         = new CDbCriteria();
                        $criteria->condition                              = "id=" . $galleryStructure->gallery_id;
                        $gallery                                          = Gallery::model()->find($criteria);
                        $galleryStructurePath                             = GalleryStructure::getPathByPk(
                            $data[$index]['folder']
                        )['path'];
                        $result['data'][$index]['title']                  = $data[$index]->name;
                        $result['data'][$index][$data[$index]->extension] = Yii::app()->params['static_url'] . Yii::app(
                            )->params['frontend'] . $gallery['path'] . $galleryStructurePath . $data[$index]->subfolder . $data[$index]->file_name . "." . $data[$index]->extension;

                    }

                    for ($index = 0; $index < count($audios); $index++) {

                        $gallery_id = GalleryStructure::model()->findByPk($galleryForm->galleryStructure)
                        ['gallery_id'];

                        $result[$index]['id']               = $audios[$index]['id'];
                        $result[$index]['title']            = $audios[$index]['name'];
                        $result[$index]['gallery']          = $gallery_id;
                        $result[$index]['galleryStructure'] = $galleryForm->galleryStructure;

                    }

                    $this->renderJson($result);

                } else {
                    if (Gallery::model()->findByPk($galleryForm->gallery) != null) {

                        $criteria            = new CDbCriteria();
                        $criteria->condition = 'parent IS NULL AND gallery_id=' . $galleryForm->gallery;

                        $audios = GalleryStructure::model()->findAll($criteria);

                        $result         = [];
                        $result['type'] = 'gallery';
                        $result['data'] = GalleryAudio::getAll($galleryForm->gallery, 0);

                        for ($index = 0; $index < count($audios); $index++) {

                            $result[$index]['gallery'] = $galleryForm->gallery;

                        }

                        $this->renderJson($result);

                    } else {

                        Yii::log('info', 'wrong params');
                        $this->renderJson('Incorrect params');

                        return;

                    }
                }
            }

        } else {

            Yii::log('info', 'wrong params');
            $this->renderJson('Incorrect params');

            return;

        }

    }


}
