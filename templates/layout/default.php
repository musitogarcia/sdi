<?php

/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 * @var \App\View\AppView $this
 */

//$cakeDescription = 'Sistema de inventarios | Izzi';
?>
<!DOCTYPE html>
<html>

<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- <title>
        <?= $cakeDescription ?>:
        <?= $this->fetch('title') ?>
    </title> -->
    <title>
        <?= $this->fetch('title') ?>
    </title>
    <?= $this->Html->meta('icon') ?>

    <link href="https://fonts.googleapis.com/css?family=Raleway:400,700" rel="stylesheet">

    <!-- <?= $this->Html->css(['normalize.min', 'milligram.min', 'cake']) ?> -->
    <?= $this->Html->css('bootstrap.min.css') ?>

    <?= $this->Html->script('jquery-3.6.0.min') ?>
    <?= $this->Html->script('bootstrap.min.js') ?>

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light mb-2">
        <div class="container-fluid">
            <a class="navbar-brand" href=<?= $this->Url->build(['controller' => 'Pages', 'action' => 'display', 'home']) ?>>Sistema de <b>inventarios</b></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <?php if ($this->Identity->isLoggedIn()) : ?>
                <div class="collapse navbar-collapse" id="navbarText">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link <?php echo ($tab == 'registro') ? "active" : "" ?>" href=<?= $this->Url->build(['controller' => 'registros', 'action' => 'add']) ?>>Registro de productos</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link <?php echo ($tab == 'bandeja') ? "active" : "" ?>" href=<?= $this->Url->build(['controller' => 'registros', 'action' => 'index']) ?>>Bandeja de productos</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Reportes</a>
                        </li>
                    </ul>
                    <ul class="nav nav-tabs">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false"><?= $this->Identity->get('username') ?></a>
                            <ul class="dropdown-menu pull-left">
                                <li><a class="dropdown-item" href=<?= $this->Url->build(['controller' => 'users', 'action' => 'logout']) ?>>Cerrar sesión</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            <?php endif; ?>
        </div>
    </nav>
    <main class="main">
        <div class="container">
            <?= $this->Flash->render() ?>
            <?= $this->fetch('content') ?>
        </div>
    </main>
    <footer class="footer bg-dark mt-3 text-light p-4 text-center ">
        <span><b>José Alejandro Musito García</b></span>
    </footer>
</body>
</html>