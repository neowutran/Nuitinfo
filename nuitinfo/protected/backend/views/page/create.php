<?php
$this->breadcrumbs = [
    'Pages' => ['index'],
    'Create',
];

$this->menu = [
    [
        'label' => 'Admin',
        'url'   => ['index']
    ],
];
?>

<h1>Create Page</h1>

<?php echo $this->renderPartial('_form', ['model' => $model]); ?>
