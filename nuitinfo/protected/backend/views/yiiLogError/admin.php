<?php
$this->breadcrumbs = [
    'Yii Log Errors' => [
        'index'
    ],
    'Manage',
];

Yii::app()->clientScript->registerScript(
    'search',
    "
   $('.search-button').click(function(){
   $('.search-form').toggle();
   return false;
   });
   $('.search-form form').submit(function(){
   $.fn.yiiGridView.update('yii-log-error-grid', {
   data: $(this).serialize()
   });
   return false;
   });
   "
);
?>

<h1>Manage Yii Log Errors</h1>

<?php
$dataProvider = $model->search();
$dataProvider->pagination = [
    "pageSize" => 10
];
//var_dump($dataProvider->data);
//die();
$this->widget(
    'yiiwheels.widgets.grid.WhGridView',
    [
        'id'               => 'yii-log-error-grid',
        'dataProvider'     => $model->search(),
        'dataProvider'     => $dataProvider,
        'filter'           => $model,
        'type'             => 'striped bordered',
        "enablePagination" => true,
        'template'         => "{pager}{items}{pager}",
        'fixedHeader'      => true,
        'headerOffset'     => 40,
        // 40px is the height of the main navigation at bootstrap
        'columns'          => [
            'id',
            'level',
            'category',
            'logtime',
            [
                'name'  => 'message',
                'type'  => 'html',
                'value' => nl2br($dataProvider->data['id']['message']),
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
