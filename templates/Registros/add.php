<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Registro $registro
 */
?>
<div class="row">
    <div class="column-responsive">
        <div class="registros form content">
            <?= $this->Form->create($registro, ['id' => 'form-registrar', 'class' => 'needs-validation', 'novalidate' => true]) ?>
            <?php $this->Form->setTemplates(['inputContainer' => '{{content}}']); ?>
            <fieldset>
                <legend><?= __('Agregar registro') ?></legend>
                <div class="mb-3">
                    <label for="nombre" class="form-label">Nombre del producto</label>
                    <?= $this->Form->control('nombre', ['label' => false, 'maxlength' => '30', 'class' => 'form-control', 'required' => false]) ?>
                    <div id="error-nombre" class="invalid-feedback"></div>
                </div>
                <div class="mb-3">
                    <label for="descripcion" class="form-label">Descripción</label>
                    <?= $this->Form->control('descripcion', ['label' => false, 'maxlength' => '100', 'class' => 'form-control', 'required' => false]) ?>
                    <div id="error-descripcion" class="invalid-feedback"></div>
                </div>
                <div class="mb-3">
                    <label for="id-categoria" class="form-label">Categoría</label>
                    <?= $this->Form->select('id_categoria', $opcionesCategorias, ['id' => 'id-categoria', 'label' => false, 'class' => 'form-select']) ?>
                    <div id="error-id-categoria" class="invalid-feedback"></div>
                </div>
                <div class="mb-3">
                    <label for="id-sucursal" class="form-label">Sucursal</label>
                    <?= $this->Form->select('id_sucursal', $opcionesSucursales, ['id' => 'id-sucursal', 'label' => false, 'class' => 'form-select']) ?>
                    <div id="error-id-sucursal" class="invalid-feedback"></div>
                </div>
                <div class="mb-3">
                    <label for="precio" class="form-label">Precio</label>
                    <?= $this->Form->control('precio', ['label' => false, 'max' => '99999.99', 'min' => '0', 'step' => '0.01', 'class' => 'form-control', 'required' => false]) ?>
                    <div id="error-precio" class="invalid-feedback"></div>
                </div>
                <div class="mb-3">
                    <label for="fecha-compra" class="form-label">Fecha de compra</label>
                    <?= $this->Form->control('fecha_compra', ['label' => false, 'class' => 'form-control', 'required' => false]) ?>
                    <div id="error-fecha-compra" class="invalid-feedback"></div>
                </div>
            </fieldset>
            <?= $this->Form->button('Registrar', ['type' => 'submit', 'class' => 'btn btn-success']); ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        $("#form-registrar").submit(function(event) {
            event.preventDefault();
            if (!verificarCampos()) {
                event.stopPropagation();
            } else {
                $.ajax({
                    type: "POST",
                    url: $("#form-registrar").attr('action'),
                    data: $("#form-registrar").serialize(),
                    datatype: 'json',
                    success: function(response) {
                        if (response == 1) {
                            $('#form-registrar').removeClass('was-validated');
                            window.location.href = "/sdi/registros/add";
                        } else {
                            alert('Error registrando datos');
                        }
                    }
                });
            }
            $('#form-registrar').addClass('was-validated');
        });
    });

    function verificarCampos() {
        let checker = arr => arr.every(Boolean);

        let nombre = validarNombre($('#nombre').val());
        let descripcion = validarDescripcion($('#descripcion').val());
        let categoria = validarCategoria($('#id-categoria').val());
        let sucursal = validarSucursal($('#id-sucursal').val());
        let precio = validarPrecio($('#precio').val());
        let fecha = validarFecha($('#fecha-compra').val());

        return checker([nombre, descripcion, categoria, sucursal, precio, fecha]);
    }

    function validarNombre(nombre) {
        if (!nombre) {
            $('#error-nombre').html('Ingresa un nombre');
        } else {
            if (!/[^ a-zA-Z0-9.,-]/.test(nombre)) {
                $('#nombre').get(0).setCustomValidity('');
                return true;
            } else {
                $('#error-nombre').html('<p>No se admiten caracteres especiales</p>');
            }
        }
        $('#nombre').get(0).setCustomValidity('Invalid');
        return false;
    }

    function validarDescripcion(descripcion) {
        if (!descripcion) {
            $('#error-descripcion').html('Ingresa una descripción');
        } else {
            if (!/[^ a-zA-Z0-9.,-]/.test(descripcion)) {
                $('#descripcion').get(0).setCustomValidity('');
                return true;
            } else {
                $('#error-descripcion').html('<p>No se admiten caracteres especiales</p>');
            }
        }
        $('#descripcion').get(0).setCustomValidity('Invalid');
        return false;
    }

    function validarCategoria(categoria) {
        if (!categoria) {
            $('#error-id-categoria').html('Selecciona una categoría');
        } else {
            $('#id-categoria').get(0).setCustomValidity('');
            return true;
        }
        $('#id-categoria').get(0).setCustomValidity('Invalid');
        return false;
    }

    function validarSucursal(sucursal) {
        if (!sucursal) {
            $('#error-id-sucursal').html('Selecciona una sucursal');
        } else {
            $('#id-sucursal').get(0).setCustomValidity('');
            return true;
        }
        $('#id-sucursal').get(0).setCustomValidity('Invalid');
        return false;
    }

    function validarPrecio(precio) {
        if (!precio) {
            $('#error-precio').html('Ingresa un precio');
        } else {
            if (precio < 100000) {
                if (!/[^0-9.]/.test(precio)) {
                    $('#precio').get(0).setCustomValidity('');
                    return true;
                } else {
                    $('#error-precio').html('<p>Sólo se admiten números</p>');
                }
            } else {
                $('#error-precio').html('<p>Ingresa un valor menor a 100000</p>');
            }
        }
        $('#precio').get(0).setCustomValidity('Invalid');
        return false;
    }

    function validarFecha(fecha) {
        if (!fecha) {
            $('#error-fecha-compra').html('Ingresa una fecha');
        } else {
            $('#fecha-compra').get(0).setCustomValidity('');
            return true;
        }
        $('#fecha-compra').get(0).setCustomValidity('Invalid');
        return false;
    }
</script>