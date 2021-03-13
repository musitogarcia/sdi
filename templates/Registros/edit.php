<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Registro $registro
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <?= $this->Html->link(__('Regresar'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="registros form content">
            <?= $this->Form->create($registro, ['id' => 'form-editar', 'class' => 'needs-validation', 'novalidate' => true]) ?>
            <?php $this->Form->setTemplates(['inputContainer' => '{{content}}']); ?>
            <fieldset>
                <legend><?= __('Editar Registro') ?></legend>
                <div class="mb-3">
                    <label for="nombre" class="form-label">Nombre del producto</label>
                    <?= $this->Form->control('nombre', ['label' => false, 'maxlength' => '30', 'class' => 'form-control', 'required' => false, 'disabled' => true]) ?>
                    <div id="error-nombre" class="invalid-feedback"></div>
                </div>
                <div class="mb-3">
                    <label for="descripcion" class="form-label">Descripción</label>
                    <?= $this->Form->control('descripcion', ['label' => false, 'maxlength' => '100', 'class' => 'form-control', 'required' => false, 'disabled' => true]) ?>
                    <div id="error-descripcion" class="invalid-feedback"></div>
                </div>
                <div class="mb-3">
                    <label for="id-categoria" class="form-label">Categoría</label>
                    <?= $this->Form->control('id_categoria', ['label' => false, 'maxlength' => '100', 'class' => 'form-control', 'required' => false, 'disabled' => true]) ?>
                    <div id="error-id-categoria" class="invalid-feedback"></div>
                </div>
                <div class="mb-3">
                    <label for="id-sucursal" class="form-label">Sucursal</label>
                    <?= $this->Form->control('id_sucursal', ['label' => false, 'maxlength' => '100', 'class' => 'form-control', 'required' => false, 'disabled' => true]) ?>
                    <div id="error-id-sucursal" class="invalid-feedback"></div>
                </div>
                <div class="mb-3">
                    <label for="precio" class="form-label">Precio</label>
                    <?= $this->Form->control('precio', ['label' => false, 'max' => '99999.99', 'min' => '0', 'step' => '0.01', 'class' => 'form-control', 'required' => false, 'disabled' => true]) ?>
                    <div id="error-precio" class="invalid-feedback"></div>
                </div>
                <div class="mb-3">
                    <label for="fecha-compra" class="form-label">Fecha de compra</label>
                    <?= $this->Form->control('fecha_compra', ['label' => false, 'class' => 'form-control', 'required' => false, 'disabled' => true]) ?>
                    <div id="error-fecha-compra" class="invalid-feedback"></div>
                </div>
                <div class="mb-3">
                    <label for="id-estado" class="form-label">Estado</label>
                    <?= $this->Form->select('id_estado', $opcionesEstados, ['id' => 'id-estado', 'label' => false, 'class' => 'form-select', 'empty' => false]) ?>
                    <div id="error-id-estado" class="invalid-feedback"></div>
                </div>
                <div class="mb-3">
                    <label for="comentarios" class="form-label">Comentarios</label>
                    <?= $this->Form->textarea('comentarios', ['id' => 'comentarios', 'label' => false, 'maxlength' => '100', 'class' => 'form-control', 'required' => false]) ?>
                    <div id="error-comentarios" class="invalid-feedback"></div>
                </div>
            </fieldset>
            <?= $this->Form->button('Guardar', ['type' => 'submit', 'class' => 'btn btn-success']); ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        $("#form-editar").submit(function(event) {
            event.preventDefault();
            if (!verificarCampos()) {
                event.stopPropagation();
            } else {
                $.ajax({
                    type: "POST",
                    url: $("#form-editar").attr('action'),
                    data: $("#form-editar").serialize(),
                    datatype: 'json',
                    success: function(response) {
                        if (response == 1) {
                            $('#form-editar').removeClass('was-validated');
                            location.reload();
                        } else {
                            alert('Error registrando datos');
                        }
                    }
                });
            }
            $('#form-editar').addClass('was-validated');
        });
    });

    function verificarCampos() {
        let checker = arr => arr.every(Boolean);

        let estado = validarEstado($('#id-estado').val());
        let comentarios = validarComentarios($('#comentarios').val());

        return checker([estado, comentarios]);
    }

    function validarEstado(estado) {
        if (!estado) {
            $('#error-id-estado').html('Selecciona un estado');
        } else {
            $('#id-estado').get(0).setCustomValidity('');
            return true;
        }
        $('#id-estado').get(0).setCustomValidity('Invalid');
        return false;
    }

    function validarComentarios(comentarios) {
        if (!comentarios) {
            $('#error-comentarios').html('Ingresa los comentarios');
        } else {
            $('#comentarios').get(0).setCustomValidity('');
            return true;
        }
        $('#comentarios').get(0).setCustomValidity('Invalid');
        return false;
    }
</script>