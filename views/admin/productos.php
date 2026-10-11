
<?php if ($accionAdmin === 'listar'): ?>

    <h2>Administración de productos</h2>
    <p>Gestioná el catálogo de City Farmac.</p>

    <?php if ($avisoAdmin !== ''): ?>
        <p class="admin-aviso" role="status">
            <?= htmlspecialchars($avisoAdmin) ?>
        </p>
    <?php endif; ?>

    <a class="admin-boton admin-enlace-boton"
       href="<?= BASE_URL ?>/admin.php?page=productos&accion=crear">
        Agregar producto
    </a>

    <form method="GET"
          action="<?= BASE_URL ?>/admin.php"
          class="admin-filtros">

        <input type="hidden" name="page" value="productos">

        <div class="admin-campo">
            <label for="categoria">Categoría</label>
            <select id="categoria" name="categoria">
                <option value="">Todas las categorías</option>

                <?php foreach ($categoriasAdmin as $categoria): ?>
                    <option
                        value="<?= htmlspecialchars($categoria) ?>"
                        <?= $categoriaActual === $categoria ? 'selected' : '' ?>>
                        <?= htmlspecialchars($categoria) ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>

        <div class="admin-campo">
            <label for="subcategoria">Subcategoría</label>
            <select id="subcategoria" name="subcategoria">
                <option value="">Todas las subcategorías</option>

                <?php foreach ($subcategoriasAdmin as $subcategoria): ?>
                    <option
                        value="<?= htmlspecialchars($subcategoria) ?>"
                        <?= $subcategoriaActual === $subcategoria ? 'selected' : '' ?>>
                        <?= htmlspecialchars($subcategoria) ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>

        <button type="submit" class="admin-boton">
            Filtrar
        </button>

        <a href="<?= BASE_URL ?>/admin.php?page=productos">
            Limpiar
        </a>
    </form>

    <!-- Tabla de productos -->
    <div class="admin-tabla-contenedor">
        <table class="admin-tabla">
            <thead>
                <tr>
                    <th scope="col">Producto</th>
                    <th scope="col">Marca</th>
                    <th scope="col">Categoría</th>
                    <th scope="col">Precio</th>
                    <th scope="col">Destacado</th>
                    <th scope="col">Acciones</th>
                </tr>
            </thead>

            <tbody>
                <?php foreach ($productosAdmin as $producto): ?>
                    <tr>
                        <td><?= htmlspecialchars($producto->nombre) ?></td>

                        <td><?= htmlspecialchars($producto->marca) ?></td>

                        <td>
                            <?= htmlspecialchars($producto->categoria) ?>
                            <small>
                                <?= htmlspecialchars($producto->subcategoria) ?>
                            </small>
                        </td>

                        <td>
                            $<?= number_format($producto->precio, 0, ',', '.') ?>
                        </td>

                        <td><?= $producto->destacado ? 'Sí' : 'No' ?></td>

                        <td>
                            <div class="admin-acciones">
                                <a href="<?= BASE_URL ?>/admin.php?page=productos&accion=editar&id=<?= $producto->id ?>">
                                    Modificar
                                </a>

                                <a href="<?= BASE_URL ?>/admin.php?page=productos&accion=estado&id=<?= $producto->id ?>">
                                    Activar/Inactivar
                                </a>

                                <a href="<?= BASE_URL ?>/admin.php?page=comentarios&producto=<?= $producto->id ?>">
                                    Ver comentarios
                                </a>
                            </div>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <?php if (empty($productosAdmin)): ?>
        <p class="admin-aviso">
            No hay productos para mostrar.
        </p>
    <?php endif; ?>

