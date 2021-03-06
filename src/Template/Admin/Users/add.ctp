<?= $this->Html->link('Accueil',['controller' => 'Pages','action' => '/','prefix' => false]) ?> /
<?= $this->Html->link($this->request->params['controller'],['action' => 'index']) ?> /
<div class="profile">
    <div class="tab-pane" id="tab_1_3">
        <div class="row profile-account">
            <div class="col-md-12">
                <div class="tab-content">
                    <div id="tab_1-1" class="tab-pane active">
                        <?= $this->Form->create($user,['enctype' => 'multipart/form-data']) ?>
                        <fieldset>
                            <legend><?= __('Nouvel Utilisateur') ?></legend>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="label-control">Rôle : </label>
                                    <?= $this->Form->input('role_id', ['options' => $roles, 'label'=>false, 'class'=>'form-control']); ?>
                                </div>
                                <div class="form-group">
                                    <label class="label-control">Pseudo : </label>
                                    <?= $this->Form->input('username',['label'=>false, 'class'=>'form-control']); ?>
                                </div>
                                <div class="form-group">
                                    <label class="label-control">Mot de passe : </label>
                                    <?= $this->Form->input('password',['label'=>false, 'class'=>'form-control']); ?>
                                </div>
                                <div class="form-group">
                                    <label class="label-control">Email : </label>
                                    <?= $this->Form->input('email',['label'=>false, 'class'=>'form-control']); ?>
                                </div>
                                <div class="form-group">
                                    <label class="label-control">Avatar: </label>
                                    <?= $this->Form->input('avatar_url',['label'=>false,'type' => 'file']); ?>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="label-control">Nom : </label>
                                    <?= $this->Form->input('lastname',['label'=>false, 'class'=>'form-control']); ?>
                                </div>
                                <div class="form-group">
                                    <label class="label-control">Prénom :
                                    </label><?= $this->Form->input('firstname',['label'=>false, 'class'=>'form-control']); ?>
                                </div>
                                <div class="form-group">
                                    <label class="label-control">Date de naissance : </label>
                                    <?= $this->Form->input('birthday', ['type' => 'text','label'=>false, 'class'=>'form-control', 'id' => 'datepicker']); ?>
                                </div>
                            </div>
                        </fieldset>
                        <?= $this->Form->button(__('Submit')) ?>
                        <?= $this->Form->end() ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->Html->script('jquery.datetimepicker.full.min.js') ?>
<script>
    $('#datepicker').datetimepicker({
        timepicker:false,
        format: "Y/m/d"
    });
</script>

