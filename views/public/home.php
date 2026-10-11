
<section class="hero">
    <h2>Bienvenido a City Farmac</h2>

    <p>
        Encontrá productos de farmacia, perfumería
        y cuidado personal.
    </p>
</section>

<section class="productos-destacados">

    <h2>Productos destacados</h2>

    <div class="productos-grid">

        <?php foreach ($productos as $producto): ?>

            <?php require __DIR__ . '/../components/producto-card.php'; ?>

        <?php endforeach; ?>

    </div>

</section>