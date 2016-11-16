<?php
namespace App\Controller\Admin;

use App\Controller\AppController;

/**
 * Commentarys Controller
 *
 * @property \App\Model\Table\CommentarysTable $Commentarys
 */
class CommentarysController extends AppController
{
    public function index()
    {
        $this->paginate = [
            'contain' => ['Users', 'Articles'],
            'limit' => 10
        ];
        $id = $this->request->session()->read('Auth')['User']['id'];
        $commentarys = $this->paginate($this->Commentarys->find('all')->where(['Commentarys.user_id'=> $id]));

        $this->set(compact('commentarys'));
        $this->set('_serialize', ['commentarys']);
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
