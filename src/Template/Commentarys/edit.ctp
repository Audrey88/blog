<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $commentary->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $commentary->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Commentarys'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Articles'), ['controller' => 'Articles', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Article'), ['controller' => 'Articles', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="commentarys form large-9 medium-8 columns content">
    <?= $this->Form->create($commentary) ?>
    <fieldset>
        <legend><?= __('Edit Commentary') ?></legend>
        <?php
            echo $this->Form->input('description');
            echo $this->Form->input('user_id', ['options' => $users]);
            echo $this->Form->input('article_id', ['options' => $articles]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
