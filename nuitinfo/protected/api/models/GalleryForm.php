<?php
/**
 * Created by JetBrains PhpStorm.
 * User: sephiroth
 * Date: 26/05/13
 * Time: 20:55
 * To change this template use File | Settings | File Templates.
 */

class GalleryForm extends CFormModel
{

    public $offset = 0;
    public $size = 100;
    public $gallery = 0;
    public $galleryStructure = 0;

    public function rules()
    {

        return [
            [
                'offset, size, galleryStructure',
                'required',
                'on' => 'image, audio',
            ],
            [
                'offset, size, gallery, galleryStructure',
                'numerical',
                'min'         => 0,
                'integerOnly' => true
            ],
            [
                'gallery',
                'required'
            ],
            [
                'size',
                'numerical',
                'max' => 1000
            ],

        ];
    }

}
