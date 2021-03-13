<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Registro[]|\Cake\Collection\CollectionInterface $registros
 */
?>
<div class="registros index content">
    <h3><?= __('Registros') ?></h3>
    <div class="table-responsive">
        <table class="table table-light table-bordered table-striped table-hover">
            <thead>
                <tr class="table-light">
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('nombre') ?></th>
                    <th><?= $this->Paginator->sort('id_categoria', 'Categoría') ?></th>
                    <th><?= $this->Paginator->sort('id_sucursal', 'Sucursal') ?></th>
                    <th class="actions"><?= __('Acciones') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($registros as $registro) : ?>
                    <tr>
                        <td><?= $this->Number->format($registro->id) ?></td>
                        <td><?= h($registro->nombre) ?></td>
                        <td><?= $this->Number->format($registro->id_categoria) ?></td>
                        <td><?= $this->Number->format($registro->id_sucursal) ?></td>
                        <td class="actions">
                            <!-- <?= $this->Html->link(__('View'), ['action' => 'view', $registro->id]) ?> -->
                            <?= $this->Html->link(__('Editar'), ['action' => 'edit', $registro->id], ['class' => 'btn btn-warning']) ?>
                            <?= $this->Form->postLink(__('Eliminar'), ['action' => 'delete', $registro->id], ['confirm' => __('¿Eliminar el registro # {0}?', $registro->id), 'class' => 'btn btn-danger']) ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->prev('< ' . __('Anterior')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('Siguiente') . ' >') ?>
        </ul>
        <p><?= $this->Paginator->counter(__('Página {{page}} de {{pages}}, mostrando {{current}} registro(s) de {{count}} totales')) ?></p>
    </div>
</div>