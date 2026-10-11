
<h2>Iniciar sesión</h2>

<p>Ingresá al panel de administración.</p>

<form class="admin-form"
      action="<?= BASE_URL ?>/admin.php?page=inicio"
      method="POST">

    <div class="admin-campo">
        <label for="email">Correo electrónico</label>
        <input type="email"
               id="email"
               name="email"
               autocomplete="username"
               required>
    </div>

    <div class="admin-campo">
        <label for="password">Contraseña</label>
        <input type="password"
               id="password"
               name="password"
               autocomplete="current-password"
               required>
    </div>

    <button class="admin-boton" type="submit">
        Ingresar
    </button>

</form>

<p class="admin-nota">
    Acceso simulado: no se verifican credenciales.
</p>

<a href="<?= BASE_URL ?>/admin.php?page=registro">
    Crear una cuenta
</a>
