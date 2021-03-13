<div class="users form mt-5">
    <?= $this->Flash->render() ?>
    <h3>Inicio de sesión</h3>
    <?= $this->Form->create(null, ['id' => 'form-login', 'class' => 'needs-validation', 'novalidate' => true]) ?>
    <?php $this->Form->setTemplates(['inputContainer' => '{{content}}']); ?>
    <fieldset class="mt-5">
        <!-- <legend><?= __('Por favor ingresa tus datos de acceso') ?></legend> -->
        <div class="mb-3">
            <label for="username" class="form-label">Usuario</label>
            <?= $this->Form->control('username', ['label' => false, 'maxlength' => '12', 'class' => 'form-control', 'required' => false]) ?>
            <div id="error-username" class="invalid-feedback"></div>
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Contraseña</label>
            <?= $this->Form->control('password', ['label' => false, 'maxlength' => '15', 'class' => 'form-control', 'required' => false]) ?>
            <div id="error-password" class="invalid-feedback"></div>
        </div>
    </fieldset>
    <?= $this->Form->button('Acceder', ['type' => 'submit', 'id' => 'access-button', 'class' => 'btn btn-success']); ?>
    <?= $this->Form->end() ?>

    <div id="resultado"></div>
</div>

<script>
    $(document).ready(function() {
        $("#form-login").submit(function(event) {
            event.preventDefault();
            if (!verificarCampos()) {
                event.stopPropagation();
            } else {
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
                                $('#username').get(0).setCustomValidity('Invalid');
                                $('#password').get(0).setCustomValidity('Invalid');
                                $('#error-username').html('No se ha encontrado el usuario');
                            } else if (response == 3) {
                                $('#password').get(0).setCustomValidity('Invalid');
                                $('#error-password').html('Contraseña incorrecta');
                            } else {
                                alert('Error iniciando sesión');
                            }
                        }
                    }
                });
            }
            $('#form-login').addClass('was-validated');
        });
    });

    function verificarCampos() {
        let checker = arr => arr.every(Boolean);

        let username = validarUsername($('#username').val());
        let password = validarPassword($('#password').val());

        return checker([username, password]);
    }

    function validarUsername(username) {
        if (!username) {
            $('#error-username').html('Ingresa un nombre de usuario');
        } else {
            if (!/[^a-zA-Z]/.test(username)) {
                $('#username').get(0).setCustomValidity('');
                return true;
            } else {
                $('#error-username').html('<p>Sólo se admiten letras</p>');
            }
        }
        $('#username').get(0).setCustomValidity('Invalid');
        return false;
    }

    function validarPassword(password) {
        if (!password) {
            $('#error-password').html('Ingresa una contraseña');
        } else {
            if (password.length > 10) {
                $('#password').get(0).setCustomValidity('');
                return true;
            } else {
                $('#error-password').html('<p>Ingresa una contraseña mayor a 10 caracteres</p>');
            }
        }
        $('#password').get(0).setCustomValidity('Invalid');
        return false;
    }
</script>