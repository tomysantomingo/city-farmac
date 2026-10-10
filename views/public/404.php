
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Error 404 | City Farmac</title>
        <!-- Estilos globales -->
    <link rel="stylesheet" href="<?= BASE_URL ?>/assets/css/global.css?v=<?= filemtime(__DIR__ . '/../../assets/css/global.css') ?>">

    <!-- Estilos de la página 404 -->
    <link rel="stylesheet" href="<?= BASE_URL ?>/assets/css/404.css?v=<?= filemtime(__DIR__ . '/../../assets/css/404.css') ?>">
</head>

<body class="error-body">

    <main class="error-card">
        <h1>404</h1>
        <h2>Página no encontrada</h2>

        <p>
            Lo sentimos, la página que buscás
            no existe o no está disponible.
        </p>

        <a href="<?= BASE_URL ?>/index.php" class="error-button">
            Volver al inicio
        </a>
    </main>

</body>
</html>