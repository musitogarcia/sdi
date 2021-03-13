<?php

declare(strict_types=1);

namespace App\Controller;

use Cake\ORM\TableRegistry;

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
        $this->set('tab', 'bandeja');
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
        $registro = $this->Registros->newEmptyEntity();
        if ($this->request->is('post')) {
            $registro = $this->Registros->patchEntity($registro, $this->request->getData());
            $output = 0;
            if ($this->Registros->save($registro)) {
                $output = 1;
            }
        }

        if (!empty($this->request->getData())) {
            $this->set(array(
                'output' => $output,
                '_serialize' => 'output'
            ));
            $this->RequestHandler->renderAs($this, 'json');
        } else {
            $this->set('tab', 'registro');
            $categorias = TableRegistry::getTableLocator()->get('Categorias');
            $sucursales = TableRegistry::getTableLocator()->get('Sucursales');
            $opcionesCategorias = $categorias->find('all')->combine('id', 'descripcion');
            $opcionesSucursales = $sucursales->find('all')->combine('id', 'ubicacion');
            $this->set(compact('opcionesCategorias'));
            $this->set(compact('opcionesSucursales'));
            $this->set(compact('registro'));
        }
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
            $output = 0;
            if ($this->Registros->save($registro)) {
                $output = 1;
            }
        }

        if (!empty($this->request->getData())) {
            $this->set(array(
                'output' => $output,
                '_serialize' => 'output'
            ));
            $this->RequestHandler->renderAs($this, 'json');
        } else {
            $this->set('tab', 'registro');
            $estados = TableRegistry::getTableLocator()->get('Estados');
            $opcionesEstados = $estados->find('all')->combine('id', 'descripcion');
            $this->set(compact('opcionesEstados'));
            $this->set(compact('registro'));
        }
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
