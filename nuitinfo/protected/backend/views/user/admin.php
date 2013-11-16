<?php
$this->breadcrumbs = [
    'Users' => [
        'index'
    ],
    'Manage',
];

$this->menu = [
    [
        'label' => 'Create User',
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
           $.fn.yiiGridView.update('user-grid', {
               data: $(this).serialize()
           });
           return false;
       });
       "
);
?>

<h1>Manage Users</h1>
<?php
$dataProvider = $model->search();
$dataProvider->pagination = [
    "pageSize" => 50
];

$this->widget(
    'yiiwheels.widgets.grid.WhGridView',
    [
        'id'               => 'user-grid',
        'dataProvider'     => $dataProvider,
        'filter'           => $model,
        'type'             => 'striped bordered',
        "enablePagination" => true,
        'template'         => "{pager}{items}{pager}",
        'fixedHeader'      => true,
        'headerOffset'     => 40,
        // 40px is the height of the main navigation at bootstrap
        'columns'          => [
            [
                'class'    => 'yiiwheels.widgets.editable.WhEditableColumn',
                'name'     => 'username',
                'editable' => [
                    'url'    => $this->createUrl('user/updateEditable'),
                    'params' => [
                        'YII_CSRF_TOKEN' => Yii::app()->request->csrfToken
                    ],
                    //  'options' => array( '' ),
                ]
            ],
            [
                'class'    => 'yiiwheels.widgets.editable.WhEditableColumn',
                'name'     => 'password',
                'editable' => [
                    'url'    => $this->createUrl('user/updateEditable'),
                    'params' => [
                        'YII_CSRF_TOKEN' => Yii::app()->request->csrfToken
                    ],
                    //  'options' => array( '' ),
                ]
            ],
            [
                'class'    => 'yiiwheels.widgets.editable.WhEditableColumn',
                'name'     => 'email',
                'editable' => [
                    'url'    => $this->createUrl('user/updateEditable'),
                    'params' => [
                        'YII_CSRF_TOKEN' => Yii::app()->request->csrfToken
                    ],
                    //  'options' => array( '' ),
                ]
            ],
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
