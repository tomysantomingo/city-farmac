
<h2>Registro de usuario</h2>

<?php if ($_SERVER['REQUEST_METHOD'] === 'POST'): ?>
    <p class="admin-aviso" role="status">
        Formulario de demostración. No se creó ningún usuario.
    </p>
<?php endif; ?>

<form class="admin-form"
      action="<?= BASE_URL ?>/admin.php?page=registro"
      method="POST">

    <div class="admin-campo">
        <label for="nombre">Nombre</label>
        <input type="text"
               id="nombre"
               name="nombre"
               required>
    </div>

    <div class="admin-campo">
        <label for="email">Correo electrónico</label>
        <input type="email"
               id="email"
               name="email"
               required>
    </div>

    <div class="admin-campo">
        <label for="password">Contraseña</label>
        <input type="password"
               id="password"
               name="password"
               minlength="6"
               required>
    </div>

    <div class="admin-campo">
        <label for="confirmar">Confirmar contraseña</label>
        <input type="password"
               id="confirmar"
               name="confirmar"
               minlength="6"
               required>
    </div>

    <button class="admin-boton" type="submit">
        Registrarse
    </button>

</form>

<a href="<?= BASE_URL ?>/admin.php?page=login">
    Volver al inicio de sesión
</a>
