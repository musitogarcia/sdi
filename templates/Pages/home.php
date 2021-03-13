<?php
$this->assign('title', 'Inicio');
?>
<h1>
    Bienvenido
    <small class="text-muted">
        <?= $this->Identity->get('last_name') ?>,
        <?= $this->Identity->get('name') ?>
    </small>
</h1>
<h1 class="display-6">
    Usuario
    <small class="text-muted">
        <?= $this->Identity->get('profile')['descripcion'] ?>
    </small>
</h1>
<!-- <?php debug($this->Identity) ?> -->
<div class="col-mb-5"></div>