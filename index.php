<?php

require_once __DIR__ . '/config/config.php';
require_once __DIR__ . '/data/productos.php';

// Obtener la página solicitada
$page = $_GET['page'] ?? 'home';

// Determinar qué vista mostrar
switch ($page) {
    case 'home':
        $vista = __DIR__ . '/views/public/home.php';
        break;

    default:
    http_response_code(404);
    require __DIR__ . '/views/public/404.php';
    exit;
}

// Cargar el layout público
require_once __DIR__ . '/views/layouts/public/header.php';

// Mostrar la vista seleccionada
require $vista;

// Cerrar el layout público
require_once __DIR__ . '/views/layouts/public/footer.php';