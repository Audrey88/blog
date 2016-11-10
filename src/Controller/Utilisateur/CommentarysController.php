<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Commentarys Controller
 *
 * @property \App\Model\Table\CommentarysTable $Commentarys
 */
class CommentarysController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Users', 'Articles']
        ];
        $commentarys = $this->paginate($this->Commentarys);

        $this->set(compact('commentarys'));
        $this->set('_serialize', ['commentarys']);
    }

    /**
     * View method
     *
     * @param string|null $id Commentary id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $commentary = $this->Commentarys->get($id, [
            'contain' => ['Users', 'Articles']
        ]);

        $this->set('commentary', $commentary);
        $this->set('_serialize', ['commentary']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $commentary = $this->Commentarys->newEntity();
        if ($this->request->is('post')) {
            $commentary = $this->Commentarys->patchEntity($commentary, $this->request->data);
            if ($this->Commentarys->save($commentary)) {
                $this->Flash->success(__('The commentary has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The commentary could not be saved. Please, try again.'));
            }
        }
        $users = $this->Commentarys->Users->find('list', ['limit' => 200]);
        $articles = $this->Commentarys->Articles->find('list', ['limit' => 200]);
        $this->set(compact('commentary', 'users', 'articles'));
        $this->set('_serialize', ['commentary']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Commentary id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $commentary = $this->Commentarys->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $commentary = $this->Commentarys->patchEntity($commentary, $this->request->data);
            if ($this->Commentarys->save($commentary)) {
                $this->Flash->success(__('The commentary has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The commentary could not be saved. Please, try again.'));
            }
        }
        $users = $this->Commentarys->Users->find('list', ['limit' => 200]);
        $articles = $this->Commentarys->Articles->find('list', ['limit' => 200]);
        $this->set(compact('commentary', 'users', 'articles'));
        $this->set('_serialize', ['commentary']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Commentary id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $commentary = $this->Commentarys->get($id);
        if ($this->Commentarys->delete($commentary)) {
            $this->Flash->success(__('The commentary has been deleted.'));
        } else {
            $this->Flash->error(__('The commentary could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
