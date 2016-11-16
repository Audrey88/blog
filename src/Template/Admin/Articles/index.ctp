<div class="articles index col-md-12 columns content">
    <h2 class="text-center">Mes articles publiés</h2>
    <table class="table table-striped text-center">
        <thead>
        <tr>
            <th><?= $this->Paginator->sort('Photo') ?></th>
            <th><?= $this->Paginator->sort('Titre') ?></th>
            <th><?= $this->Paginator->sort('description') ?></th>
            <th><?= $this->Paginator->sort('Catégorie')?></th>
            <th><?= $this->Paginator->sort('commentary_id') ?></th>
            <th><?= $this->Paginator->sort('Action') ?></th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($artPublished as $article): ?>
            <tr class="odd gradeX">
                <td>
                    <?php if (!empty($article->picture_url)) : ?>
                        <?= $this->Html->image('/img/article/100x100/' . $article->picture_url, ['class' => 'img-responsive center-block']) ?>
                    <?php endif; ?></td>
                <td><?= h($article->titre) ?></td>
                <td><?= $this->Text->truncate (
                        $article->description,
                        50, [
                            'ellipsis'=> '...',
                            'exact'=> false
                        ]
                    )?></td>
                <td><?= $article->has('category') ? $article->category->name : '' ?></td>
                <td>
                    <?php $nb =0; ?>
                    <?php foreach ($article->commentarys as $commentarys): ?>
                        <?php count($commentarys->description);
                        $nb++;
                        ?>
                    <?php endforeach; ?>
                    <?= $nb; ?>
                </td>
                <td>
                    <a href="<?= $this->Url->build(['controller' => 'Articles', 'action' => 'view', $article->id]); ?>">
                        <i class="glyphicon glyphicon-search"></i>
                    </a>
                    <a href="<?= $this->Url->build(['controller' => 'Articles', 'action' => 'edit', $article->id]); ?>">
                        <i class="glyphicon glyphicon-pencil"></i>
                    </a>
                    <?= $this->Form->postLink(__(''), ['action' => 'delete', $article->id], ['confirm' => __('Are you sure you want to delete # {0}?', $article->id),'class'=>'glyphicon glyphicon-remove']) ?>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
    <h2 class="text-center">Mes Brouillons</h2>
    <table class="table table-striped text-center">
        <thead>
        <tr>
            <th><?= $this->Paginator->sort('Photo') ?></th>
            <th><?= $this->Paginator->sort('Titre') ?></th>
            <th><?= $this->Paginator->sort('description') ?></th>
            <th><?= $this->Paginator->sort('Catégorie') ?></th>
            <th><?= $this->Paginator->sort('commentary_id') ?></th>
            <th><?= $this->Paginator->sort('Action') ?></th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($artBrouillon as $article): ?>
            <tr class="odd gradeX">
                <td>
                    <?php if (!empty($article->picture_url)) : ?>
                        <?= $this->Html->image('/img/article/100x100/' . $article->picture_url, ['class' => 'img-responsive center-block']) ?>
                    <?php endif; ?></td>
                <td><?= h($article->titre) ?></td>
                <td><?=  $this->Text->truncate (
                        $article->description,
                        120, [
                            'ellipsis'=> '...',
                            'exact'=> false
                        ]
                    ) ?></td>
                <td><?= $article->has('category') ? $article->category->name : '' ?></td>
                <td>
                        <?php $nb =0; ?>
                        <?php foreach ($article->commentarys as $commentarys): ?>
                            <?php count($commentarys->description);
                            $nb++;
                            ?>
                        <?php endforeach; ?>
                        <?= $nb; ?>
                </td>
                <td>
                    <a href="<?= $this->Url->build(['controller' => 'Articles', 'action' => 'view', $article->id]); ?>">
                        <i class="glyphicon glyphicon-search"></i>
                    </a>
                    <a href="<?= $this->Url->build(['controller' => 'Articles', 'action' => 'edit', $article->id]); ?>">
                        <i class="glyphicon glyphicon-pencil"></i>
                    </a>
                    <?= $this->Form->postLink(__(''), ['action' => 'delete', $article->id],['class'=>'glyphicon glyphicon-remove'], ['confirm' => __('Are you sure you want to delete # {0}?', $article->id)]) ?>
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