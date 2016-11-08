<?= $this->Html->css('bootstrap-fileinput.css') ?>
<?= $this->Html->script('bootstrap-fileinput.js') ?>
<?= $this->Form->create($user, ['enctype' => 'multipart/form-data']) ?>
<fieldset>
    <legend><?= __('Editer son profil') ?></legend>
    <div class="col-md-6">
        <div class="form-group">
            <label class="label-control">Rôle: </label>
            <?= $this->Form->input('role_id', ['options' => $roles, 'label' => false, 'class' => 'form-control']); ?>
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
            <label class="label-control">Changer avatar :</label>
        </div>
            <div class="fileinput fileinput-new" data-provides="fileinput">
                <div class="fileinput-new thumbnail" style="width: 300px; height: 300px;">
                </div>
                <div class="fileinput-preview fileinput-exists thumbnail"
                     style="max-width: 300px; max-height: 300px;"></div>
                <div>
                    <span class="btn default btn-file">
                      <span class="fileinput-new btn btn-primary"> Selectionner une image </span>
                      <span class="fileinput-exists btn btn-primary"> Modifier </span>
                      <input type="file" name="avatar_url">
                    </span>
                    <a href="javascript:;" class="btn btn-danger fileinput-exists"
                       data-dismiss="fileinput"> Retirer </a>
                </div>
            </div>

        <br>
    </div>
</fieldset> <?= $this->Form->button('Envoyer', ['class' => 'btn green']) ?>
<?= $this->Form->end() ?>
