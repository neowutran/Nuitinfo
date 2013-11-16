<?php
Yii::app()
    ->getClientScript()
    ->registerCoreScript('jquery');
Yii::app()
    ->getClientScript()
    ->registerCoreScript('jquery.ui');

Yii::app()
    ->getClientScript()
    ->registerCssFile(
        Yii::app()
            ->getClientScript()
            ->getCoreScriptUrl() . '/jui/css/base/jquery-ui.css'
    );
Yii::app()->bootstrap->register();
?>
<!DOCTYPE html>
<!--[if lt IE 7]>
<html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>
<html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>
<html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js"
      lang="fr"
      ng-app="neowutran"> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible"
          content="IE=edge,chrome=1">
    <meta name="description"
          content="">
    <meta name="viewport"
          content="width=device-width">
    <style>
        body
        {
            padding-top    : 60px;
            padding-bottom : 40px;
        }
    </style>

    <title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>

<body>
<!--[if lt IE 8]>
<p class="chromeframe">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade
                                                                                                                    your
                                                                                                                    browser</a>
                       or <a href="http://www.google.com/chromeframe/?redirect=true">activate Google Chrome
                                                                                     Frame</a> to
                       improve your experience.</p>
<![endif]-->
<div class="container">
    <?php
    $this->widget(
        'bootstrap.widgets.TbNavbar',
        [
            'brandLabel' => 'Accueil',
            'items'      => [
                [
                    'class' => 'bootstrap.widgets.TbNav',
                    'items' => [
                        [
                            'label' => 'User',
                            'url'   => Yii::app()
                                    ->createUrl("user/index")
                        ],
                        [
                            'label' => 'Activity',
                            'url'   => Yii::app()
                                    ->createUrl("activity/index")
                        ],
                        [
                            'label' => 'Plan',
                            'url'   => Yii::app()
                                    ->createUrl("plan/index")
                        ],
                        [
                            //  'bootstrap.*',
                            'label' => 'Auth',
                            'url'   => Yii::app()
                                    ->createUrl("auth")
                        ],
                    ]
                ]
            ]
        ]
    );
    ?>
    <br>
    <br>
    <?php if (isset($this->breadcrumbs)): ?>
        <?php
                $this->widget( 'bootstrap.widgets.TbBreadcrumb', [
                    'links' => $this->breadcrumbs,
                ] );
                ?><!-- breadcrumbs -->
    <?php endif ?>
    <?php
    echo $content;
    ?>
</div>
</body>
</html>
