<?php
App::uses('AppController', 'Controller');
/**
* Users Controller
*
* @property User $User
* @property PaginatorComponent $Paginator
*/
class UsersController extends AppController
{

    /**
    * Components
    *
    * @var array
    */
    public $components = array('Paginator','Flash','Search.Prg');

    /**
    * index method
    *
    * @return void
    */
    public function index()
    {
        $this->User->recursive = 0;
        $this->set('users', $this->Paginator->paginate());
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
        if (!$this->User->exists($id)) {
            throw new NotFoundException(__('Invalid user'));
        }
        $options = array('conditions' => array('User.' . $this->User->primaryKey => $id));
        $this->set('user', $this->User->find('first', $options));
    }

    /**
    * add method
    *
    * @return void
    */
    public function add()
    {
        if ($this->request->is('post')) {
            $this->User->create();
            if ($this->User->save($this->request->data)) {
                $this->Flash->success(__('成功しました'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Flash->error(__('ユーザーを保存できませんでした。もう一度やり直してください。'));
            }
        }
        $groups = $this->User->Group->find('list');
        $this->set(compact('groups'));
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
        if (!$this->User->exists($id)) {
            throw new NotFoundException(__('Invalid user'));
        }
        if ($this->request->is(array('post', 'put'))) {
            if ($this->User->save($this->request->data)) {
                $this->Flash->success(__('The user has been saved.'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Flash->error(__('The user could not be saved. Please, try again.'));
            }
        } else {
            $options = array('conditions' => array('User.' . $this->User->primaryKey => $id));
            $this->request->data = $this->User->find('first', $options);
        }
        $groups = $this->User->Group->find('list');
        $this->set(compact('groups'));
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
        $this->User->id = $id;
        if (!$this->User->exists()) {
            throw new NotFoundException(__('Invalid user'));
        }
        $this->request->allowMethod('post', 'delete');
        if ($this->User->delete()) {
            $this->Flash->success(__('ユーザーは削除されました。'));
        } else {
            $this->Flash->error(__('ユーザーを削除できませんでした。やり直してください。'));
        }
        return $this->redirect(array('action' => 'index'));
    }

    public function beforeFilter()
    {
        parent::beforeFilter();
        $this->Auth->allow('add', 'logout', 'initDB', 'index', 'view', 'data', 'edit');
    }

    public function login()
    {
        if ($this->request->is('post')) {
            if ($this->Auth->login()) {
                return $this->redirect($this->Auth->redirect());
            }
            $this->Session->setFlash(__('Your username or password was incorrect.'));
        }
    }
    public function logout()
    {
        $this->Session->setFlash('bay');
        $this->redirect($this->Auth->logout());
    }

    public function initDB()
    {
        $group = $this->User->Group;
        $group->id = 1;
        $this->Acl->allow($group, 'controllers');
        $group->id = 2;
        $this->Acl->deny($group, 'controllers');
        $this->Acl->allow($group, 'controllers/Posts');
        $this->Acl->allow($group, 'controllers/Widgets');
        $group->id = 3;
        $this->Acl->deny($group, 'controllers');
        $this->Acl->allow($group, 'controllers/Posts/add');
        $this->Acl->allow($group, 'controllers/Posts/edit');
        $this->Acl->allow($group, 'controllers/Widgets/add');
        $this->Acl->allow($group, 'controllers/Widgets/edit');
        echo "all done";
        exit;
    }
}
