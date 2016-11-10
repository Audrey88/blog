<?php echo $this->Flash->render('auth'); ?>
<?php echo $this->Form->create('User'); ?>
    <!-- BEGIN LOGIN FORM -->
<div class="panel panel-info">
    <div class="panel-heading">
        <p>Veuillez entrer votre pseudo et votre mots-de-passe</p>
    </div>
    <div class="panel-body">
        <form class="login-form" method="post">
            <div class="form-group">
                <!--ie8, ie9 does not support html5 placeholder, so we just show field title for that-->
                <label class="control-label visible-ie8 visible-ie9">Username</label>
                <?= $this->Form->input('username',['class' => 'form-control form-control-solid placeholder-no-fix', 'label' => false , 'placeholder' => 'Nom d\'utilisateur']); ?> </div>
            <div class="form-group">
                <label class="control-label visible-ie8 visible-ie9">Password</label>
                <?= $this->Form->input('password',['class' => 'form-control form-control-solid placeholder-no-fix', 'label' => false , 'placeholder' => 'Mot de passe']); ?></div>
            <div>
                <?= $this->Form->button('Connexion', ['class' => 'btn btn-info btn-block uppercase']); ?>
                <?= $this->Form->end() ?>
            </div>
        </form>
    </div>
</div>
