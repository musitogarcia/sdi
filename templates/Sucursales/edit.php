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
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $sucursale->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $sucursale->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Sucursales'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="sucursales form content">
            <?= $this->Form->create($sucursale) ?>
            <fieldset>
                <legend><?= __('Edit Sucursale') ?></legend>
                <?php
                    echo $this->Form->control('ubicacion');
                    echo $this->Form->control('fecha_modificacion', ['empty' => true]);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
