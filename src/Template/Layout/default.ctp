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

$cakeDescription = 'Blog-original';
?>
<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?= $cakeDescription ?>:
        <?= $this->fetch('title') ?>
    </title>
    <?= $this->Html->meta('icon') ?>

    <?= $this->Html->css('bootstrap.min.css') ?>
    <?= $this->Html->css('jquery.datetimepicker.css') ?>

    <?= $this->Html->script('jquery.js') ?>
    <?= $this->Html->script('bootstrap.min.js') ?>

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
    <style>
        button{
            color: #fff;
            background-color: #337ab7;
            border-color: #2e6da4;
        }
        button:hover {
            color: #fff;
            background-color: #286090;
            border-color: #204d74;
    </style>
</head>
<body>
<header>
    <nav id="menu">
        <div class="navbar navbar-inverse">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                            data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="<?= $this->Url->build(['controller' => 'Pages', 'action' => 'display','home', 'prefix' => false]) ?>">Accueil</a>
                </div>
                <div class="collapse navbar-collapse ribbon" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav">
                        <li>
                        <?php
                        // si il y a un utilisateur
                        if (isset($this->request->session()->read('Auth')['User']['id'])): ?>

                        <?php  //si l'utilisateur est admin
                        if ($this->request->session()->read('Auth')['User']['role_id'] ==1) : ?>
                            <a id="connexion" href="<?= $this->Url->build(['controller' => 'users', 'action' => 'view', $this->request->session()->read('Auth')['User']['id'], 'prefix' => 'admin']) ?>">Mon compte</a>
                        </li>
                        <li class="dropdown">
                            <a class="dropdown-toggle" data-toggle="dropdown" id="connexion" href="
                            <?= $this->Url->build(['controller' => 'users', 'action' => 'index', 'prefix' => 'admin']) ?>">
                                Les membres
                                <span class="caret"></span>
                            </a>
                            <ul class="dropdown-menu">
                                <li><a href="<?= $this->Url->build(['controller' => 'users', 'action' => 'add', 'prefix' => 'admin']) ?>">Ajouter un membres</a></li>
                                <li><a href="<?= $this->Url->build(['controller' => 'users', 'action' => 'index', 'prefix' => 'admin']) ?>">Voir les membres</a></li>
                            </ul>
                        <li class="dropdown">
                            <a class="dropdown-toggle" data-toggle="dropdown" id="connexion" href="
                            <?= $this->Url->build(['controller' => 'articles', 'action' => 'index', 'prefix' => 'admin']) ?>">
                                Mes articles
                                <span class="caret"></span>
                            </a>
                            <ul class="dropdown-menu">
                                <li><a href="<?= $this->Url->build(['controller' => 'articles', 'action' => 'add', 'prefix' => 'admin']) ?>">Ajouter un article</a></li>
                                <li><a href="<?= $this->Url->build(['controller' => 'articles', 'action' => 'index', 'prefix' => 'admin']) ?>">Voir mes articles</a></li>
                            </ul>
                        </li>
                        <li><a href="<?= $this->Url->build(['controller' => 'categories', 'action' => 'add', 'prefix' => 'admin']) ?>">Ajouter Catégories</a> </li>
                        <li><a href="<?= $this->Url->build(['controller' => 'commentarys', 'action' => 'index', 'prefix' => 'admin']) ?>">Mes commentaires</a> </li>


                        <?php //  si l'utilisateur est utilisateur
                        else: ?>
                            <a id="connexion" href="<?= $this->Url->build(['controller' => 'users', 'action' => 'view', $this->request->session()->read('Auth')['User']['id'], 'prefix' => 'utilisateur']) ?>">Mon compte</a>
                            </li>
                            <li><a href="<?= $this->Url->build(['controller' => 'articles', 'action' => 'index', 'prefix' => 'utilisateur']) ?>">Les articles</a>
                            </li>
                            <li><a href="<?= $this->Url->build(['controller' => 'commentarys', 'action' => 'index', 'prefix' => 'utilisateur']) ?>">Mes commentaires</a> 
                            </li>
                        <?php endif; ?>
                        <!-- commun au deux -->
                        <li class="right-align"><a href="<?= $this->Url->build(['controller' => 'users', 'action' => 'logout']) ?>">se déconnecter</a> </li>


                        <?php  //si non connecté
                        else: ?>
                        <a id="connexion" href="<?= $this->Url->build(['controller' => 'users', 'action' => 'login', 'prefix' => 'utilisateur']) ?>">Connexion</a>
                            </li>
                        <li>
                            <a id="connexion" href=" <?= $this->Url->build(['controller' => 'users', 'action' => 'add', 'prefix' => false]) ?>">S'inscrire </a>
                        </li>
                        <?php endif;?>
                    </ul>
                </div>
            </div>
        </div>
    </nav>
</header>
    <?= $this->Flash->render() ?>
    <div class="container clearfix">
        <?= $this->fetch('content') ?>
    </div>
    <footer>
    </footer>
    <?= $this->Html->script('jquery.datetimepicker.full.min.js') ?>
</body>
</html>
