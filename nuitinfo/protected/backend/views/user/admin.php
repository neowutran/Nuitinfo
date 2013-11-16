<?php
$this->breadcrumbs = array(
    'Users' => array(
        'index' ),
    'Manage',
);

$this->menu = array(
    array(
        'label' => 'Create User',
        'url'   => array(
            'create' )
    ),
);

Yii::app()->clientScript->registerScript( 'search', "
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
	" );
?>

<h1>Manage Users</h1>
<?php
$dataProvider             = $model->search();
$dataProvider->pagination = array(
    "pageSize" => 50 );

$this->widget( 'yiiwheels.widgets.grid.WhGridView', array(
    'id'               => 'user-grid',
    'dataProvider'     => $dataProvider,
    'filter'           => $model,
    'type'             => 'striped bordered',
    "enablePagination" => true,
    'template'         => "{pager}{items}{pager}",
    'fixedHeader'      => true,
    'headerOffset'     => 40,
    // 40px is the height of the main navigation at bootstrap
    'columns'          => array(
        array(
            'class'    => 'yiiwheels.widgets.editable.WhEditableColumn',
            'name'     => 'username',
            'editable' => array(
                'url'    => $this->createUrl( 'user/updateEditable' ),
                'params' => array(
                    'YII_CSRF_TOKEN' => Yii::app()->request->csrfToken ),
            //  'options' => array( '' ),
            )
        ),
        array(
            'class'    => 'yiiwheels.widgets.editable.WhEditableColumn',
            'name'     => 'password',
            'editable' => array(
                'url'    => $this->createUrl( 'user/updateEditable' ),
                'params' => array(
                    'YII_CSRF_TOKEN' => Yii::app()->request->csrfToken ),
            //  'options' => array( '' ),
            )
        ),
        array(
            'class'    => 'yiiwheels.widgets.editable.WhEditableColumn',
            'name'     => 'email',
            'editable' => array(
                'url'    => $this->createUrl( 'user/updateEditable' ),
                'params' => array(
                    'YII_CSRF_TOKEN' => Yii::app()->request->csrfToken ),
            //  'options' => array( '' ),
            )
        ),
        array(
            'class'   => 'bootstrap.widgets.TbButtonColumn',
            'buttons' => array(
                'update' => array(
                    'visible' => 'false',
                ),
                'view'   => array(
                    'visible' => 'false',
                ),
            ),
        ),
    ),
) );
?>
