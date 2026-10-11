
<?php

require_once __DIR__ . '/config/config.php';

$seccion = $_GET['page'] ?? 'login';

switch ($seccion) {

    case 'login':
        $vista = __DIR__ . '/views/admin/login.php';
        break;

    case 'registro':
        $vista = __DIR__ . '/views/admin/registro.php';
        break;

    case 'inicio':
        $vista = __DIR__ . '/views/admin/inicio.php';
        break;

    default:
        http_response_code(404);
        require __DIR__ . '/views/public/404.php';
        exit;
}

require __DIR__ . '/views/layouts/admin/header.php';

require $vista;

require __DIR__ . '/views/layouts/admin/footer.php';
