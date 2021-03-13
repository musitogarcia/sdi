<?php

declare(strict_types=1);

namespace App\Controller;

use App\Model\Entity\Registro;
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
        if ($this->Authentication->getIdentity()->get('role') == 2) {
            $this->set('tab', 'bandeja');
            $registros = $this->Registros->find()
                ->select(
                    [
                        'id' => 'Registros.id',
                        'nombre' => 'Registros.nombre',
                        'categoria' => 'Categorias.descripcion',
                        'sucursal' => 'Sucursales.ubicacion',
                        'id_estado' => 'Registros.id_estado'
                    ]
                )
                ->innerJoinWith('Sucursales')
                ->innerJoinWith('Categorias');
            $registros = $this->paginate($registros);
            $this->set(compact('registros'));
        } else {
            return $this->redirect(['controller' => 'Pages', 'action' => 'display', 'home']);
        }
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
            'contain' => ['Sucursales', 'Estados', 'Categorias'],
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
        if ($this->Authentication->getIdentity()->get('role') == 3) {
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
        } else {
            return $this->redirect(['controller' => 'Pages', 'action' => 'display', 'home']);
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
        if ($this->Authentication->getIdentity()->get('role') == 2) {
            $registro = $this->Registros->get($id, [
                'contain' => ['Sucursales', 'Estados', 'Categorias'],
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
                $estados = TableRegistry::getTableLocator()->get('Estados');
                $opcionesEstados = $estados->find('all')->combine('id', 'descripcion');
                $this->set(compact('opcionesEstados'));
                $this->set(compact('registro'));
            }
        } else {
            return $this->redirect(['controller' => 'Pages', 'action' => 'display', 'home']);
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
        if ($this->Authentication->getIdentity()->get('role') == 2) {
            $this->request->allowMethod(['post', 'delete']);
            $registro = $this->Registros->get($id);
            if ($this->Registros->delete($registro)) {
                $this->Flash->success(__('El registro se ha eliminado.'));
            } else {
                $this->Flash->error(__('El registro no se pudo eliminar.'));
            }

            return $this->redirect(['action' => 'index']);
        } else {
            return $this->redirect(['controller' => 'Pages', 'action' => 'display', 'home']);
        }
    }

    public function exportCsv($fechaInicio = null, $fechaFin = null)
    {
        if (isset($fechaInicio) && isset($fechaFin)) {
            $query = $this->Registros->find()
                ->where([
                    'fecha_registro >=' => Date("Y-m-d H:i:s", strtotime($fechaInicio)),
                    'fecha_registro <' => Date("Y-m-d H:i:s", strtotime($fechaFin))
                ]);
        } else {
            $query = $this->Registros->find();
            $masivo = 1;
        }
        $query->select(
            [
                'id' => 'Registros.id',
                'nombre' => 'Registros.nombre',
                'descripcion' => 'Registros.descripcion',
                'categoria' => 'Categorias.descripcion',
                'sucursal' => 'Sucursales.ubicacion',
                'precio' => 'Registros.precio',
                'fecha_compra' => 'Registros.fecha_compra',
                'estado' => 'Estados.descripcion',
                'comentarios' => 'Registros.comentarios',
                'fecha_registro' => 'Registros.fecha_registro',
                'fecha_modificacion' => 'Registros.fecha_modificacion'
            ]
        )
            ->innerJoinWith('Sucursales')
            ->innerJoinWith('Categorias')
            ->innerJoinWith('Estados');

        $registros = $this->paginate($query);
        $header = [
            'ID', 'Nombre', 'Descripción', 'Categoría', 'Sucursal',
            'Precio', 'Fecha de compra', 'Estado', 'Comentarios', 'Fecha de registro',
            'Fecha de modificación'
        ];

        $this->setResponse($this->getResponse()->withDownload('registro_' . date('Y-m-d_H_i_s') . (isset($masivo) ? '_masivo' : '') . '.csv'));
        $this->set(compact('registros'));
        $this->viewBuilder()
            ->setClassName('CsvView.Csv')
            ->setOptions([
                'serialize' => 'registros',
                'header' => $header
            ]);
    }

    public function reportes()
    {
        $this->set('tab', 'reportes');

        if (!empty($this->request->getData())) {

            $this->exportCsv($this->request->getData()['inicio'], $this->request->getData()['final']);
        }
    }

    public function exportPdf($id = null)
    {
        if ($this->Authentication->getIdentity()->get('role') == 2) {
            $this->viewBuilder()->enableAutoLayout(false);
            $registro = $this->Registros->get($id, [
                'contain' => ['Sucursales', 'Estados', 'Categorias'],
            ]);
            $this->viewBuilder()->setClassName('CakePdf.pdf');
            $this->viewBuilder()->setOption(
                'pdfConfig',
                [
                    'orientation' => 'portrait',
                    'download' => true,
                    'filename' => 'Report_' . $id . '_' . date('Y-m-d_H_i_s', strtotime($registro->fecha_registro->format('Y-m-d H:i:s'))) . '.pdf'
                ]
            );
            $this->set('registro', $registro);
        } else {
            return $this->redirect(['controller' => 'Pages', 'action' => 'display', 'home']);
        }
    }
}
