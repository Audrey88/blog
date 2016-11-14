<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */
use Cake\Cache\Cache;
use Cake\Core\Configure;
use Cake\Core\Plugin;
use Cake\Datasource\ConnectionManager;
use Cake\Error\Debugger;
use Cake\Network\Exception\NotFoundException;

$this->layout = 'front';

if (!Configure::read('debug')):
    throw new NotFoundException('Please replace src/Template/Pages/home.ctp with your own version.');
endif;

$cakeDescription = 'Bienvenue sur le blog de Audrey';
?>
<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?= $cakeDescription ?>
    </title>
    <?= $this->Html->meta('icon') ?>
    <?= $this->Html->css('bootstrap.min.css') ?>
    <?= $this->Html->css('front.css') ?>
</head>
<body class="home">
<div class="page-content">
    <div class="container">
        <div class="page-content-inner">
            <div class="row">
                <div class="col-sm-3 hidden-xs hidden-sm">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="panel panel-info">
                                <div class="panel panel-heading">
                                    Les administrateurs de ce blog :
                                </div>
                                <div class="panel-body text-center">
                                    <?php foreach ($users as $user): ?>
                                        <div class="col-md-12">
                                            <?= $this->Html->image('/img/user/' . $user->avatar, ['class' => 'img-responsive img-circle icon-logged center-block']) ?>
                                        </div>
                                        <h4><?= $user->firstname ?>&nbsp;<?= $user->lastname ?></h4>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                            <br>
                            <div class="panel panel-info">
                                <div class="panel panel-heading">
                                    Les derniers inscrit :
                                </div>
                                <div class="panel-body text-center">
                                    <?php foreach ($utilisateur as $uti): ?>
                                        <h4><?= $uti->firstname ?>&nbsp;<?= $uti->lastname ?></h4>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-9 col-sm-12">
                    <div class="row">
                        <?php foreach ($articles as $article): ?>
                            <div class="panel panel-info text-center">
                                <div class="panel-heading">
                                    <h3><?= $article->titre ?></h3>
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
                                    <div class="related text-left col-md-8">
                                        <div id="<?= $article->id ?>" class="menu">
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
                                                <p>Commentaire
                                                    de <?= $commentarys->user->username ?>
                                                    :
                                                </p>
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
        </div>
    </div>
    <div class="scroll-to-top">
        <i class="icon-arrow-up"></i>
    </div>
</div>
    <?= $this->Html->script('jquery.js') ?>
    <?= $this->Html->script('bootstrap.min.js') ?>
</body>
<script>
    $(document).ready(function () {
        $("div.menu").css('cursor', 'Pointer');
        $('div.menu').bind('click', function () {
            var currentId = $(this).attr('id');
            $('#commentaire-' + currentId + '').toggle('slow');
            // $(this).attr('id');  gets the id of a clicked link that has a class of menu
        });
    });
</script>
</html>
