<div class="row">
    <div class="col-md-3">
        <div class="panel panel-info">
            <div class="panel-heading">
                <h3>Catégories</h3>
            </div>
            <div class="panel-body">
                <?php foreach ($categories as $cat): ?>
                <p><?= $this->Html->Link($cat->name,['action'=>'index', $cat->id])?></p>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
    <div class="articles index col-md-9 columns content">
        <?php foreach ($artPublished as $article): ?>
            <div class="panel panel-info text-center">
                <div class="panel-heading">
                    <h3><?= $article->titre ?></h3>
                </div>
                <div class="panel-body">
                    <div class="col-md-6 img" id="<?= $article->id ?>">
                        <?= $this->Html->image('/img/article/800x800/' . $article->picture_url, ['class' => 'img-responsive center-block']) ?>
                    </div>
                    <div class="col-md-6">
                        <h4>Catégorie:</h4>
                        <p><?= $article->has('category') ? $article->category->name : '' ?></p>
                        <h4>description :</h4>
                        <p class="big"> <?= $this->Text->truncate (
                                $article->description,
                                150, [
                                    'ellipsis'=> '...',
                                    'exact'=> false
                                ]
                            ) ?>
                        </p>
                        <button type="button" class="btn btn-md glyphicon glyphicon-plus" data-toggle="modal" data-target="#myModal-<?=$article->id?>"></button>

                        <!-- Modal -->
                        <div id="myModal-<?= $article->id?>" class="modal fade" role="dialog">
                            <div class="modal-dialog">
                                <!-- Modal content-->
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        <h2 class="modal-title"><?= $article->titre?></h2>
                                    </div>
                                    <div class="modal-body">
                                        <p> <?= $this->Html->image('/img/article/100x100/' . $article->picture_url, ['class' => 'img-responsive center-block']) ?></p>
                                        <p><?= $article->description ?></p>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-md" data-dismiss="modal">Close</button>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="related text-left col-md-12">
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
                        <div id="commentaire-<?= $article->id ?>" style="display: none"
                             class="text-left">
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
    });
</script>