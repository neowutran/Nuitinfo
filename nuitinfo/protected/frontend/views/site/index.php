<?php
/* @var $this SiteController */

$this->pageTitle = Yii::app()->name;
?>
<h1>Console</h1>
<div class='center'
     ng-controller='ControllerTest'>

    <div id='console'></div>
    <input type='text'
           id='query'
           ng-model="donnee"
           ui-keypress="{'enter':'keypressCallback($event)'}" />

</div>
