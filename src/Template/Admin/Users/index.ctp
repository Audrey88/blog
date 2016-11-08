<div>
    <h2>Les administrateurs et utilisateurs du blog :</h2>
</div>

<table class="table table-striped table-bordered order-column text-center">
    <thead>
    <tr>
        <th><?= $this->Paginator->sort('Pseudo') ?></th>
        <th><?= $this->Paginator->sort('Nom') ?></th>
        <th><?= $this->Paginator->sort('Prénom') ?></th>
        <th><?= $this->Paginator->sort('role_id') ?></th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($users as $user): ?>
        <tr class="odd gradeX">
            <td><?= h($user->username) ?></td>
            <td><?= h($user->lastname) ?></td>
            <td><?= h($user->firstname) ?></td>
            <td><?= $user->has('role') ? $this->Html->link($user->role->name, ['controller' => 'Roles', 'action' => 'view', $user->role->id]) : '' ?></td>
            <td>
                <div class="btn-group">
                    <button class="btn btn-xs btn-primary dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false"> Actions
                        <i class="fa fa-angle-down"></i>
                    </button>
                    <ul class="dropdown-menu pull-left" role="menu">
                        <i class="glyphicon glyphicon-search"></i> <a href="<?= $this->Url->build(['controller' => 'Users', 'action' => 'view', $user->id]); ?>">Profil</a><br><br>
                        <i class="glyphicon glyphicon-pencil"></i> <a href="<?= $this->Url->build(['controller' => 'Users', 'action' => 'edit', $user->id]); ?>">Editer</a><br><br>
                        <i class="glyphicon glyphicon-remove"></i> <a href="<?= $this->Url->build(['controller' => 'Users', 'action' => 'delete', $user->id], ['confirm' => __('Are you sure you want to delete # {0}?', $user->id)]); ?>">Supprimer</a>
                    </ul>
                </div>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>