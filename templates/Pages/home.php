<?php
$this->assign('title', 'Inicio');
?>
<h1>
    Bienvenido
    <small class="text-muted">
        <?= $this->Identity->get('username') ?>
        <?= $this->Identity->get('role') ?>
        
    </small>
</h1>
<!-- <?php debug($this->Identity->get('role')) ?> -->
<div class="col-mb-5"></div>