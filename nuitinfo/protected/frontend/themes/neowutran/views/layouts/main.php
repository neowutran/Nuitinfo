<?php
Yii::app()->getClientScript()->coreScriptPosition = CClientScript::POS_END;

Yii::app()->getClientScript()->registerCoreScript('jquery');
Yii::app()->getClientScript()->registerCoreScript('jquery.ui');

Yii::app()->getClientScript()->registerCssFile(
    Yii::app()->getClientScript()->getCoreScriptUrl() . '/jui/css/base/jquery-ui.css'
);

Yii::app()->getClientScript()->registerCssFile(Yii::app()->params['static_folder'] . 'app/css/app.css');
Yii::app()->getClientScript()->registerCssFile(Yii::app()->params['static_folder'] . 'app/css/styles.css');
Yii::app()->getClientScript()->registerCssFile(Yii::app()->params['static_folder'] . 'css/goth_blue.css');
Yii::app()->getClientScript()->registerCssFile(
    Yii::app()->params['static_folder'] . 'javascript/scrollbar/jquery.mCustomScrollbar.css'
);

Yii::app()->getClientScript()->registerScriptFile(
    Yii::app()->params['static_folder'] . 'javascript/scrollbar/jquery.mCustomScrollbar.concat.min.js',
    CClientScript::POS_END
);


Yii::app()->getClientScript()->registerScriptFile(
    Yii::app()->params['static_folder'] . 'javascript/fancyBox/lib/jquery.mousewheel-3.0.6.pack.js',
    CClientScript::POS_END
);


Yii::app()->getClientScript()->registerScriptFile(
    Yii::app()->params['static_folder'] . 'javascript/supersized/js/jquery.easing.min.js',
    CClientScript::POS_END
);


Yii::app()->getClientScript()->registerScriptFile(
    Yii::app()->params['static_folder'] . 'javascript/Jplayer_2.4.0/jquery.jplayer.min.js',
    CClientScript::POS_END
);


Yii::app()->getClientScript()->registerScriptFile(
    Yii::app()->params['static_folder'] . 'javascript/Jplayer_2.4.0/add-on/jplayer.playlist.min.js',
    CClientScript::POS_END
);


Yii::app()->getClientScript()->registerScriptFile(
    Yii::app()->params['static_folder'] . 'javascript/galleria/galleria-1.2.9.min.js',
    CClientScript::POS_END
);

Yii::app()->getClientScript()->registerScriptFile(
    Yii::app()->params['static_folder'] . 'javascript/galleria/themes/galleria-classicmod/galleria.classicmod.js',
    CClientScript::POS_END
);

Yii::app()->getClientScript()->registerScriptFile(
    Yii::app()->params['static_folder'] . 'javascript/fancyBox/source/jquery.fancybox.pack.js?v=2.1.4',
    CClientScript::POS_END
);

Yii::app()->getClientScript()->registerCssFile(
    Yii::app()->params['static_folder'] . 'javascript/fancyBox/source/jquery.fancybox.css?v=2.1.4'
);


Yii::app()->getClientScript()->registerCssFile(
    Yii::app()->params['static_folder'] . 'javascript/galleria/themes/galleria-classicmod/galleria.classicmod.css'
);


Yii::app()->getClientScript()->registerScriptFile(
    Yii::app()->params['static_folder'] . 'javascript/supersized/js/supersized.3.2.7.min.js',
    CClientScript::POS_END
);

Yii::app()->getClientScript()->registerScriptFile(
    Yii::app()->params['static_folder'] . 'javascript/supersized/theme/supersized.shutter.min.js',
    CClientScript::POS_END
);


Yii::app()->getClientScript()->registerScriptFile(
    Yii::app()->params['static_folder'] . 'javascript/main.js',
    CClientScript::POS_END
);


Yii::app()->getClientScript()->registerScriptFile(
    Yii::app()->params['static_folder'] . 'app/lib/angular/angular.min.js',
    CClientScript::POS_END
);

Yii::app()->getClientScript()->registerScriptFile(
    Yii::app()->params['static_folder'] . 'app/lib/angular/angular-sanitize.min.js',
    CClientScript::POS_END
);
Yii::app()->getClientScript()->registerScriptFile(
    Yii::app()->params['static_folder'] . 'app/lib/angular/angular-loader.min.js',
    CClientScript::POS_END
);
Yii::app()->getClientScript()->registerScriptFile(
    Yii::app()->params['static_folder'] . 'app/lib/angular/angular-cookies.min.js',
    CClientScript::POS_END
);
Yii::app()->getClientScript()->registerScriptFile(
    Yii::app()->params['static_folder'] . 'app/lib/angular/modules/keypress/keypress.js',
    CClientScript::POS_END
);
Yii::app()->getClientScript()->registerScriptFile(
    Yii::app()->params['static_folder'] . 'app/lib/angular/modules/ie-shiv/ie-shiv.js',
    CClientScript::POS_END
);


Yii::app()->getClientScript()->registerScriptFile(
    Yii::app()->params['static_folder'] . 'app/lib/angular_infinite_scroll/ng-infinite-scroll.min.js',
    CClientScript::POS_END
);

