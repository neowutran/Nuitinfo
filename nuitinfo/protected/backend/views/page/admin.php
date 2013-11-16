<?php
$this->breadcrumbs = [
    'Pages' => [
        'index'
    ],
    'Manage',
];

$this->menu = [
    [
        'label' => 'Create Page',
        'url'   => [
            'create'
        ]
    ],
];

Yii::app()->clientScript->registerScript(
    'search',
    "
       $('.search-button').click(function(){
           $('.search-form').toggle();
           return false;
       });
       $('.search-form form').submit(function(){
           $.fn.yiiGridView.update('page-grid', {
               data: $(this).serialize()
           });
           return false;
       });
       "
);
?>

<h1>Manage Pages</h1>
<?php
$dataProvider = $model->search();
$dataProvider->pagination = [
    "pageSize" => 50
];

$this->widget(
    'yiiwheels.widgets.grid.WhGridView',
    [
        'id'               => 'page-grid',
        'dataProvider'     => $dataProvider,
        'filter'           => $model,
        'type'             => 'striped bordered',
        "enablePagination" => true,
        'template'         => "{pager}{items}{pager}",
        'fixedHeader'      => true,
        'headerOffset'     => 40,
        // 40px is the height of the main navigation at bootstrap
        'columns'          => [
            //   'id',

            [
                'class'    => 'yiiwheels.widgets.editable.WhEditableColumn',
                'name'     => 'nom',
                'editable' => [
                    'url'    => $this->createUrl('page/updateEditable'),
                    'params' => [
                        'YII_CSRF_TOKEN' => Yii::app()->request->csrfToken
                    ],
                    //  'options' => array( '' ),
                ]
            ],
            //	     'nom',
            [
                'class'   => 'bootstrap.widgets.TbButtonColumn',
                'buttons' => [
                    'update' => [
                        'visible' => 'false',
                    ],
                    'view'   => [
                        'visible' => 'false',
                    ],
                ],
            ],
        ],
    ]
);
?>
