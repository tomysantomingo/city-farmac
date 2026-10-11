
<h2>Bienvenido al panel de administración</h2>

<p>
    Desde aquí podrás gestionar las distintas
    secciones de City Farmac.
</p>

<div class="admin-dashboard">

    <?php
    $secciones = [
        'productos' => 'Productos',
        'categorias' => 'Categorías',
        'marcas' => 'Marcas',
        'comentarios' => 'Comentarios',
        'usuarios' => 'Usuarios',
        'perfiles' => 'Perfiles'
    ];
    ?>

    <?php foreach ($secciones as $ruta => $nombre): ?>

        <a class="admin-dashboard-card"
           href="<?= BASE_URL ?>/admin.php?page=<?= $ruta ?>">

            <?= htmlspecialchars($nombre) ?>

        </a>

    <?php endforeach; ?>

</div>

<p class="admin-nota">
    Panel de demostración.
</p>
