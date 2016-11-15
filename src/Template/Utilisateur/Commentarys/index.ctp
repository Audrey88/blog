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
    <h3><?= __('Mes commentaires') ?></h3>
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('description') ?></th>
                <th scope="col"><?= $this->Paginator->sort('article') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($commentarys as $commentary): ?>
            <tr class="odd gradeX">
                <td><?=$this->Text->truncate (
                        $commentary->description,
                        100, [
                            'ellipsis'=> '...',
                            'exact'=> false
                        ]
                    )  ?></td>
                <td><?= $commentary->has('article') ? $this->Html->link($commentary->article->titre, ['controller' => 'Articles', 'action' => 'view', $commentary->article->id]) : '' ?></td>
                <td class="actions">
                    <a href="<?= $this->Url->build(['controller' => 'Articles', 'action' => 'view',$commentary->article->id]); ?>">
                        <i class="glyphicon glyphicon-eye-open"></i>
                    </a>
                    <a href="<?= $this->Url->build(['controller' => 'Articles', 'action' => 'view',  $commentary->article->id]); ?>">
                        <i class="glyphicon glyphicon-pencil"></i>
                    </a>
                    <?= $this->Form->postLink(__(''), ['action' => 'delete', $commentary->id], ['confirm' => __('Are you sure you want to delete # {0}?', $commentary->id),'class'=> 'glyphicon glyphicon-remove']) ?>
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