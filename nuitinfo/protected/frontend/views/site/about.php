<?php
/* @var $this SiteController */

$this->pageTitle = Yii::app()->name . ' - About';
?>

<span ng-controller="ControllerContent"
      ng-init="page='about';user=2;load()"
      ng-bind-html-unsafe="content"></span>

<!--
<h2>Console</h2>
<div ng-controller='ControllerTest'>

	<div id='console' ng-init='about()'></div>

</div>
-->
