<?php

declare(strict_types=1);

namespace App\Controller;

/**
 * Registros Controller
 *
 * @property \App\Model\Table\RegistrosTable $Registros
 * @method \App\Model\Entity\Registro[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class RegistrosController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        //$this->Authorization->skipAuthorization();
        $registros = $this->paginate($this->Registros);

        $this->set(compact('registros'));
    }

    /**
     * View method
     *
     * @param string|null $id Registro id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $registro = $this->Registros->get($id, [
            'contain' => [],
        ]);

        $this->set(compact('registro'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        //$this->Authorization->skipAuthorization();

        $registro = $this->Registros->newEmptyEntity();
        if ($this->request->is('post')) {
            $registro = $this->Registros->patchEntity($registro, $this->request->getData());
            if ($this->Registros->save($registro)) {
                $this->Flash->success(__('The registro has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The registro could not be saved. Please, try again.'));
        }
        $this->set(compact('registro'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Registro id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $registro = $this->Registros->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $registro = $this->Registros->patchEntity($registro, $this->request->getData());
            if ($this->Registros->save($registro)) {
                $this->Flash->success(__('The registro has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The registro could not be saved. Please, try again.'));
        }
        $this->set(compact('registro'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Registro id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $registro = $this->Registros->get($id);
        if ($this->Registros->delete($registro)) {
            $this->Flash->success(__('The registro has been deleted.'));
        } else {
            $this->Flash->error(__('The registro could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
