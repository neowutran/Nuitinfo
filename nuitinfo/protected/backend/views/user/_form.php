<?php
$form = $this->beginWidget( 'bootstrap.widgets.TbActiveForm', [
    'id'                     => 'user-form',
    'enableAjaxValidation'   => true,
    'enableClientValidation' => true,
    'htmlOptions'            => [
        'class' => 'well' ],
        ] );
?>

<?php echo $form->errorSummary( $model ); ?>
<fieldset>
    <?php
    echo $form->textField( $model, 'username', [
        'class'       => 'span5',
        'maxlength'   => 200,
        'placeholder' => 'username'
    ] );
    ?>

    <?php
    echo $form->passwordField( $model, 'password', [
        'rows'        => 6,
        'cols'        => 50,
        'class'       => 'span8',
        'placeholder' => 'password'
    ] );
    ?>

    <?php
    echo $form->textField( $model, 'email', [
        'rows'        => 6,
        'cols'        => 50,
        'class'       => 'span8',
        'placeholder' => 'email'
    ] );
    ?>

</fieldset>

<div class="form-actions">
    <?php
    echo TbHtml::formActions( [
        TbHtml::submitButton( $model->isNewRecord ? 'Create' : 'Save', [
            'color' => TbHtml::BUTTON_COLOR_PRIMARY ] ),
        TbHtml::button( 'Cancel' ),
    ] );
    ?>
</div>

<?php
$this->endWidget();
