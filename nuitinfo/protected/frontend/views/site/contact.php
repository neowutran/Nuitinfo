<?php
/* @var $this SiteController */
/* @var $model ContactForm */
/* @var $form CActiveForm */

$this->pageTitle = Yii::app()->name . ' - Contact Us';
?>

<h1>Contact</h1>

<?php if (Yii::app()->user->hasFlash('contact')): ?>

    <div class="flash-success">
        <?php echo Yii::app()->user->getFlash('contact'); ?>
    </div>

<?php else: ?>

    <div class="form">

        <?php $form = $this->beginWidget(
            'CActiveForm',
            [
                'id'                     => 'contact-form',
                'enableClientValidation' => true,
            ]
        ); ?>

        <?php echo $form->errorSummary($model); ?>

        <div class="row">
            <?php echo $form->labelEx($model, 'email'); ?>
            <br>
            <?php echo $form->error($model, 'email'); ?>
            <?php echo $form->textField($model, 'email'); ?>

        </div>

        <div class="row">
            <?php echo $form->labelEx($model, 'body'); ?>
            <br>
            <?php echo $form->error($model, 'body'); ?>
            <?php echo $form->textArea(
                $model,
                'body',
                [
                    'rows' => 6,
                    'cols' => 50
                ]
            ); ?>
        </div>


        <div class="row">
            <div id="recaptcha_widget">
                <div id="recaptcha_image"></div>
                <div class="recaptcha_only_if_incorrect_sol"
                     class="error">Incorrect please try again
                </div>
                <input id="recaptcha_response_field"
                       name="recaptcha_response_field"
                       type="text">
                <a href="javascript:Recaptcha.reload()">Reload</a>

            </div>
            <?php $this->widget(
                'application.extensions.recaptcha.EReCaptcha',
                [
                    'model'             => $model,
                    'attribute'         => 'verifyCode',
                    'theme'             => 'custom',
                    'customThemeWidget' => 'recaptcha_widget',
                    'language'          => 'fr_FR',
                    'publicKey'         => Yii::app()->params['recaptcha_public_key']
                ]
            ) ?>
        </div>


        <div class="row buttons">
            <?php echo CHtml::submitButton('Submit'); ?>
        </div>

        <?php $this->endWidget(); ?>

    </div><!-- form -->

<?php endif; ?>
