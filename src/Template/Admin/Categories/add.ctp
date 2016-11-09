<div class="col-md-12">
    <div class="panel panel-info">
        <div class="panel-heading">
            <h3>Ajouter une catégorie</h3>
        </div>
        <div class="panel-body">
            <?= $this->Form->create($category) ?>
            <fieldset>
                    <div class="form-group col-sm-12">
                        <label class="label-control">Titre</label>
                        <?= $this->Form->input('name', ['label'=> false, 'class'=>'form-control']); ?>

                        <label class="label-control">Descripion</label>
                        <?= $this->Form->input('description', ['type' => 'textarea', 'class' => 'form-control', 'label' => false]); ?>
                    </div>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>