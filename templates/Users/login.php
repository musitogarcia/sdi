<div class="users form">
    <?= $this->Flash->render() ?>
    <h3>Inicio de sesión</h3>
    <?= $this->Form->create() ?>
    <fieldset>
        <legend><?= __('Por favor ingresa tus datos de acceso') ?></legend>
        <?= $this->Form->label('Usuario'); ?>
        <?= $this->Form->control('username', ['label' => false]) ?>
        <?= $this->Form->label('Contraseña'); ?>
        <?= $this->Form->control('password', ['label' => false]) ?>
    </fieldset>
    <?= $this->Form->submit(__('Acceder')); ?>
    <?= $this->Form->end() ?>

    <!--<?= $this->Html->link("Add User", ['action' => 'add']) ?>-->
</div>