
<h2>
    <?php
    if ($accionUsuario === 'crear') {
        echo 'Agregar usuario';
    } elseif ($accionUsuario === 'editar') {
        echo 'Modificar usuario';
    } else {
        echo 'Administración de usuarios';
    }
    ?>
</h2>

<?php
require __DIR__ . '/../components/admin/aviso.php';
?>

<?php if ($accionUsuario === 'listar'): ?>

    <p>Gestioná los usuarios y sus perfiles en City Farmac.</p>

    <a
        class="admin-boton admin-enlace-boton"
        href="<?= BASE_URL ?>/admin.php?page=usuarios&amp;accion=crear"
    >
        Agregar usuario
    </a>

    <div class="admin-tabla-contenedor">

        <table class="admin-tabla">

            <thead>
                <tr>
                    <th scope="col">Nombre</th>
                    <th scope="col">Correo electrónico</th>
                    <th scope="col">Perfil</th>
                    <th scope="col">Estado</th>
                    <th scope="col">Acciones</th>
                </tr>
            </thead>

            <tbody>

                <?php foreach ($usuarios as $usuario): ?>

                    <tr>

                        <td>
                            <?= htmlspecialchars($usuario['nombre']) ?>
                        </td>

                        <td>
                            <?= htmlspecialchars($usuario['email']) ?>
                        </td>

                        <td>
                            <?= htmlspecialchars(
                                $perfilesPorId[$usuario['perfil_id']]
                                ?? 'Sin perfil'
                            ) ?>
                        </td>

                        <td>
                            <?= $usuario['activo'] ? 'Activo' : 'Inactivo' ?>
                        </td>

                        <td>
                            <div class="admin-acciones">

                                <a href="<?= BASE_URL ?>/admin.php?page=usuarios&amp;accion=editar&amp;id=<?= $usuario['id'] ?>">
                                    Modificar
                                </a>

                                <a href="<?= BASE_URL ?>/admin.php?page=usuarios&amp;accion=estado&amp;id=<?= $usuario['id'] ?>">
                                    <?= $usuario['activo']
                                        ? 'Inactivar'
                                        : 'Activar' ?>
                                </a>

                            </div>
                        </td>

                    </tr>

                <?php endforeach; ?>

            </tbody>

        </table>

    </div>

<?php else: ?>

    <p>Completá los datos del usuario.</p>

    <form
        class="admin-form"
        method="POST"
        action="<?= BASE_URL ?>/admin.php?page=usuarios&amp;accion=<?= $accionUsuario ?><?= $accionUsuario === 'editar' ? '&amp;id=' . $usuarioSeleccionado['id'] : '' ?>"
    >

        <div class="admin-campo">

            <label for="nombre">Nombre del usuario</label>

            <input
                type="text"
                id="nombre"
                name="nombre"
                maxlength="100"
                value="<?= htmlspecialchars($usuarioSeleccionado['nombre'] ?? '') ?>"
                required
            >

        </div>

        <div class="admin-campo">

            <label for="email">Correo electrónico</label>

            <input
                type="email"
                id="email"
                name="email"
                value="<?= htmlspecialchars($usuarioSeleccionado['email'] ?? '') ?>"
                required
            >

        </div>

        <div class="admin-campo">

            <label for="password">Contraseña</label>

            <input
                type="password"
                id="password"
                name="password"
                minlength="6"
                autocomplete="new-password"
                <?= $accionUsuario === 'crear' ? 'required' : '' ?>
            >

            <?php if ($accionUsuario === 'editar'): ?>
                <small>
                    Dejar vacío para mantener la contraseña actual.
                </small>
            <?php endif; ?>

        </div>

        <div class="admin-campo">

            <label for="perfil">Perfil</label>

            <select id="perfil" name="perfil_id" required>

                <option value="">Seleccionar perfil</option>

                <?php foreach ($perfiles as $perfil): ?>

                    <option
                        value="<?= $perfil['id'] ?>"
                        <?= ($usuarioSeleccionado['perfil_id'] ?? null) === $perfil['id']
                            ? 'selected'
                            : '' ?>
                    >
                        <?= htmlspecialchars($perfil['nombre']) ?>
                    </option>

                <?php endforeach; ?>

            </select>

        </div>

        <button type="submit" class="admin-boton">
            <?= $accionUsuario === 'editar'
                ? 'Guardar cambios'
                : 'Agregar usuario' ?>
        </button>

    </form>

    <p class="admin-nota">
        Formulario de demostración. Los datos no se guardan.
    </p>

    <a href="<?= BASE_URL ?>/admin.php?page=usuarios">
        ← Volver al listado
    </a>

<?php endif; ?>
