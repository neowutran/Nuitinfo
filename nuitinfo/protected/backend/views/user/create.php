<?php
$this->breadcrumbs = [
    'Users' => ['index'],
    'Create',
];

$this->menu = [
    [
        'label' => 'List User',
        'url'   => ['index']
    ],
];
?>

<h1>Create User</h1>

<?php echo $this->renderPartial('_form', ['model' => $model]); ?>
