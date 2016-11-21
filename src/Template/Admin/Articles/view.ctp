
<div class="page-title">
    <h1 class="uppercase">
        Article <?php if ($article->publish == 1) : ?> publié <?php else: ?> Non publié <?php endif; ?>
        <?= $article->Titre ?>
    </h1>
</div>
<div class="page-content">
    <div class="container">
        <div class="panel panel-info text-center">
            <div class="panel-heading">
                <h3><?= h($article->titre) ?>
                    <a href="<?= $this->Url->build(['controller' => 'Articles', 'action' => 'edit', $article->id]); ?>" class="pull-right">
                        <i class="glyphicon glyphicon-pencil"></i>
                    </a>
                </h3>
            </div>
            <div class="panel-body">
                <div class="col-md-12">
                    <?= $this->Html->image('/img/article/800x800/' . $article->picture_url, ['class' => 'img-responsive center-block']) ?>
                </div>
                <div class="col-md-12">
                    <h4>Catégorie:</h4>
                    <p><?= $article->has('category') ? $article->category->name : '' ?></p>
                    <h4>description :</h4>
                    <p> <?= $article->description ?>
                    </p>
                </div>
            </div>
            <p class="pull-right">
                <?= $article->publish ? __('Publié le') : __('Sauvegardé le'); ?>
                <?= $article->date_publish ?>
            </p>
        </div>
    </div>
</div>
<div class="related">
    <?php foreach ($article->commentarys as $commentarys): ?>
        <p><strong>Commentaire de <?= $commentarys->user->lastname ?>  <?= $commentarys->user->firstname ?> :</strong>
        </p>
        <div class="well">
            <?= h($commentarys->description) ?>
            <?= $this->Form->postLink('Delete', ['controller' => 'Commentarys', 'action' => 'delete', $commentarys->id], ['confirm' => __('Are you sure you want to delete # {0}?', $commentarys->id),'class' => 'pull-right']) ?>
        </div>
    <?php endforeach; ?>
</div>
