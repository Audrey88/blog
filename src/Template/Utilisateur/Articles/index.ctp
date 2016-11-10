<div class="row">
    <div class="col-md-3">
        <div class="panel panel-info">
            <div class="panel-heading">
                <h3>Catégories</h3>
            </div>
            <div class="panel-body">
                <?php foreach ($categories as $cat): ?>
                <p><?= $cat->name?></p>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
    <div class="col-md-9">
        <div class="articles index col-md-12 columns content">
            <?php foreach ($artPublished as $article): ?>
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
                        Publié le
                        <?= $article->date_publish ?>
                    </p>
                </div>
                <div class="related">
                    <?php foreach ($article->commentarys as $commentarys): ?>
                        <p><strong>Commentaire de <?= $commentarys->user->lastname ?>  <?= $commentarys->user->firstname ?> :</strong>
                        </p>
                        <div class="well">
                            <?= h($commentarys->description) ?>
                        </div>
                    <?php endforeach; ?>
                    <?= $this->Form->create($commentary,['url' => ['controller'=>'commentarys','action' => 'add', 'prefix'=>'utilisateur']]) ?>
                    <div class="well">
                        <?= $this->Form->input('description'); ?>
                        <?= $this->Form->select('article_id',['default'=>$article->id],['class'=>'hidden'])?>
                    </div>
                    <?= $this->Form->button(__('Submit')) ?>
                    <?= $this->Form->end() ?>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>
