<section class="hero">
    <h2>Bienvenido a City Farmac</h2>

    <p>
        Encontrá productos de farmacia, perfumería y cuidado personal.
    </p>
</section>

<section class="productos-destacados">

    <h2>Productos destacados</h2>

    <div class="productos-grid">

        <?php foreach ($productos as $producto): ?>

            <article class="producto-card">

                <img
                    src="<?= BASE_URL ?>/assets/img/<?= $producto->imagen ?>"
                    alt="<?= htmlspecialchars($producto->nombre) ?>"
                >

                <h3>
                    <?= htmlspecialchars($producto->nombre) ?>
                </h3>

                <p>
                    <?= htmlspecialchars($producto->marca) ?>
                </p>

                <p class="precio">
                    $<?= number_format($producto->precio, 0, ',', '.') ?>
                </p>

                <p>
                    Valoración:
                    <?= str_repeat('★', $producto->ranking) ?>
                    <?= str_repeat('☆', 5 - $producto->ranking) ?>
                </p>

                <a href="<?= BASE_URL ?>/index.php?page=detalle&id=<?= $producto->id ?>">
                    Ver producto
                </a>

            </article>

        <?php endforeach; ?>

    </div>

</section>