<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Registro $registro
 */
?>
<div class="row">
    <div class="column-responsive column-80">
        <div class="registros view content">
            <h3>Registro con folio: <?= h($registro->id) ?></h3>
            <table style="border: 1px solid black;">
                <tr>
                    <th><?= __('Nombre') ?></th>
                    <td><?= h($registro->nombre) ?></td>
                </tr>
                <tr>
                    <th><?= __('Descripción') ?></th>
                    <td><?= h($registro->descripcion) ?></td>
                </tr>
                <tr>
                    <th><?= __('Precio') ?></th>
                    <td><?= $this->Number->format($registro->precio) ?></td>
                </tr>
                <tr>
                    <th><?= __('Comentarios') ?></th>
                    <td><?= ($registro->comentarios) ?></td>
                </tr>
                <tr>
                    <th><?= __('Categoria') ?></th>
                    <td><?= ($registro->categoria['descripcion']) ?></td>
                </tr>
                <tr>
                    <th><?= __('Sucursal') ?></th>
                    <td><?= ($registro->sucursal['ubicacion']) ?></td>
                </tr>
                <tr>
                    <th><?= __('Estado') ?></th>
                    <td><?= ($registro->estado['descripcion']) ?></td>
                </tr>
                <tr>
                    <th><?= __('Fecha de Compra') ?></th>
                    <td><?= h($registro->fecha_compra) ?></td>
                </tr>
                <tr>
                    <th><?= __('Fecha de Registro') ?></th>
                    <td><?= h($registro->fecha_registro) ?></td>
                </tr>
                <tr>
                    <th><?= __('Fecha de última Modificacion') ?></th>
                    <td><?= h($registro->fecha_modificacion) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>