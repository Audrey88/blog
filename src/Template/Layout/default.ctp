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
</head>
<body>
<header>
    <nav id="menu">
        <div class="navbar navbar-default">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                            data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand <?php if ($this->request->here == '/'): ?>active <?php endif; ?>" href="/">Accueil</a>
                </div>
                <div class="collapse navbar-collapse ribbon" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav">
                        <li><?php $Ses = $this->request->session()->read('Auth');
                        if (isset($Ses)): ?>
                            <a id="connexion" href="<?= $this->Url->build(['controller' => 'users', 'action' => 'view', $this->request->session()->read('Auth')['User']['id'], 'prefix' => 'admin']) ?>">Mon compte</a>
                        </li>
                        <li>
                            <a id="connexion" href="<?= $this->Url->build(['controller' => 'articles', 'action' => 'index', 'prefix' => 'admin']) ?>">Mes articles</a>
                        </li>
                        <?php else: ?>
                        <a id="connexion" href="./utilisateur/connexion">Connexion</a>
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
