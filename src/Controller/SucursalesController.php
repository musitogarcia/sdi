<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Sucursales Controller
 *
 * @property \App\Model\Table\SucursalesTable $Sucursales
 * @method \App\Model\Entity\Sucursale[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class SucursalesController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $sucursales = $this->paginate($this->Sucursales);

        $this->set(compact('sucursales'));
    }

    /**
     * View method
     *
     * @param string|null $id Sucursale id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $sucursale = $this->Sucursales->get($id, [
            'contain' => [],
        ]);

        $this->set(compact('sucursale'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $sucursale = $this->Sucursales->newEmptyEntity();
        if ($this->request->is('post')) {
            $sucursale = $this->Sucursales->patchEntity($sucursale, $this->request->getData());
            if ($this->Sucursales->save($sucursale)) {
                $this->Flash->success(__('The sucursale has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The sucursale could not be saved. Please, try again.'));
        }
        $this->set(compact('sucursale'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Sucursale id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $sucursale = $this->Sucursales->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $sucursale = $this->Sucursales->patchEntity($sucursale, $this->request->getData());
            if ($this->Sucursales->save($sucursale)) {
                $this->Flash->success(__('The sucursale has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The sucursale could not be saved. Please, try again.'));
        }
        $this->set(compact('sucursale'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Sucursale id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $sucursale = $this->Sucursales->get($id);
        if ($this->Sucursales->delete($sucursale)) {
            $this->Flash->success(__('The sucursale has been deleted.'));
        } else {
            $this->Flash->error(__('The sucursale could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
