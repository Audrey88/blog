<?php
namespace App\Controller;

use App\Controller\AppController;
/**
 * Users Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 */
class UsersController extends AppController
{
    public function initialize()
    {
        parent::initialize();
        $this->Auth->allow(['add']);
    }
    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $user = $this->Users->newEntity();
        if ($this->request->is('post')) {
            $user = $this->Users->patchEntity($user, $this->request->data);
            if ($this->Users->save($user)) {
                $picture = $this->Upload->getPicture($this->request->data['avatar_url'],'user',$user->id, 300, 300, false);
                $this->request->data['avatar'] = $picture;
                $user = $this->Users->patchEntity($user, $this->request->data);
                $this->Users->save($user);
                $this->Flash->success(__('The user has been saved.'));
               
            } else {
                $this->Flash->error(__('The user could not be saved. Please, try again.'));
            }
        }
        $roles = $this->Users->Roles->find('list', ['limit' => 200]);
        $articles = $this->Users->Articles->find('list', ['limit' => 200]);
        $this->set(compact('user', 'roles', 'articles'));
        $this->set('_serialize', ['user']);
    }
}
