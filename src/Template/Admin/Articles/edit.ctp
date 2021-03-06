
<?= $this->Html->css('bootstrap-fileinput.css') ?>
<?= $this->Html->script('bootstrap-fileinput.js') ?>
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-info">
            <div class="panel-heading">Editer un article :
            </div>
            <div class="panel-body">
                <?= $this->Form->create($article, ['enctype' => 'multipart/form-data']) ?>
                <fieldset>
                    <div class="col-md-12">
                        <div class="form-group col-sm-6">
                            <label class="label-control">Titre</label>
                            <?= $this->Form->input('titre', ['class' => 'form-control', 'label' => false]); ?>
                        </div>
                        <div class="form-group col-sm-6">
                            <label class="label-control">Catégories</label>
                            <?= $this->Form->input('categorie_id', ['options' => $categories, 'class' => 'form-control', 'label' => false]); ?>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group col-sm-6">
                            <label class="label-control">Descripion de l'article</label>
                            <?= $this->Form->input('description', ['type' => 'textarea', 'class' => 'form-control', 'label' => false]); ?>
                        </div>
                        <div class="col-md-6">
                            <div class="fileinput fileinput-new" data-provides="fileinput">
                                <div class="fileinput-new thumbnail" style="width: 400px; height: 200px;">
                                </div>
                                <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 300px; max-height: 300px;"></div>
                                <div>
                    <span class="btn default btn-file">
                      <span class="fileinput-new btn btn-primary"> Selectionner une image </span>
                      <span class="fileinput-exists btn btn-primary"> Modifier </span>
                      <input type="file" name="picture">
                    </span>
                                    <a href="javascript:;" class="btn btn-danger fileinput-exists" data-dismiss="fileinput"> Retirer </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </fieldset>
                <?= $this->Form->input('publish'); ?>
                <?= $this->Form->button('Ajouter',['class'=>'btn btn-primary btn-lg center-block']) ?>
                <?= $this->Form->end() ?>
            </div>
        </div>
    </div>
</div>

