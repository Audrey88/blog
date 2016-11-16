<div class="commentarys form large-9 medium-8 columns content">
    <?= $this->Form->create($commentary) ?>
    <fieldset>
        <legend><?= __('Edit Commentary') ?></legend>
        <?php
        echo $this->Form->input('description');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>