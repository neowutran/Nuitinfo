<?php echo TbHtml::beginFormTb(); ?>
<?php echo TbHtml::errorSummary($model); ?>

    <fieldset>
        <?php
        echo TbHtml::textField(
            $model,
            'nom',
            [
                'class'     => 'span5',
                'maxlength' => 255
            ]
        );
        ?>

    </fieldset>

    <div class="form-actions">
        <?php
        echo TbHtml::formActions(
            [
                TbHtml::submitButton(
                    $model->isNewRecord ? 'Create' : 'Save',
                    [
                        'color' => TbHtml::BUTTON_COLOR_PRIMARY
                    ]
                ),
                TbHtml::button('Cancel'),
            ]
        );
        ?>
    </div>

<?php echo TbHtml::endForm(); ?>