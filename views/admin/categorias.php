
<?php if ($accionCategoria === 'listar'): ?>

    <h2>
        <?= $categoriaPadre !== null
            ? 'Subcategorías de ' . htmlspecialchars($categoriaPadre['nombre'])
            : 'Administración de categorías' ?>
    </h2>

    <p>Gestioná las categorías y subcategorías de City Farmac.</p>

    
  
    <?php
        $mensajeAviso = $avisoCategoria;
        require __DIR__ . '/../components/aviso.php';
    ?>
   
    <a class="admin-boton admin-enlace-boton"
       href="<?= BASE_URL ?>/admin.php?page=categorias&amp;accion=crear">
        Agregar categoría
    </a>

    <?php if ($idPadre !== null): ?>
        <p>
            <a href="<?= BASE_URL ?>/admin.php?page=categorias">
                ← Volver a categorías principales
            </a>
        </p>
    <?php endif; ?>

    <div class="admin-tabla-contenedor">
        <table class="admin-tabla">

            <thead>
                <tr>
                    <th scope="col">Nombre</th>
                    <th scope="col">Tipo</th>
                    <th scope="col">Estado</th>
                    <th scope="col">Acciones</th>
                </tr>
            </thead>

            <tbody>

                <?php foreach ($categoriasVisibles as $categoria): ?>

                    <tr>
                        <td data-label="Nombre">
                            <?= htmlspecialchars($categoria['nombre']) ?>
                        </td>

                        <td data-label="Tipo">
                            <?= $categoria['padre_id'] === null
                                ? 'Principal'
                                : 'Subcategoría' ?>
                        </td>

                        <td data-label="Estado">
                            <?= $categoria['activo']
                                ? 'Activa'
                                : 'Inactiva' ?>
                        </td>

                        <td data-label="Acciones">
                            <div class="admin-acciones">

                                <a href="<?= BASE_URL ?>/admin.php?page=categorias&amp;accion=editar&amp;id=<?= $categoria['id'] ?>">
                                    Modificar
                                </a>

                                <a href="<?= BASE_URL ?>/admin.php?page=categorias&amp;accion=estado&amp;id=<?= $categoria['id'] ?><?= $idPadre !== null ? '&amp;padre=' . $idPadre : '' ?>">
                                    <?= $categoria['activo']
                                        ? 'Inactivar'
                                        : 'Activar' ?>
                                </a>

                                <?php if ($categoria['padre_id'] === null): ?>
                                    <a href="<?= BASE_URL ?>/admin.php?page=categorias&amp;padre=<?= $categoria['id'] ?>">
                                        Ver subcategorías
                                    </a>
                                <?php endif; ?>

                            </div>
                        </td>
                    </tr>

                <?php endforeach; ?>

            </tbody>
        </table>
    </div>

    <?php if (empty($categoriasVisibles)): ?>
        <p class="admin-aviso">
            No hay categorías para mostrar.
        </p>
    <?php endif; ?>

<?php else: ?>

    <h2>
        <?= $accionCategoria === 'editar'
            ? 'Modificar categoría'
            : 'Agregar categoría' ?>
    </h2>

    <p>Completá los datos de la categoría.</p>

    
    <?php
        $mensajeAviso = $avisoCategoria;
        require __DIR__ . '/../components/aviso.php';
    ?>

    <form class="admin-form"
          method="POST"
          action="<?= BASE_URL ?>/admin.php?page=categorias&amp;accion=<?= $accionCategoria ?><?= $accionCategoria === 'editar' ? '&amp;id=' . $categoriaSeleccionada['id'] : '' ?>">

        <div class="admin-campo">
            <label for="nombre">Nombre de categoría</label>

            <input
                type="text"
                id="nombre"
                name="nombre"
                value="<?= htmlspecialchars($categoriaSeleccionada['nombre'] ?? '') ?>"
                required
            >
        </div>

        <div class="admin-campo">
            <label for="padre_id">Categoría padre (opcional)</label>

            <select id="padre_id" name="padre_id">

                <option value="">Sin categoría padre (principal)</option>

                <?php foreach ($categoriasPrincipales as $principal): ?>

                    <?php if ($principal['id'] !== ($categoriaSeleccionada['id'] ?? null)): ?>

                        <option
                            value="<?= $principal['id'] ?>"
                            <?= ($categoriaSeleccionada['padre_id'] ?? null) === $principal['id']
                                ? 'selected'
                                : '' ?>
                        >
                            <?= htmlspecialchars($principal['nombre']) ?>
                        </option>

                    <?php endif; ?>

                <?php endforeach; ?>

            </select>
        </div>

        <button type="submit" class="admin-boton">
            <?= $accionCategoria === 'editar'
                ? 'Guardar cambios'
                : 'Agregar categoría' ?>
        </button>

    </form>

    <p class="admin-nota">
        Formulario de demostración. Los datos no se guardan.
    </p>

    <a href="<?= BASE_URL ?>/admin.php?page=categorias">
        ← Volver al listado
    </a>

<?php endif; ?>
