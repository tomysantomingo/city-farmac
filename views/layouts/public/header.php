<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>City Farmac</title>

        <!-- Estilos globales -->
    <link rel="stylesheet" href="<?= BASE_URL ?>/assets/css/global.css?v=<?= filemtime(__DIR__ . '/../../../assets/css/global.css') ?>">

    <!-- Estilos específicos del Home -->
    <?php if ($page === 'home'): ?>
        <link rel="stylesheet" href="<?= BASE_URL ?>/assets/css/home.css?v=<?= filemtime(__DIR__ . '/../../../assets/css/home.css') ?>">
    <?php endif; ?>
</head>

<body>

<header class="header">
    <div class="container">
        <h1 class="logo">
            <a href="<?= BASE_URL ?>/index.php">City Farmac</a>
        </h1>

        <nav>
            <ul class="nav">
                <li>
                    <a href="<?= BASE_URL ?>/index.php">Inicio</a>
                </li>

                <li>
                    <a href="<?= BASE_URL ?>/index.php?page=productos">
                        Productos
                    </a>
                </li>

                <li>
                    <a href="<?= BASE_URL ?>/index.php?page=contacto">
                        Contacto
                    </a>
                </li>

                <li>
                    <a href="<?= BASE_URL ?>/admin.php">
                        Administración
                    </a>
                </li>
            </ul>
        </nav>
    </div>
</header>

<main class="container">