<?php
$this->assign('title', 'Inicio');
?>
<h1>
    Bienvenido
    <small class="text-muted">
        <?= $this->Identity->get('username') ?>
    </small>
</h1>
<div class="col-mb-5"></div>