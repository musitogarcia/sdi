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
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $registro->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $registro->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Registros'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="registros form content">
            <?= $this->Form->create($registro) ?>
            <fieldset>
                <legend><?= __('Edit Registro') ?></legend>
                <?php
                    echo $this->Form->control('nombre');
                    echo $this->Form->control('descripcion');
                    echo $this->Form->control('precio');
                    echo $this->Form->control('fecha_compra');
                    echo $this->Form->control('comentarios');
                    echo $this->Form->control('fecha_registro', ['empty' => true]);
                    echo $this->Form->control('fecha_modificacion', ['empty' => true]);
                    echo $this->Form->control('id_categoria');
                    echo $this->Form->control('id_sucursal');
                    echo $this->Form->control('id_estado');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
