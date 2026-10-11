
<section class="catalogo">

    <h2>Catálogo de productos</h2>

    <p>
        Explorá nuestros productos de farmacia,
        perfumería y cuidado personal.
    </p>

    <div class="productos-grid">

        <?php foreach ($productos as $producto): ?>

            <?php require __DIR__ . '/../components/producto-card.php'; ?>

        <?php endforeach; ?>

    </div>

</section>