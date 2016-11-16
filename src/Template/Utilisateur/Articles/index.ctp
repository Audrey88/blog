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
                        <h3><?= $article->titre ?></h3>
                    </div>
                    <div class="panel-body">
                        <div class="col-md-12 img" id="<?=$article->id?>">
                            <?= $this->Html->image('/img/article/800x800/' . $article->picture_url, ['class' => 'img-responsive center-block']) ?>
                        </div>
                        <div class="col-md-12">
                            <h4>Catégorie:</h4>
                            <p><?= $article->has('category') ? $article->category->name : '' ?></p>
                            <h4>description :</h4>
                            <p class="big"> <?= $article->description ?>
                            </p>
                        </div>
                        <div class="related text-left col-md-8">
                            <div id="<?= $article->id ?>" class="comments">
                                <i class="glyphicon glyphicon-comment"></i>
                                <?php $nb = 0; ?>
                                <?php foreach ($article->commentarys as $commentarys): ?>
                                    <?php count($commentarys->description);
                                    $nb++;
                                    ?>
                                <?php endforeach; ?>
                                <?= $nb; ?>
                            </div>
                            <div id="commentaire-<?= $article->id ?>" style="display: none" class="text-left">
                                <?php foreach ($article->commentarys as $commentarys): ?>
                                    <p>Commentaire de <?= $commentarys->user->username ?>:</p>
                                    <div class="well">
                                        <?= h($commentarys->description) ?>
                                    </div>
                                <?php endforeach; ?>
                                <?php if (isset($this->request->session()->read('Auth')['User']['id']) == 2): ?>
                                    <?= $this->Form->create($commentary, ['url' => ['controller' => 'commentarys', 'action' => 'add', $article->id, 'prefix' => 'utilisateur']]) ?>
                                    <fieldset>
                                        <label>Ajouter un commentaire :</label>
                                        <?php
                                        echo $this->Form->input('description', ['label' => false, 'class' => 'well form-control']);
                                        ?>
                                    </fieldset>
                                    <?= $this->Form->button(__('Submit')) ?>
                                    <?= $this->Form->end() ?>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                    <p class="pull-right">
                        Publié le
                        <?= $article->date_publish ?>
                    </p>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>
<script>
    $(document).ready(function () {
        $("div.comments").css('cursor', 'Pointer');
        $('div.comments').bind('click', function () {
            var currentId = $(this).attr('id');
            $('#commentaire-' + currentId + '').toggle('slow');
            // $(this).attr('id');  gets the id of a clicked link that has a class of menu
        });
        $("div.img").hover(function () {
            var currentId = $(this).attr('id');
            $(currentId).effect("size", {
                to: {width: 400, height: 400}
            }, 1000);
        });
    });
</script>