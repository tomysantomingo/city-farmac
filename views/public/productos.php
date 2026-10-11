<section class="catalogo">

    <h2>Catálogo de productos</h2>
    <p>Explorá nuestros productos de farmacia, perfumería y cuidado personal.</p>

    <div class="catalogo-layout">

        <!-- Menú de categorías -->
        <aside class="catalogo-categorias">
            <h3>Categorías</h3>

            <a href="<?= BASE_URL ?>/index.php?page=productos">
                Todas las categorías
            </a>

            <?php foreach ($categorias as $categoria => $subcategorias): ?>

                <details <?= $categoriaActual === $categoria ? 'open' : '' ?>>
                    <summary>
                        <?= htmlspecialchars($categoria) ?>
                    </summary>

                    <ul>
                        <li>
                            <a href="<?= htmlspecialchars($crearEnlaceCategoria($categoria)) ?>">
                                Ver toda la categoría
                            </a>
                        </li>

                        <?php foreach (array_keys($subcategorias) as $subcategoria): ?>
                            <li>
                                <a href="<?= htmlspecialchars($crearEnlaceCategoria($categoria, $subcategoria)) ?>">
                                    <?= htmlspecialchars($subcategoria) ?>
                                </a>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </details>

            <?php endforeach; ?>
        </aside>

        <!-- Contenido del catálogo -->
        <div class="catalogo-contenido">

            <form method="GET"
                  action="<?= BASE_URL ?>/index.php"
                  class="catalogo-filtros">

                <input type="hidden" name="page" value="productos">

                <input type="hidden" name="categoria"
                       value="<?= htmlspecialchars($categoriaActual) ?>">

                <input type="hidden" name="subcategoria"
                       value="<?= htmlspecialchars($subcategoriaActual) ?>">

                <div>
                    <label for="marca">Marca</label>

                    <select name="marca" id="marca">
                        <option value="">Todas las marcas</option>

                        <?php foreach (array_keys($marcas) as $marca): ?>
                            <option
                                value="<?= htmlspecialchars($marca) ?>"
                                <?= $marcaActual === $marca ? 'selected' : '' ?>>
                                <?= htmlspecialchars($marca) ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div>
                    <label for="orden">Ordenar por</label>

                    <select name="orden" id="orden">
                        <option value="destacados" <?= $ordenActual === 'destacados' ? 'selected' : '' ?>>
                            Destacados
                        </option>
                        <option value="ranking" <?= $ordenActual === 'ranking' ? 'selected' : '' ?>>
                            Mejor valorados
                        </option>
                        <option value="az" <?= $ordenActual === 'az' ? 'selected' : '' ?>>
                            Nombre A-Z
                        </option>
                        <option value="za" <?= $ordenActual === 'za' ? 'selected' : '' ?>>
                            Nombre Z-A
                        </option>
                    </select>
                </div>

                <button type="submit">Aplicar filtros</button>

                <a href="<?= BASE_URL ?>/index.php?page=productos">
                    Limpiar filtros
                </a>
            </form>

            <p class="catalogo-cantidad">
                <?= count($productosFiltrados) ?> productos encontrados
            </p>

            <?php if (empty($productosFiltrados)): ?>

                <p class="catalogo-vacio">
                    No hay productos para mostrar.
                </p>

            <?php else: ?>

                <div class="productos-grid">
                    <?php foreach ($productosFiltrados as $producto): ?>
                        <?php require __DIR__ . '/../components/producto-card.php'; ?>
                    <?php endforeach; ?>
                </div>

            <?php endif; ?>

        </div>
    </div>
</section>