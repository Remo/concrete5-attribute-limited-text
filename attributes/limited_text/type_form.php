<fieldset>
    <legend><?= t('Attribute Options') ?></legend>
    <div class="form-group">
        <label class="control-label" for="maxLength"><?= t('Max Length') ?></label>
        <?= $form->text('maxLength', $maxLength) ?>
    </div>
    <div class="form-group">
        <div class="checkbox">
            <label class="control-label" for="showCounter">
                <?= $form->checkbox('showCounter', 1, $showCounter) ?>
                <?= t('Show Counter') ?>
            </label>
        </div>
    </div>
</fieldset>