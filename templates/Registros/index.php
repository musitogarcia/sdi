<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Registro[]|\Cake\Collection\CollectionInterface $registros
 */
?>
<div class="registros index content">
    <?= $this->Html->link(__('New Registro'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Registros') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('nombre') ?></th>
                    <th><?= $this->Paginator->sort('descripcion') ?></th>
                    <th><?= $this->Paginator->sort('precio') ?></th>
                    <th><?= $this->Paginator->sort('fecha_compra') ?></th>
                    <th><?= $this->Paginator->sort('comentarios') ?></th>
                    <th><?= $this->Paginator->sort('fecha_registro') ?></th>
                    <th><?= $this->Paginator->sort('fecha_modificacion') ?></th>
                    <th><?= $this->Paginator->sort('id_categoria') ?></th>
                    <th><?= $this->Paginator->sort('id_sucursal') ?></th>
                    <th><?= $this->Paginator->sort('id_estado') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($registros as $registro): ?>
                <tr>
                    <td><?= $this->Number->format($registro->id) ?></td>
                    <td><?= h($registro->nombre) ?></td>
                    <td><?= h($registro->descripcion) ?></td>
                    <td><?= $this->Number->format($registro->precio) ?></td>
                    <td><?= h($registro->fecha_compra) ?></td>
                    <td><?= $this->Number->format($registro->comentarios) ?></td>
                    <td><?= h($registro->fecha_registro) ?></td>
                    <td><?= h($registro->fecha_modificacion) ?></td>
                    <td><?= $this->Number->format($registro->id_categoria) ?></td>
                    <td><?= $this->Number->format($registro->id_sucursal) ?></td>
                    <td><?= $this->Number->format($registro->id_estado) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $registro->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $registro->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $registro->id], ['confirm' => __('Are you sure you want to delete # {0}?', $registro->id)]) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(__('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')) ?></p>
    </div>
</div>
