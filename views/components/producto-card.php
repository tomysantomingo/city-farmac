
<article class="producto-card">

    <img
        src="<?= BASE_URL ?>/assets/img/<?= htmlspecialchars($producto->imagen) ?>"
        alt="<?= htmlspecialchars($producto->nombre) ?>"
    >

    <h3><?= htmlspecialchars($producto->nombre) ?></h3>

    <p><?= htmlspecialchars($producto->marca) ?></p>

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