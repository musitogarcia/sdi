<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Estado $estado
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Estado'), ['action' => 'edit', $estado->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Estado'), ['action' => 'delete', $estado->id], ['confirm' => __('Are you sure you want to delete # {0}?', $estado->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Estados'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Estado'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="estados view content">
            <h3><?= h($estado->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($estado->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Descripcion') ?></th>
                    <td><?= $this->Number->format($estado->descripcion) ?></td>
                </tr>
                <tr>
                    <th><?= __('Fecha Modificacion') ?></th>
                    <td><?= h($estado->fecha_modificacion) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
