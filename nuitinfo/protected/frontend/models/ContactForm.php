<?php

/**
 * ContactForm class.
 * ContactForm is the data structure for keeping
 * contact form data. It is used by the 'contact' action of 'SiteController'.
 */
class ContactForm extends CFormModel
{

    public $email;
    public $body;
    public $verifyCode;

    /**
     * Declares the validation rules.
     */
    public function rules()
    {

        return [
            // name, email, subject and body are required
            [
                'email, body',
                'required'
            ],
            // email has to be a valid email address
            [
                'email',
                'email'
            ],
            // verifyCode needs to be entered correctly
            [
                'verifyCode',
                'captcha',
                'allowEmpty' => !CCaptcha::checkRequirements()
            ],
        ];
    }

    /**
     * Declares customized attribute labels.
     * If not declared here, an attribute would have a label that is
     * the same as its name with the first letter in upper case.
     */
    public function attributeLabels()
    {

        return [
            'verifyCode' => 'Verification Code',
        ];
    }
}
