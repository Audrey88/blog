<?= $this->Html->link('Accueil', ['controller' => 'Pages', 'action' => '/', 'prefix' => false]) ?> /
<?= $this->Html->link($this->request->params['controller'], ['action' => 'index']) ?> /
<div class="page-title">
    <h1 class="uppercase">Article <?php if ($article->publish == 1) : ?> publié <?php else: ?> Non publié <?php endif; ?><?= $article->Titre ?> </h1>
</div>
<div class="page-content">
    <div class="container">
        <div class="page-content-inner">
            <div class="profile">
                <div class="row">
                    <div class="col-md-3">
                        <ul class="list-unstyled">
                            <li>
                                <?php if (!empty($article->picture_url)) :?>
                                    <?= $this->Html->image('/img/article/' . $article->picture_url, ['class' => 'img-responsive']) ?>
                                <?php else: ?>
                                <?= $this->Html->image('/img/article/noPicture.png', ['class' => 'img-responsive']) ?>
                                <?php endif; ?>
                            </li>
                        </ul>
                    </div>
                    <div class="col-md-9">
                        <div class="row">
                            <div class="col-md-8 profile-info">
                                <h3><?= h($article->titre) ?></h3>
                                <ul class="list-inline">
                                    <li>
                                        <i class="glyphicon glyphicon-gift text-primary"></i> <?= $article->description ?>
                                    </li>
                                    <li>
                                        <i class="glyphicon glyphicon-envelope text-primary"></i><?= $article->has('category') ? $article->category->name : '' ?>
                                    </li>
                                    <li>
                                        <i class="glyphicon glyphicon-gift text-primary"></i>Publié le
                                        : <?= $article->date_publish ?>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="related">
    <h4><?= __('Related Commentarys') ?></h4>
    <?php if (!empty($article->commentarys)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Description') ?></th>
                <th scope="col"><?= __('User Id') ?></th>
                <th scope="col"><?= __('Article Id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($article->commentarys as $commentarys): ?>
                <tr>
                    <td><?= h($commentarys->id) ?></td>
                    <td><?= h($commentarys->description) ?></td>
                    <td><?= h($commentarys->user_id) ?></td>
                    <td><?= h($commentarys->article_id) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['controller' => 'Commentarys', 'action' => 'view', $commentarys->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['controller' => 'Commentarys', 'action' => 'edit', $commentarys->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['controller' => 'Commentarys', 'action' => 'delete', $commentarys->id], ['confirm' => __('Are you sure you want to delete # {0}?', $commentarys->id)]) ?>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>
    <?php endif; ?>
</div>
