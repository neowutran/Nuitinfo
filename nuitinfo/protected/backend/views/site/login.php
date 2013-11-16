<?php
/* @var $this SiteController */
/* @var $model LoginForm */
/* @var $form CActiveForm */

$this->pageTitle = Yii::app()->name . ' - Login';
?>

<h1>Login</h1>

<div class="form">
    <?php
    $form = $this->beginWidget(
        'CActiveForm',
        [
            'id'                     => 'login-form',
            'enableClientValidation' => true,
            'clientOptions'          => [
                'validateOnSubmit' => true,
                'validateOnChange' => true,
                'validateOnType'   => false,
                'htmlOptions'      => [
                    'class' => 'well'
                ],
            ],
        ]
    );
    ?>

    <fieldset>

        <div class="row">
            <?php echo $form->labelEx($model, 'username'); ?>
            <?php echo $form->textField($model, 'username'); ?>
            <?php echo $form->error($model, 'username'); ?>
        </div>

        <div class="row">
            <?php echo $form->labelEx($model, 'password'); ?>
            <?php echo $form->passwordField($model, 'password'); ?>
            <?php echo $form->error($model, 'password'); ?>
        </div>

        <div class="row rememberMe">
            <?php echo $form->checkBox($model, 'rememberMe'); ?>
            <?php echo $form->label($model, 'rememberMe'); ?>
            <?php echo $form->error($model, 'rememberMe'); ?>
        </div>

    </fieldset>

    <div class="form-actions">
        <?php
        echo TbHtml::formActions(
            [
                TbHtml::submitButton(
                    'Save changes',
                    [
                        'color' => TbHtml::BUTTON_COLOR_PRIMARY
                    ]
                ),
                TbHtml::button('Cancel'),
            ]
        );
        ?>
    </div>


    <?php $this->endWidget(); ?>
</div><!-- form -->
