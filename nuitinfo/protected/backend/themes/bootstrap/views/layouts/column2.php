<?php /* @var $this Controller */ ?>
<?php $this->beginContent('//layouts/main'); ?>
<div class="row">
    <div class="span9">
        <div id="content">
            <?php echo $content; ?>
        </div>
        <!-- content -->
    </div>
    <div class="span3">
        <div id="sidebar">
            <?php
            $this->beginWidget(
                'zii.widgets.CPortlet',
                array(
                    'title' => 'Operations',
                )
            );
            $this->widget(
                'bootstrap.widgets.TbNav',
                array(
                    'items'       => $this->menu,
                    'type'        => TbHtml::NAV_TYPE_LIST,
                    'htmlOptions' => array(
                        'class' => 'operations'
                    ),
                )
            );
            $this->endWidget();
            ?>
        </div>
        <!-- sidebar -->
    </div>
</div>
<?php $this->endContent(); ?>
