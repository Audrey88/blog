<?php
namespace App\Controller\Utilisateur;

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
            ->contain(['Categories', 'Users', 'Commentarys.Users'])
            ->where(['publish'=> 1]);

        $this->loadModel('Categories');
        $categories = $this->Categories->find('all');

        $this->loadModel('Commentarys');
        $commentary = $this->Commentarys->newEntity();
        $this->set(compact('articles', 'artPublished', 'categories', 'commentary'));
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
}
