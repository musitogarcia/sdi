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
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $visita->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $visita->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Visitas'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="visitas form content">
            <?= $this->Form->create($visita) ?>
            <fieldset>
                <legend><?= __('Edit Visita') ?></legend>
                <?php
                    echo $this->Form->control('fecha');
                    echo $this->Form->control('user_id', ['options' => $users]);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
