<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Registro $registro
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Registro'), ['action' => 'edit', $registro->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Registro'), ['action' => 'delete', $registro->id], ['confirm' => __('Are you sure you want to delete # {0}?', $registro->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Registros'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Registro'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="registros view content">
            <h3><?= h($registro->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Nombre') ?></th>
                    <td><?= h($registro->nombre) ?></td>
                </tr>
                <tr>
                    <th><?= __('Descripcion') ?></th>
                    <td><?= h($registro->descripcion) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($registro->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Precio') ?></th>
                    <td><?= $this->Number->format($registro->precio) ?></td>
                </tr>
                <tr>
                    <th><?= __('Comentarios') ?></th>
                    <td><?= $this->Number->format($registro->comentarios) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id Categoria') ?></th>
                    <td><?= $this->Number->format($registro->id_categoria) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id Sucursal') ?></th>
                    <td><?= $this->Number->format($registro->id_sucursal) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id Estado') ?></th>
                    <td><?= $this->Number->format($registro->id_estado) ?></td>
                </tr>
                <tr>
                    <th><?= __('Fecha Compra') ?></th>
                    <td><?= h($registro->fecha_compra) ?></td>
                </tr>
                <tr>
                    <th><?= __('Fecha Registro') ?></th>
                    <td><?= h($registro->fecha_registro) ?></td>
                </tr>
                <tr>
                    <th><?= __('Fecha Modificacion') ?></th>
                    <td><?= h($registro->fecha_modificacion) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
