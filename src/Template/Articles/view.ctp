<?= $this->Html->css('front.css') ?>

<?= $this->Html->link('Accueil', ['controller' => 'Pages', 'action' => '/', 'prefix' => false]) ?> /
<?= $this->Html->link($this->request->params['controller'], ['action' => 'index']) ?> /
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
                <h3><?= h($article->titre) ?></h3>
            </div>
            <div class="panel-body">
                <div class="col-md-12">
                    <?= $this->Html->image('/img/article/' . $article->picture_url, ['class' => 'img-responsive center-block']) ?>
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
            <?php if ($commentarys->user_id == $this->request->session()->read('Auth')['User']['id']): ?>
            <?= $this->Form->postLink('Delete', ['controller' => 'Commentarys', 'action' => 'delete', $commentarys->id], ['confirm' => __('Are you sure you want to delete # {0}?', $commentarys->id),'class' => 'pull-right']) ?>
            <?php endif; ?>
        </div>
    <?php endforeach; ?>
    <?= $this->Form->create($commentary, ['url' => ['controller' => 'commentarys', 'action' => 'add', $article->id, 'prefix' => 'utilisateur']]) ?>
    <fieldset>
        <label>Ajouter un commentaire :</label>
        <?php
        echo $this->Form->input('description', ['label' => false, 'class' => 'well form-control']);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3/jquery.min.js"></script>
<?= $this->Html->script('jsnow.js') ?>
<script type="text/javascript" src="js/jsnow.js"></script>
<script type="text/javascript">
    $(function () {
        $().jSnow();
    });
</script>