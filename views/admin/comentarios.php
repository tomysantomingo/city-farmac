
<h2>Administración de comentarios</h2>

<p>
    Revisá y moderá los comentarios de los productos
    de City Farmac.
</p>

<?php
require __DIR__ . '/../components/aviso.php';
?>

<!-- Filtros -->

<form
    method="GET"
    action="<?= BASE_URL ?>/admin.php"
    class="admin-filtros"
>

    <input type="hidden" name="page" value="comentarios">

    <div class="admin-campo">

        <label for="producto">Producto</label>

        <select id="producto" name="producto">

            <option value="">Todos los productos</option>

            <?php foreach ($productos as $producto): ?>

                <option
                    value="<?= $producto->id ?>"
                    <?= $productoActual === $producto->id
                        ? 'selected'
                        : '' ?>
                >
                    <?= htmlspecialchars($producto->nombre) ?>
                </option>

            <?php endforeach; ?>

        </select>

    </div>

    <div class="admin-campo">

        <label for="estado">Estado</label>

        <select id="estado" name="estado">

            <option value="todos"
                <?= $estadoActual === 'todos' ? 'selected' : '' ?>>
                Todos
            </option>

            <option value="activos"
                <?= $estadoActual === 'activos' ? 'selected' : '' ?>>
                Aprobados (activos)
            </option>

            <option value="inactivos"
                <?= $estadoActual === 'inactivos' ? 'selected' : '' ?>>
                No aprobados (inactivos)
            </option>

        </select>

    </div>

    <button type="submit" class="admin-boton">
        Filtrar
    </button>

    <a href="<?= BASE_URL ?>/admin.php?page=comentarios">
        Limpiar
    </a>

</form>

<p>
    <strong>
        <?= count($comentariosFiltrados) ?>
        comentarios encontrados
    </strong>
</p>

<!-- Tabla -->

<div class="admin-tabla-contenedor">

    <table class="admin-tabla">

        <thead>
            <tr>
                <th scope="col">Comentario</th>
                <th scope="col">Producto</th>
                <th scope="col">Ranking</th>
                <th scope="col">Fecha</th>
                <th scope="col">Estado</th>
                <th scope="col">Acciones</th>
            </tr>
        </thead>

        <tbody>

            <?php foreach ($comentariosFiltrados as $comentario): ?>

                <tr>

                   <td data-label="Comentario">
                        <?= htmlspecialchars($comentario['comentario']) ?>
                    </td>

                    <td data-label="Producto">
                        <?= htmlspecialchars(
                            $productosPorId[$comentario['producto_id']]
                            ?? 'Producto no encontrado'
                        ) ?>
                    </td>

                    <td data-label="Ranking">
                        <?= $comentario['ranking'] ?> / 5
                    </td>

                   <td data-label="Fecha">
                        <?= htmlspecialchars($comentario['fecha']) ?>
                    </td>

                    <td data-label="Estado">
                        <?= $comentario['aprobado']
                            ? 'Aprobado'
                            : 'No aprobado' ?>
                    </td>

                   <td data-label="Acciones">
                        <div class="admin-acciones">

                            <a href="<?= htmlspecialchars(
                                $crearEnlaceComentario($comentario),
                                ENT_QUOTES,
                                'UTF-8'
                            ) ?>">
                                <?= $comentario['aprobado']
                                    ? 'Desaprobar'
                                    : 'Aprobar' ?>
                            </a>

                        </div>
                    </td>

                </tr>

            <?php endforeach; ?>

        </tbody>

    </table>

</div>

<?php if (empty($comentariosFiltrados)): ?>

    <p class="admin-aviso">
        No hay comentarios para mostrar.
    </p>

<?php endif; ?>