<?php else: ?>

    <!-- Formulario de alta y modificación -->
    <h2>
        <?= $accionAdmin === 'editar'
            ? 'Modificar producto'
            : 'Agregar producto' ?>
    </h2>

    <p>
        <?= $accionAdmin === 'editar'
            ? 'Modificá los datos del producto seleccionado.'
            : 'Completá los datos del nuevo producto.' ?>
    </p>

    <?php if ($avisoAdmin !== ''): ?>
        <p class="admin-aviso" role="status">
            <?= htmlspecialchars($avisoAdmin) ?>
        </p>
    <?php endif; ?>

    <form
        class="admin-form"
        method="POST"
        enctype="multipart/form-data"
        action="<?= BASE_URL ?>/admin.php?page=productos&accion=<?= $accionAdmin ?><?= $accionAdmin === 'editar' ? '&id=' . $productoSeleccionado->id : '' ?>"
    >

        <div class="admin-campo">
            <label for="nombre">Nombre del producto</label>
            <input type="text" id="nombre" name="nombre"
                   value="<?= htmlspecialchars($productoSeleccionado->nombre ?? '') ?>"
                   required>
        </div>

        <div class="admin-campo">
            <label for="descripcion">Descripción</label>
            <textarea id="descripcion" name="descripcion"
                      rows="4" required><?= htmlspecialchars($productoSeleccionado->descripcion ?? '') ?></textarea>
        </div>

        <div class="admin-campo">
            <label for="precio">Precio</label>
            <input type="number" id="precio" name="precio"
                   min="0" step="0.01"
                   value="<?= htmlspecialchars((string) ($productoSeleccionado->precio ?? '')) ?>"
                   required>
        </div>

        <div class="admin-campo">
            <label for="categoria-form">Categoría</label>
            <select id="categoria-form" name="categoria" required>
                <option value="">Seleccionar categoría</option>

                <?php foreach ($categoriasAdmin as $categoria): ?>
                    <option value="<?= htmlspecialchars($categoria) ?>"
                        <?= ($productoSeleccionado->categoria ?? '') === $categoria ? 'selected' : '' ?>>
                        <?= htmlspecialchars($categoria) ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>

        <div class="admin-campo">
            <label for="subcategoria-form">Subcategoría</label>
            <select id="subcategoria-form" name="subcategoria" required>
                <option value="">Seleccionar subcategoría</option>

                <?php foreach ($subcategoriasAdmin as $subcategoria): ?>
                    <option value="<?= htmlspecialchars($subcategoria) ?>"
                        <?= ($productoSeleccionado->subcategoria ?? '') === $subcategoria ? 'selected' : '' ?>>
                        <?= htmlspecialchars($subcategoria) ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>

        <div class="admin-campo">
            <label for="marca">Marca</label>
            <input type="text" id="marca" name="marca"
                   value="<?= htmlspecialchars($productoSeleccionado->marca ?? '') ?>"
                   required>
        </div>

        <div class="admin-campo">
            <label for="modelo">Modelo</label>
            <input type="text" id="modelo" name="modelo"
                   value="<?= htmlspecialchars($productoSeleccionado->modelo ?? '') ?>"
                   required>
        </div>

        <div class="admin-campo">
            <label for="imagen">Imagen del producto</label>
            <input type="file" id="imagen" name="imagen"
                   accept="image/*"
                   <?= $accionAdmin === 'crear' ? 'required' : '' ?>>

            <?php if ($accionAdmin === 'editar'): ?>
                <small>
                    Imagen actual:
                    <?= htmlspecialchars($productoSeleccionado->imagen) ?>
                </small>
            <?php endif; ?>
        </div>

        <div class="admin-check">
            <input type="checkbox" id="destacado" name="destacado"
                   value="1"
                   <?= ($productoSeleccionado->destacado ?? false) ? 'checked' : '' ?>>
            <label for="destacado">Marcar como destacado</label>
        </div>

        <button type="submit" class="admin-boton">
            <?= $accionAdmin === 'editar'
                ? 'Guardar cambios'
                : 'Agregar producto' ?>
        </button>

    </form>

    <p class="admin-nota">
        Formulario de demostración. Los datos no se guardan.
    </p>

    <a href="<?= BASE_URL ?>/admin.php?page=productos">
        ← Volver al listado
    </a>

<?php endif; ?>
