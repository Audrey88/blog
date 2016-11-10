<?php
namespace App\Controller\Admin;

use App\Controller\AppController;
use Cake\I18n\Time;
/**
 * Articles Controller
 *
 * @property \App\Model\Table\ArticlesTable $Articles
 */
class ArticlesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Categories', 'Users', 'Commentarys']
        ];
        $articles = $this->paginate($this->Articles);

        $artPublished = $this->Articles->find('all')
            ->contain(['Categories', 'Users', 'Commentarys'])
            ->where(['publish'=> 1]);

        $artBrouillon =  $this->Articles->find('all')
            ->contain(['Categories', 'Users', 'Commentarys'])
            ->where(['publish'=> 0]);

        $this->set(compact('articles', 'artPublished', 'artBrouillon'));
        $this->set('_serialize', ['articles']);
    }

    /**
     * View method
     *
     * @param string|null $id Article id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $article = $this->Articles->get($id, [
            'contain' => ['Categories', 'Users', 'Commentarys.Users']
        ]);

        $this->set('article', $article);
        $this->set(compact('article'));
        $this->set('_serialize', ['article']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $article = $this->Articles->newEntity();
        $this->request->data['user_id'] = $this->request->session()->read('Auth')['User']['id'];
        $date = Time::now();
        $this->request->data['date_publish'] = $date;
        if ($this->request->is('post')) {
            $article = $this->Articles->patchEntity($article, $this->request->data);
            if ($this->Articles->save($article)) {
                $picture = $this->Upload->getPicture($this->request->data['picture'],'article',$article->id, 400, 200, false);
                $this->request->data['picture_url'] = $picture;
                $article = $this->Articles->patchEntity($article, $this->request->data);
                $this->Articles->save($article);

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The article could not be saved. Please, try again.'));
            }
        }
        $categories = $this->Articles->Categories->find('list', ['limit' => 200]);
        $users = $this->Articles->Users->find('list', ['limit' => 200]);
        $this->set(compact('article', 'categories', 'users'));
        $this->set('_serialize', ['article']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Article id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $article = $this->Articles->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            if(!empty($this->request->data['picture']['name'])) {
                $picture = $this->Upload->getPicture($this->request->data['picture'], 'article', $article->id, 400, 200, false);
                $this->request->data['picture_url'] = $picture;
            }
            $date = Time::now();
            $this->request->data['date_publish'] = $date;
            $article = $this->Articles->patchEntity($article, $this->request->data);
            if ($this->Articles->save($article)) {
                $this->Flash->success(__('The article has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The article could not be saved. Please, try again.'));
            }
        }
        $categories = $this->Articles->Categories->find('list', ['limit' => 200]);
        $users = $this->Articles->Users->find('list', ['limit' => 200]);
        $this->set(compact('article', 'categories', 'users'));
        $this->set('_serialize', ['article']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Article id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $this->loadModel('Commentarys');
        $article = $this->Articles->get($id);
/*        $comment = $this->Commentarys->find('all')
            ->select('article_id')
            ->where(['article_id' => $id])
            ->count();
        '<pre>'.print_r($comment).'</pre>';
        if ($comment >=1 ) {
            $commmentary = $this->Commentarys->find('all')->where(['article_id'=> $id]);
            if ($this->Commentarys->delete($commmentary)) {
                $this->Flash->success(__('The article has been deleted.'));
            }
        }
        exit();*/
            if ($this->Articles->delete($article)) {
                $this->Flash->success(__('The article has been deleted.'));
            } else {
                $this->Flash->error(__('The article could not be deleted. Please, try again.'));
            }
        return $this->redirect(['action' => 'index']);
    }
}
