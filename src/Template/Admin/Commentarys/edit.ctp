<div class="commentarys form large-9 medium-8 columns content">
    <div class="panel panel-info">
        <div class="panel-heading">
            <h3>Modifier votre commentaire</h3>
        </div>
        <div class=" panel-body">
    <?= $this->Form->create($commentary) ?>
    <fieldset>
        <label>Votre commentaire original:</label>
        <p><?php echo $commentary->description ?></p>
        <?php
        echo $this->Form->hidden('article_id');
        echo $this->Form->hidden('user_id');
        ?>
        <label>Modifiez-le: </label><br>
        <?php
        echo $this->Form->textarea('description', ['rows' => '5', 'cols' => '60', 'label'=>false]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>