<?= $this->Html->css('bootstrap-fileinput.css') ?>
<?= $this->Html->script('bootstrap-fileinput.js') ?>
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-info">
            <div class="panel-heading">Ajouter un article :
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
                            <label class="label-control">Photo:</label>
                            <?php echo $this->Form->input('picture',['type'=>'file','class' => 'form-control', 'label'=>false]); ?>
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

