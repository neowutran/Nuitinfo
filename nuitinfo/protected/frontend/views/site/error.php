<?php
/* @var $this SiteController */
/* @var $error array */

$this->pageTitle = Yii::app()->name . ' - ' . Yii::t('views', 'Error');
?>

<h2><?php echo Yii::t('views', 'Error'); ?> <?php echo $code; ?></h2>

<div class="error">
    <?php echo CHtml::encode($message); ?>
</div>
