<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\I18n\Time;
/**
 * Articles Controller
 *
 * @property \App\Model\Table\ArticlesTable $Articles
 */
class ArticlesController extends AppController
{
    public function initialize()
    {
        parent::initialize();
        $this->Auth->allow(['index', 'view']);
    }
    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index($id =null)
    {
        $this->viewBuilder()->layout('front');
        $this->paginate = [
            'contain' => ['Categories', 'Users', 'Commentarys']
        ];
        $this->loadModel('Users');

        $users = $this->Users->find('all')
            ->where(['role_id'=>1]);
        $utilisateur = $this->Users->find('all')
            ->where(['role_id'=>2])
            ->order('id DESC')
            ->Limit(5);

        $articles = $this->paginate($this->Articles);
        if (isset($id)=== false) {
            $artPublished = $this->Articles->find('all')
                ->contain(['Categories', 'Users', 'Commentarys.Users'])
                ->where(['publish'=> 1])
                ->order(['date_publish DESC']);
        } else {
            $artPublished = $this->Articles->find('all')
                ->contain(['Categories', 'Users', 'Commentarys.Users'])
                ->where(['publish' => 1])
                ->andWhere(['categorie_id' => $id])
                ->order(['date_publish DESC']);
        }

        $this->loadModel('Categories');
        $categories = $this->Categories->find('all');

        $this->loadModel('Commentarys');
        $commentary = $this->Commentarys->newEntity();
        $this->set(compact('articles', 'artPublished', 'categories', 'commentary','users', 'utilisateur'));
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
        $this->viewBuilder()->layout('front');
        $article = $this->Articles->get($id, [
            'contain' => ['Categories', 'Users', 'Commentarys.Users']
        ]);
        $this->loadModel('Commentarys');
        $commentary = $this->Commentarys->newEntity();

        $this->set('article', $article);
        $this->set(compact('article','commentary'));
        $this->set('_serialize', ['article']);
    }
}
