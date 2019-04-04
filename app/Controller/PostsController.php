<?php
App::uses('AppController', 'Controller', 'Image');
/**
* Posts Controller
*
* @property Post $Post
* @property PaginatorComponent $Paginator
*/
class PostsController extends AppController
{
    /**
    * Components
    *
    * @var array
    */
    public $components = array('Paginator','Flash','Search.Prg');
    //検索の条件の指定
    public $presetVars = array(
        array('field' => 'title', 'type' => 'value'),
        array('field' => 'categoryname', 'type' => 'value'),
        array('field' => 'tagname', 'type' => 'value'),
    );
    /**
    * index method
    *
    * @return void
    */
    public function index()
    {
        $this->set('list', $this->Post->Category->find('list', array('fields'=>array('name','name'))));
        $this->set('tags', $this->Post->Tag->find('list', array('fields'=>array('name','name'))));
        $this->Prg->commonProcess();
        $this->paginate =array('conditions' => $this->Post->parseCriteria($this->passedArgs),);
        $this->set('posts', $this->Paginator->paginate());
    }
    /**
    * view method
    *
    * @throws NotFoundException
    * @param string $id
    * @return void
    */
    public function view($id = null)
    {
        if (!$id) {
            throw new NotFoundException(__('Invalid post'));
        }
        $post = $this->Post->findById($id);
        if (!$post) {
            throw new NotFoundException(__('Invalid post'));
        }
        //表示させる記事のデータを変数に格納
        $this->set('post', $post);
        //閲覧中のユーザーのID
        $user = $this->Auth->user('id');
        $this->set('user', $user);
        //categoriesテーブルから種別テーブルリストを取得する
        $this->set('list', $this->Post->Category->find('list', array('fields'=>array('id','name'))));
        //tagsテーブルからリストを取得する
        $this->set('tag', $this->Post->Tag->find('list'));
    }

    /**
    * add method
    *
    * @return void
    */
    public function add()
    {
        $this->set('users', $this->Post->User->find('list', array('fields'=>array('id','username'))));
        //カテゴリー取得
        $this->set('list', $this->Post->Category->find('list', array('fields'=>array('id','name'))));
        //タグ取得
        $this->set('tag', $this->Post->Tag->find('list', array('fields'=>array('id','name'))));
        if ($this->request->is('post')) {
            //Added this line
            $this->request->data['Post']['user_id'] = $this->Auth->user('id');
            if ($this->Post->saveall($this->request->data)) {
                $this->Flash->success(__('Your post has been saved.'));
                return $this->redirect(array('action' => 'index'));
            }
        }
    }
    /**
    * edit method
    *
    * @throws NotFoundException
    * @param string $id
    * @return void
    */
    public function edit($id = null)
    {
        if (!$id) {
            throw new NotFoundException(__('Invalid post'));
        }
        $post = $this->Post->findById($id);
        if (!$post) {
            throw new NotFoundException(__('Invalid post'));
        }
        if (empty($this->request->data)) {
            $this->request->data = $post;
        } elseif ($this->request->is(array('post', 'put'))) {
            $this->request->data['Post']['user_id'] = $this->Auth->user('id');
            $this->Post->id = $id;
            //トランザクション
            $this->loadModel('TransactionManager');
            //トランザクション開始
            $transaction = $this->TransactionManager->begin();
            try {
                //削除欄にチェックがあれば削除処理
                if (!empty($this->request->data['Post']['Attachment'])) {
                    $array = $this->request->data['Post']['Attachment'];
                    foreach ($array as $id) {
                        $this->Post->Attachment->delete($id);
                    }
                }
                //全ての情報をセーブ
                if ($this->Post->saveall($this->request->data)) {
                    $this->request->data['Post']['user_id'] = $this->Auth->user('id');
                    $this->Flash->success(__('Your post has been updated.'));
                    return $this->redirect(array('action' => 'index'));
                }
            } catch (Exception $e) {
                $this->TransactionManager->rollback($transaction);
                $this->Flash->error(__('Unable to update your post.'));
            }
        }
        //表示させる記事のデータを変数に格納
        $this->set('list', $this->Post->Category->find('list'));
        $this->set('tag', $this->Post->Tag->find('list'));
        $this->set('attachment', $post['Attachment']);
        $this->set('photo', $this->Post->Attachment->find('list', array(
            'conditions' => array(
                'Attachment.post_id' => $this->request->data['Post']['id'],
                'deleted' => 0
            )
        )));
    }
    /**
    * delete method
    *
    * @throws NotFoundException
    * @param string $id
    * @return void
    */
    public function delete($id = null)
    {
        $this->Post->id = $id;
        if (!$this->Post->exists()) {
            throw new NotFoundException(__('Invalid post'));
        }
        $this->request->allowMethod('post', 'delete');
        if ($this->Post->delete()) {
            $this->Flash->success(__('投稿が保存されました。'));
        } else {
            $this->Flash->error(__('投稿を削除できませんでした。やり直してください。'));
        }
        return $this->redirect(array('action' => 'index'));
    }

    public function beforeFilter()
    {
        parent::beforeFilter();
        $this->Auth->allow('index', 'view', 'add', 'edit', "delete", 'fileup', 'upload');
    }
}
