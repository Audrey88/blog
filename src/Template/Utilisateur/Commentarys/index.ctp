<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Commentary'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Articles'), ['controller' => 'Articles', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Article'), ['controller' => 'Articles', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="commentarys index large-9 medium-8 columns content">
    <h3><?= __('Commentarys') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('description') ?></th>
                <th scope="col"><?= $this->Paginator->sort('user_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('article_id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($commentarys as $commentary): ?>
            <tr>
                <td><?= $this->Number->format($commentary->id) ?></td>
                <td><?= h($commentary->description) ?></td>
                <td><?= $commentary->has('user') ? $this->Html->link($commentary->user->id, ['controller' => 'Users', 'action' => 'view', $commentary->user->id]) : '' ?></td>
                <td><?= $commentary->has('article') ? $this->Html->link($commentary->article->id, ['controller' => 'Articles', 'action' => 'view', $commentary->article->id]) : '' ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $commentary->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $commentary->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $commentary->id], ['confirm' => __('Are you sure you want to delete # {0}?', $commentary->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
        </ul>
        <p><?= $this->Paginator->counter() ?></p>
    </div>
</div>