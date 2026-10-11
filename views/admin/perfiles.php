
<h2>
    <?php
    if ($accionPerfil === 'crear') {
        echo 'Agregar perfil';
    } elseif ($accionPerfil === 'editar') {
        echo 'Modificar perfil';
    } else {
        echo 'Administración de perfiles';
    }
    ?>
</h2>

<?php
require __DIR__ . '/../components/aviso.php';
?>

<?php if ($accionPerfil === 'listar'): ?>

    <p>Gestioná los perfiles y sus accesos a City Farmac.</p>

    <a
        class="admin-boton admin-enlace-boton"
        href="<?= BASE_URL ?>/admin.php?page=perfiles&amp;accion=crear"
    >
        Agregar perfil
    </a>

    <!-- Tabla de perfiles -->
    <div class="admin-tabla-contenedor">

        <table class="admin-tabla">

            <thead>
                <tr>
                    <th scope="col">Nombre del perfil</th>
                    <th scope="col">Estado</th>
                    <th scope="col">Secciones permitidas</th>
                    <th scope="col">Acciones</th>
                </tr>
            </thead>

            <tbody>

                <?php foreach ($perfiles as $perfil): ?>

                    <tr>

                        <td>
                            <?= htmlspecialchars($perfil['nombre']) ?>
                        </td>

                        <td>
                            <?= $perfil['activo'] ? 'Activo' : 'Inactivo' ?>
                        </td>

                        <td>
                            <?= count($perfil['permisos']) ?>
                            secciones
                        </td>

                        <td>
                            <div class="admin-acciones">

                                <a href="<?= BASE_URL ?>/admin.php?page=perfiles&amp;accion=editar&amp;id=<?= $perfil['id'] ?>">
                                    Modificar
                                </a>

                                <a href="<?= BASE_URL ?>/admin.php?page=perfiles&amp;accion=estado&amp;id=<?= $perfil['id'] ?>">
                                    <?= $perfil['activo']
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

    <!-- Formulario de alta y modificación -->

    <p>Completá el nombre y los permisos del perfil.</p>

    <form
        class="admin-form"
        method="POST"
        action="<?= BASE_URL ?>/admin.php?page=perfiles&amp;accion=<?= $accionPerfil ?><?= $accionPerfil === 'editar' ? '&amp;id=' . $perfilSeleccionado['id'] : '' ?>"
    >

        <div class="admin-campo">

            <label for="nombre">Nombre del perfil</label>

            <input
                type="text"
                id="nombre"
                name="nombre"
                maxlength="100"
                value="<?= htmlspecialchars($perfilSeleccionado['nombre'] ?? '') ?>"
                required
            >

        </div>

        <fieldset class="admin-permisos">

            <legend>Acceso a secciones del panel</legend>

            <div class="admin-permisos-lista">

                <?php foreach ($seccionesDisponibles as $clave => $nombre): ?>

                    <label class="admin-permiso">

                        <input
                            type="checkbox"
                            name="permisos[]"
                            value="<?= htmlspecialchars($clave) ?>"
                            <?= in_array(
                                $clave,
                                $perfilSeleccionado['permisos'] ?? [],
                                true
                            ) ? 'checked' : '' ?>
                        >

                        <?= htmlspecialchars($nombre) ?>

                    </label>

                <?php endforeach; ?>

            </div>

        </fieldset>

        <button type="submit" class="admin-boton">
            <?= $accionPerfil === 'editar'
                ? 'Guardar cambios'
                : 'Agregar perfil' ?>
        </button>

    </form>

    <p class="admin-nota">
        Formulario de demostración. Los datos no se guardan.
    </p>

    <a href="<?= BASE_URL ?>/admin.php?page=perfiles">
        ← Volver al listado
    </a>

<?php endif; ?>
