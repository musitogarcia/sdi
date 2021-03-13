<?php

declare(strict_types=1);

namespace App\Controller;

use Authentication\Authenticator\ResultInterface;
use App\Model\Entity\Visita;
use Cake\ORM\Locator\LocatorAwareTrait;

/**
 * Users Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 * @method \App\Model\Entity\User[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class UsersController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->set('tab', 'usuarios');

        $users = $this->paginate($this->Users);

        $this->set(compact('users'));
    }

    /**
     * View method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => ['Roles'],
        ]);

        $this->set(compact('user'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $user = $this->Users->newEmptyEntity();
        if ($this->request->is('post')) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $this->set(compact('user'));
    }

    /**
     * Edit method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $this->set(compact('user'));
    }

    /**
     * Delete method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $user = $this->Users->get($id);
        if ($this->Users->delete($user)) {
            $this->Flash->success(__('The user has been deleted.'));
        } else {
            $this->Flash->error(__('The user could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function beforeFilter(\Cake\Event\EventInterface $event)
    {
        parent::beforeFilter($event);
        $this->Authentication->addUnauthenticatedActions(['login']);
    }

    public function login()
    {
        $this->request->allowMethod(['get', 'post']);
        $result = $this->Authentication->getResult();
        $estado = $result->getStatus();
        if ($estado === ResultInterface::SUCCESS) {
            if ($this->Authentication->getIdentity()->get('access') == 1) {
                $output = 1;
                if (!empty($this->request->getData())) {
                    $this->registrarVisita($this->request->getData()['username']);
                } else {
                    $redirect = $this->request->getQuery('redirect', '/');
                    return $this->redirect($redirect);
                }
            } else {
                $this->Authentication->logout();
                $output = 4;
            }
        } else if ($estado === ResultInterface::FAILURE_IDENTITY_NOT_FOUND || $estado === ResultInterface::FAILURE_CREDENTIALS_INVALID) {
            if (isset($this->request->getData()['username'])) {
                $users = $this->Users->find('all', ['conditions' => ['username' => $this->request->getData()['username']]]);
                if (empty($users->first())) {
                    $output = 2;
                } else {
                    $output = 3;
                }
            } else {
                $output = 3;
            }
        } else {
            $output = 5;
        }

        if (!empty($this->request->getData())) {
            $this->set(array(
                'output' => $output,
                '_serialize' => 'output'
            ));
            $this->RequestHandler->renderAs($this, 'json');
        }
    }

    public function registrarVisita($usuario)
    {
        $query = $this->Users->find('all', ['conditions' => ['username' => $usuario]]);
        $row = $query->first();

        $tablaVisitas = $this->getTableLocator()->get('Visitas');
        $visita = $tablaVisitas->newEmptyEntity();

        $visita->fecha = date('Y-m-d H:i:s');
        $visita->user_id = $row->id;

        if ($tablaVisitas->save($visita)) {
            $visita->id;
        }
    }

    public function logout()
    {
        $result = $this->Authentication->getResult();

        if ($result->isValid()) {
            $this->Authentication->logout();
            return $this->redirect(['controller' => 'Users', 'action' => 'login']);
        }
    }
}
