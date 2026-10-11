<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Administración | City Farmac</title>

    <link rel="stylesheet"
          href="<?= BASE_URL ?>/assets/css/global.css?v=<?= filemtime(__DIR__ . '/../../../assets/css/global.css') ?>">

    <link rel="stylesheet"
          href="<?= BASE_URL ?>/assets/css/admin.css?v=<?= filemtime(__DIR__ . '/../../../assets/css/admin.css') ?>">
</head>

<body class="admin-body">

<header class="admin-header">
    <div class="container admin-header-contenido">

        <h1>City Farmac | Administración</h1>

        <a href="<?= BASE_URL ?>/index.php">
            Volver al sitio
        </a>

    </div>
</header>

<?php
$esAcceso = in_array($seccion, ['login', 'registro'], true);
?>

<main class="admin-layout <?= $esAcceso ? 'admin-layout--auth' : '' ?>">

    <?php if (!$esAcceso): ?>

        <aside class="admin-sidebar">

            <h2>Menú</h2>

            <nav aria-label="Navegación administrativa">

                <a href="<?= BASE_URL ?>/admin.php?page=inicio">Inicio</a>
                <a href="<?= BASE_URL ?>/admin.php?page=productos">Productos</a>
                <a href="<?= BASE_URL ?>/admin.php?page=categorias">Categorías</a>
                <a href="<?= BASE_URL ?>/admin.php?page=marcas">Marcas</a>
                <a href="<?= BASE_URL ?>/admin.php?page=comentarios">Comentarios</a>
                <a href="<?= BASE_URL ?>/admin.php?page=usuarios">Usuarios</a>
                <a href="<?= BASE_URL ?>/admin.php?page=perfiles">Perfiles</a>

            </nav>

        </aside>

    <?php endif; ?>

    <section class="admin-content">