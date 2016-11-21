<?= $this->Html->css('bootstrap-fileinput.css') ?>
<?= $this->Html->script('bootstrap-fileinput.js') ?>
<?= $this->Form->create($user, ['enctype' => 'multipart/form-data']) ?>
<fieldset>
    <legend><?= __('Editer son profil') ?></legend>
    <div class="col-md-6">
        <div class="form-group">
            <label class="label-control">Rôle: </label>
            <?= $this->Form->hidden('role_id', ['options' => $roles, 'label' => false, 'class' => 'form-control']); ?>
        </div>
        <div class="form-group">
            <label class="label-control">Pseudo: </label>
            <?= $this->Form->input('username', ['label' => false, 'class' => 'form-control']); ?>
        </div>
        <div class="form-group">
            <label class="label-control">Mot depasse : </label>
            <?= $this->Form->input('password', ['label' => false, 'class' => 'form-control']); ?>
        </div>
        <div class="form-group">
            <label class="label-control">Email: </label>
            <?= $this->Form->input('email', ['label' => false, 'class' => 'form-control']); ?>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label class="label-control">Prénom : </label>
            <?= $this->Form->input('firstname', ['label' => false, 'class' => 'form-control']); ?>
        </div>
        <div class="form-group">
            <label class="label-control">Nom : </label>
            <?= $this->Form->input('lastname', ['label' => false, 'class' => 'form-control']); ?>
        </div>
        <div class="form-group">
            <label class="label-control">Date de naissance
                : </label>
            <?= $this->Form->input('birthday', ['type' => 'date', 'label' => false, 'class' => 'form-control']); ?>
        </div>
        <div class="form-group">
            <label class="label-control">Avatar: </label>
            <?= $this->Form->input('avatar_url',['label'=>false,'type' => 'file']); ?>
        </div>
        <br>
    </div>
</fieldset> <?= $this->Form->button('Envoyer', ['class' => 'btn green']) ?>
<?= $this->Form->end() ?>
