<div class="users form">
    <?= $this->Flash->render() ?>
    <h3>Inicio de sesión</h3>
    <?= $this->Form->create(null, ['id' => 'form-login']) ?>
    <fieldset>
        <legend><?= __('Por favor ingresa tus datos de acceso') ?></legend>
        <?= $this->Form->label('Usuario'); ?>
        <?= $this->Form->control('username', ['label' => false, 'maxlength' => '12']) ?>
        <?= $this->Form->label('Contraseña'); ?>
        <?= $this->Form->control('password', ['label' => false, 'maxlength' => '15']) ?>
    </fieldset>
    <?= $this->Form->button('Acceder', ['type' => 'submit', 'id' => 'access-button']); ?>
    <?= $this->Form->end() ?>

    <!--<?= $this->Html->link("Add User", ['action' => 'add']) ?>-->

    <div id="resultado"></div>
</div>

<script>
    $(document).ready(function() {
        $("#form-login").submit(function(event) {
            event.preventDefault();
            let campoUsuario = validarUsuario($('#username').val());
            let campoContrasena = validarContrasena($('#password').val());

            if (campoUsuario && campoContrasena) {
                $.ajax({
                    type: "POST",
                    url: $("#form-login").attr('action'),
                    data: $("#form-login").serialize(),
                    datatype: 'json',
                    success: function(response) {
                        if (response == 1) {
                            window.location.href = "/sdi";
                        } else {
                            if (response == 2) {
                                alert('No se ha encontrado el usuario');
                            } else if (response == 3) {
                                alert('Contraseña incorrecta');
                            } else {
                                alert('Error iniciando sesión');
                            }
                        }
                    }
                });
            }
        });
    });

    function validarUsuario(usuario) {
        if (!usuario) {
            alert('Ingresa un usuario');
            return false;
        } else {
            if (!/[^a-zA-Z]/.test(usuario)) {
                return true;
            } else {
                alert('Tu usuario no puede contener números');
                return false;
            }
        }
    }

    function validarContrasena(contrasena) {
        if (!contrasena) {
            alert('Ingresa una contrasena');
            return false;
        } else {
            if (contrasena.length > 10) {
                return true;
            } else {
                alert('Ingresa una contraseña mayor a 10 caracteres');
                return false;
            }
        }
    }
</script>