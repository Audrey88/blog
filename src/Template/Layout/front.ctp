<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <meta content="Simplon Epinal numérique dev web développeur developper internet école formation"
          name="description"/>
    <meta content="" name="Simplon"/>

    <title>Blog d'Audrey</title>
    <?= $this->Html->meta('icon') ?>

    <?= $this->Html->css('bootstrap.min.css') ?>
    <?= $this->Html->css('front.css') ?>
    <?= $this->Html->css('jquery.datetimepicker.css') ?>

    <?= $this->Html->script('jquery.js') ?>
    <?= $this->Html->script('bootstrap.min.js') ?>

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>

</head>
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
                    <a class="navbar-brand <?php if ($this->request->here == '/'): ?>active <?php endif; ?>" href="/">Accueil</a>
                </div>
                <div class="collapse navbar-collapse ribbon" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav">
                        <li>
                            <?php
                            if (isset($this->request->session()->read('Auth')['User']['id'])): ?>
                            <?php if ($this->request->session()->read('Auth')['User']['role_id']==1): ?>
                            <a href="<?= $this->Url->build(['controller' => 'users', 'action' => 'view', $this->request->session()->read('Auth')['User']['id'], 'prefix' => 'admin']) ?>">Mon compte</a>
                            <?php else: ?>
                            <a href="<?= $this->Url->build(['controller' => 'users', 'action' => 'view', $this->request->session()->read('Auth')['User']['id'], 'prefix' => 'utilisateur']) ?>">Mon compte</a>
                            <?php endif; ?>
                        </li>
                        <li class="right-align"><a
                                href="<?= $this->Url->build(['controller' => 'users', 'action' => 'logout']) ?>">se
                                déconnecter</a>
                        </li>
                        <?php else: ?>
                            <a id="connexion"
                               href="<?= $this->Url->build(['controller' => 'users', 'action' => 'login', 'prefix' => 'utilisateur']) ?>">Connexion</a>
                            </li>
                            <li>
                                <a id="connexion"
                                   href=" <?= $this->Url->build(['controller' => 'users', 'action' => 'add', 'prefix' => false]) ?>">S'inscrire </a>
                            </li>
                        <?php endif; ?>
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