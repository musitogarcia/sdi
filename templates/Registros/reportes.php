<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Registro[]|\Cake\Collection\CollectionInterface $registros
 */
?>
<div class="row">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-body">
                <legend><?= __('Descarga masiva') ?></legend>
                <p class="card-text">Descargar todos los registros en formato CSV.</p>
                <a href=<?= $this->Url->build(['controller' => 'registros', 'action' => 'exportCsv']) ?> class="btn btn-success">Descargar CSV</a>
                <div class="mb-xl-5"></div>
                <div class="mb-xl-5"></div>
            </div>
        </div>
    </div>
    <div class="col-sm-12">
        <div class="card">
            <div class="card-body">
                <?= $this->Form->create(null, ['id' => 'form-filtrar', 'class' => 'needs-validation']) ?>
                <?php $this->Form->setTemplates(['inputContainer' => '{{content}}']); ?>
                <fieldset class="mt-5">
                    <legend><?= __('Filtrar por fechas') ?></legend>
                    <div class="mb-3">
                        <label for="inicio" class="form-label">Fecha de incio</label>
                        <?= $this->form->dateTime('inicio', ['class' => 'form-control', 'required' => true]) ?>
                        <div id="error-inicio" class="invalid-feedback">
                            Ingresa una fecha
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="final" class="form-label">Fecha final</label>
                        <?= $this->form->dateTime('final', ['class' => 'form-control', 'required' => true]) ?>
                        <div id="error-final" class="invalid-feedback">
                            Ingresa una fecha
                        </div>
                    </div>
                </fieldset>
                <?= $this->Form->button('Descargar', ['type' => 'submit', 'id' => 'access-button', 'class' => 'btn btn-primary']); ?>
                <?= $this->Form->end() ?>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {
        $("#forma-filtrar").submit(function(event) {
            event.preventDefault();
            if (!$('#form-filtrar')[0].checkValidity()) {
                event.preventDefault()
                event.stopPropagation()
            } else {
                $.ajax({
                    type: "POST",
                    url: $("#form-filtrar").attr('action'),
                    data: $("#form-filtrar").serialize(),
                    datatype: 'json',
                    success: function(data) {
                        alert('fin');
                    }
                });
            }
            $('#form-filtrar').addClass('was-validated');
        });
    });
</script>