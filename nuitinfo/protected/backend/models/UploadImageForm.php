<?php
/**
 * Created by JetBrains PhpStorm.
 * User: sephiroth
 * Date: 29/04/13
 * Time: 20:48
 * To change this template use File | Settings | File Templates.
 */

class UploadImageForm extends CFormModel
{

    public $image;

    // ... other attributes

    public function rules()
    {

        return [
            [
                'image',
                'file',
                'types' => 'jpg, png'
            ],
            [
                'image',
                'required'
            ],
        ];
    }
}
