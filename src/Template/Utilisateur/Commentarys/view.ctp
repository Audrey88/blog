<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Commentary'), ['action' => 'edit', $commentary->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Commentary'), ['action' => 'delete', $commentary->id], ['confirm' => __('Are you sure you want to delete # {0}?', $commentary->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Commentarys'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Commentary'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Articles'), ['controller' => 'Articles', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Article'), ['controller' => 'Articles', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="commentarys view large-9 medium-8 columns content">
    <h3><?= h($commentary->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Description') ?></th>
            <td><?= h($commentary->description) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('User') ?></th>
            <td><?= $commentary->has('user') ? $this->Html->link($commentary->user->id, ['controller' => 'Users', 'action' => 'view', $commentary->user->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Article') ?></th>
            <td><?= $commentary->has('article') ? $this->Html->link($commentary->article->id, ['controller' => 'Articles', 'action' => 'view', $commentary->article->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($commentary->id) ?></td>
        </tr>
    </table>
</div>
