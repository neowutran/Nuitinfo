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
            'brandLabel' => 'Nuit de l\'info 2013',
            'items'      => [
                [
                    'class' => 'bootstrap.widgets.TbNav',
                    'items' => [
                        [
                            'label' => 'Equipe',
                            'url'   => Yii::app()
                                    ->createUrl("site/equipe")
                        ],
                        [
                            'label' => 'Outils / aide',
                            'url'   => Yii::app()
                                    ->createUrl("site/outils")
                        ],
                        [
                            'label' => 'Projet',
                            'url'   => Yii::app()
                                    ->createUrl("site/index")
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
    <?php echo TbHtml::well('<h1>Nom d\'equipe: x + 1 is a tree</h1>'); ?>

    <?php
    echo $content;
    ?>
    <div id="disqus_thread"></div>
    <script type="text/javascript">
        /* * * CONFIGURATION VARIABLES: EDIT BEFORE PASTING INTO YOUR WEBPAGE * * */
        var disqus_shortname = 'nuitdelinfo2013'; // required: replace example with your forum shortname

        /* * * DON'T EDIT BELOW THIS LINE * * */
        (function() {
            var dsq = document.createElement('script'); dsq.type = 'text/javascript'; dsq.async = true;
            dsq.src = '//' + disqus_shortname + '.disqus.com/embed.js';
            (document.getElementsByTagName('head')[0] || document.getElementsByTagName('body')[0]).appendChild(dsq);
        })();
    </script>
    <noscript>Please enable JavaScript to view the <a href="http://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>
    <a href="http://disqus.com" class="dsq-brlink">comments powered by <span class="logo-disqus">Disqus</span></a>

</div>
</body>
</html>
