<?= $this->Html->link('Accueil', ['controller' => 'Pages', 'action' => '/', 'prefix' => false]) ?> /
<?= $this->Html->link($this->request->params['controller'], ['action' => 'index']) ?> /
<?= $user->firstname . $user->lastname ?>
<div class="page-title">
    <h1><?php echo $user->firstname ?> <?= $user->lastname ?>
        <small><?= $user->role->name ?></small>
    </h1>
</div>
<div class="page-content">
    <div class="container">
        <div class="page-content-inner">
            <div class="profile">
                <div class="row">
                    <div class="col-md-3">
                        <ul class="list-unstyled">
                            <li>
                                <?= $this->Html->image('/img/user/'.$user->avatar, ['class' => 'img-responsive']) ?>
                            </li>
                        </ul>
                    </div>
                    <div class="col-md-9">
                        <div class="row">
                            <div class="col-md-8 profile-info">
                                <h1 class="uppercase"><?= $user->firstname ?> <?= $user->lastname ?></h1>
                                <ul class="list-inline">
                                    <li>
                                        <i class="glyphicon glyphicon-gift text-primary"></i> <?= $user->birthday ?>
                                    </li>
                                    <li>
                                        <i class="glyphicon glyphicon-envelope text-primary"></i> <?= $user->email ?>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <h2>Mes articles</h2>
                    </div>
                    <div class="col-md-6">
                        <h3>Mes articles publiés</h3>

                    </div>
                    <div class="col-md-6">
                        <h3>Mes articles sauvegardés</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>