<section class="detalle-producto">

    <a href="<?= BASE_URL ?>/index.php?page=productos">
        ← Volver al catálogo
    </a>

    <div class="detalle-contenido">

        <div class="detalle-imagen">
            <img
                src="<?= BASE_URL ?>/assets/img/<?= htmlspecialchars($productoDetalle->imagen) ?>"
                alt="<?= htmlspecialchars($productoDetalle->nombre) ?>"
            >
        </div>

        <div class="detalle-informacion">

            <h2><?= htmlspecialchars($productoDetalle->nombre) ?></h2>

            <p><strong>Marca:</strong>
                <?= htmlspecialchars($productoDetalle->marca) ?>
            </p>

            <p><strong>Modelo:</strong>
                <?= htmlspecialchars($productoDetalle->modelo) ?>
            </p>

            <p><?= htmlspecialchars($productoDetalle->descripcion) ?></p>

            <p class="precio">
                $<?= number_format($productoDetalle->precio, 0, ',', '.') ?>
            </p>

            <p>
                <strong>Valoración promedio de ejemplo:</strong>
                <?= number_format($productoDetalle->ranking, 1, ',', '.') ?> / 5
            </p>

        </div>
    </div>

    <section class="detalle-comentarios">

        <h3>Comentarios de clientes</h3>

        <?php if (empty($comentariosAprobados)): ?>

            <p>Este producto todavía no tiene comentarios aprobados.</p>

        <?php else: ?>

            <?php foreach ($comentariosAprobados as $comentario): ?>

                <article class="comentario">
                    <p>
                        <strong>Valoración:</strong>
                        <?= $comentario['ranking'] ?> / 5
                    </p>

                    <p><?= htmlspecialchars($comentario['comentario']) ?></p>

                    <small>
                        <?= htmlspecialchars($comentario['fecha']) ?>
                    </small>
                </article>

            <?php endforeach; ?>

        <?php endif; ?>

    </section>

    <section class="detalle-formulario">

        <h3>Dejá tu comentario</h3>

        <?php

            $mensajeAviso = $_SERVER['REQUEST_METHOD'] === 'POST'
                ? 'Formulario de demostración: tu comentario no se guardó.'
                : '';

            require __DIR__ . '/../components/aviso.php';

        ?>
        
        <form method="POST"
              action="<?= BASE_URL ?>/index.php?page=detalle&amp;id=<?= $productoDetalle->id ?>">

            <label for="email">Correo electrónico</label>
            <input
                type="email"
                id="email"
                name="email"
                required
            >

            <label for="comentario">Comentario</label>
            <textarea
                id="comentario"
                name="comentario"
                rows="5"
                required
            ></textarea>

            <label for="ranking">Valoración</label>
            <select id="ranking" name="ranking" required>
                <option value="">Seleccionar</option>
                <option value="1">1 estrella</option>
                <option value="2">2 estrellas</option>
                <option value="3">3 estrellas</option>
                <option value="4">4 estrellas</option>
                <option value="5">5 estrellas</option>
            </select>

            <button type="submit">Enviar comentario</button>

        </form>

    </section>

</section>