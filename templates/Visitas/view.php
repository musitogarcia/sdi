<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Visita $visita
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Visita'), ['action' => 'edit', $visita->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Visita'), ['action' => 'delete', $visita->id], ['confirm' => __('Are you sure you want to delete # {0}?', $visita->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Visitas'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Visita'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="visitas view content">
            <h3><?= h($visita->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('User') ?></th>
                    <td><?= $visita->has('user') ? $this->Html->link($visita->user->name, ['controller' => 'Users', 'action' => 'view', $visita->user->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($visita->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Fecha') ?></th>
                    <td><?= h($visita->fecha) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
