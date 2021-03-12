<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Sucursale $sucursale
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Sucursale'), ['action' => 'edit', $sucursale->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Sucursale'), ['action' => 'delete', $sucursale->id], ['confirm' => __('Are you sure you want to delete # {0}?', $sucursale->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Sucursales'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Sucursale'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="sucursales view content">
            <h3><?= h($sucursale->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Ubicacion') ?></th>
                    <td><?= h($sucursale->ubicacion) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($sucursale->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Fecha Modificacion') ?></th>
                    <td><?= h($sucursale->fecha_modificacion) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
