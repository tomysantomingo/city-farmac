
<h2>
    <?php
    if ($accionMarca === 'crear') {
        echo 'Agregar marca';
    } elseif ($accionMarca === 'editar') {
        echo 'Modificar marca';
    } else {
        echo 'Administración de marcas';
    }
    ?>
</h2>

<?php

$mensajeAviso = $avisoMarca;
require __DIR__ . '/../components/aviso.php';
?>

<?php if ($accionMarca === 'listar'): ?>

    <p>Gestioná las marcas disponibles en City Farmac.</p>

    <a
        class="admin-boton admin-enlace-boton"
        href="<?= BASE_URL ?>/admin.php?page=marcas&amp;accion=crear"
    >
        Agregar marca
    </a>

    <!-- Tabla de marcas -->
    <div class="admin-tabla-contenedor">

        <table class="admin-tabla">

            <thead>
                <tr>
                    <th scope="col">Nombre</th>
                    <th scope="col">Estado</th>
                    <th scope="col">Acciones</th>
                </tr>
            </thead>

            <tbody>

                <?php foreach ($marcas as $marca): ?>

                    <tr>
                        <td>
                            <?= htmlspecialchars($marca['nombre']) ?>
                        </td>

                        <td>
                            <?= $marca['activo'] ? 'Activa' : 'Inactiva' ?>
                        </td>

                        <td>
                            <div class="admin-acciones">

                                <a href="<?= BASE_URL ?>/admin.php?page=marcas&amp;accion=editar&amp;id=<?= $marca['id'] ?>">
                                    Modificar
                                </a>

                                <a href="<?= BASE_URL ?>/admin.php?page=marcas&amp;accion=estado&amp;id=<?= $marca['id'] ?>">
                                    <?= $marca['activo'] ? 'Inactivar' : 'Activar' ?>
                                </a>

                            </div>
                        </td>
                    </tr>

                <?php endforeach; ?>

            </tbody>

        </table>

    </div>

<?php else: ?>


    <p>Completá los datos de la marca.</p>

    <form
        class="admin-form"
        method="POST"
        action="<?= BASE_URL ?>/admin.php?page=marcas&amp;accion=<?= $accionMarca ?><?= $accionMarca === 'editar' ? '&amp;id=' . $marcaSeleccionada['id'] : '' ?>"
    >

        <div class="admin-campo">

            <label for="nombre">Nombre de la marca</label>

            <input
                type="text"
                id="nombre"
                name="nombre"
                maxlength="100"
                value="<?= htmlspecialchars($marcaSeleccionada['nombre'] ?? '') ?>"
                required
            >

        </div>

        <button type="submit" class="admin-boton">
            <?= $accionMarca === 'editar'
                ? 'Guardar cambios'
                : 'Agregar marca' ?>
        </button>

    </form>

    <p class="admin-nota">
        Formulario de demostración. Los datos no se guardan.
    </p>

    <a href="<?= BASE_URL ?>/admin.php?page=marcas">
        ← Volver al listado
    </a>

<?php endif; ?>
