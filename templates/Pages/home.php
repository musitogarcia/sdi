<?php
$this->assign('title', 'Inicio');
?>
<h1>
    Bienvenido
    <small class="text-muted">
        <?= $this->Identity->get('username') ?>
    </small>
</h1>
<h1 class="display-6">
    Usuario
    <small class="text-muted">
        <?= $this->Identity->get('role')['descripcion'] ?>
    </small>
</h1>
<p class="lead">
    Hora de ingreso:
    <?= date('H:i') ?>
</p>