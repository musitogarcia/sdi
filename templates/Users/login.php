<div class="users form">
    <?= $this->Flash->render() ?>
    <h3>Login</h3>
    <?= $this->Form->create() ?>
    <fieldset>
        <legend><?= __('Por favor ingresa tus datos de acceso') ?></legend>
        <?= $this->Form->control('username', ['required' => true], ['label' => [
            'text' => 'Usuario'
        ]]) ?>
        <?= $this->Form->control('password', ['required' => true], ['label' => [
            'text' => 'Contraseña'
        ]]) ?>
    </fieldset>
    <?= $this->Form->submit(__('Login')); ?>
    <?= $this->Form->end() ?>

    <!--<?= $this->Html->link("Add User", ['action' => 'add']) ?>-->
</div>