Yii::app()->getClientScript()->registerScriptFile(
    Yii::app()->params['static_folder'] . 'app/lib/angular/angular-resource.min.js',
    CClientScript::POS_END
);


Yii::app()->getClientScript()->registerScriptFile(
    Yii::app()->params['static_folder'] . 'app/js/app.js',
    CClientScript::POS_END
);
Yii::app()->getClientScript()->registerScriptFile(
    Yii::app()->params['static_folder'] . 'app/js/controllers.js',
    CClientScript::POS_END
);

Yii::app()->getClientScript()->registerScriptFile(
    Yii::app()->params['static_folder'] . 'app/js/directives.js',
    CClientScript::POS_END
);
Yii::app()->getClientScript()->registerScriptFile(
    Yii::app()->params['static_folder'] . 'app/js/filters.js',
    CClientScript::POS_END
);
Yii::app()->getClientScript()->registerScriptFile(
    Yii::app()->params['static_folder'] . 'app/js/services.js',
    CClientScript::POS_END
);

$this->widget('application.widgets.background.Background');



?>
<!DOCTYPE html>
<!--[if lt IE 7]>
<html lang="fr"
      class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>
<html lang="fr"
      class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>
<html lang="fr"
      class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!-->
<html lang="fr"
      class="no-js"
      ng-app="neowutran"> <!--<![endif]-->
<head>
    <meta http-equiv="Content-Type"
          content="text/html; charset=utf-8" />
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible"
          content="IE=edge,chrome=1">
    <meta name="viewport"
          content="width=device-width" />
    <meta name="viewport"
          content="initial-scale=1.0">
    <link rel="icon"
          type="image/png"
          href="<?php echo Yii::app()->params['static_folder']; ?>images/icon/icone_og.png" />
    <title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>
<body>


<div id="titre"><?php echo Yii::app()->name; ?></div>
<div id="monstre"></div>
<div id='flexible_box_vertical'>
    <div id='alignement_box'>
        <div id='contain_box_left_menu'></div>
        <div id='menu_horizontale'>
            <div id='border_menu_horizontale'>

                <nav>
                    <?php
                    $this->widget(
                        'zii.widgets.CMenu',
                        [
                            'items' => [
                                [
                                    'label' => Yii::t('themes', 'Projets'),
                                    'url'   => [
                                        '/site/projet'
                                    ]
                                ],
                                [
                                    'label'       => Yii::t('themes', 'Audio'),
                                    'url'         => [
                                        '/site/saga',

                                    ],
                                    'htmlOptions' => ['class' => 'arrow_box'],
                                    'items'       => [
                                        [
                                            'label' => Yii::t('themes', 'Saga'),
                                            'url'   => [
                                                '/site/saga',

                                            ]
                                        ],
                                        [
                                            'label' => Yii::t('themes', 'Radio'),
                                            'url'   => [
                                                '/site/radio',

                                            ]
                                        ],
                                    ]
                                ],
                                [
                                    'label' => Yii::t('themes', 'Galerie'),
                                    'url'   => ['/gallery']
                                ],

                            ],
                            'id'    => 'elements_menu_horizontal',
                        ]
                    );
                    ?>
                </nav>
            </div>
        </div>
    </div>
    <div id='flexible_box'>
        <div id='left'>
            <div id='character'></div>
            <div id="contain_box_left">
                <div id="border_left">
                    <div id='menu_vertical'>
                        <nav>
                            <?php
                            $this->widget(
                                'zii.widgets.CMenu',
                                [
                                    'items' => [
                                        [
                                            'label' => Yii::t('themes', 'Accueil'),
                                            'url'   => ['/site/index']
                                        ],
                                        [
                                            'label' => Yii::t('themes', 'Contact'),
                                            'url'   => ['/site/contact']
                                        ],
                                        [
                                            'label' => Yii::t('themes', 'About'),
                                            'url'   => ['/site/about']
                                        ],
                                        [
                                            'label' => Yii::t('themes', 'Chat'),
                                            'url'   => ['/site/chat']
                                        ],

                                    ]
                                ]
                            );
                            ?>
                        </nav>
                    </div>

                    <?php
                    $this->widget('application.widgets.miniature.Miniature');
                    ?>


                </div>
            </div>
        </div>
        <div id='contain_box_center'>
            <div id='border_center'>
                <?php $this->widget('zii.widgets.CBreadcrumbs', [
					'links'=>$this->breadcrumbs,
					]); ?><!-- breadcrumbs -->

                <div id='corps'>

                    <?php
                    foreach (Yii::app()->user->getFlashes() as $key => $message) {

                        echo '<div class="flash-' . $key . '">' . $message . "</div><br>";

                    }

                    echo $content;
                    ?>
                </div>
            </div>
        </div>
    </div>
    <footer>
        <div id="pied">
            <div id="border_pied">

                <?php
                $this->widget('application.widgets.idiome.Idiome');
                ?>

            </div>
        </div>
    </footer>
</div>
</body>
</html>
