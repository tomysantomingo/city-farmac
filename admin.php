
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

    case 'productos':
    require_once __DIR__ . '/data/productos.php';
    require_once __DIR__ . '/controllers/admin/productos.php';

    $vista = __DIR__ . '/views/admin/productos.php';
    break;

    case 'categorias':
    require_once __DIR__ . '/data/categorias.php';
    require_once __DIR__ . '/controllers/admin/categorias.php';

    $vista = __DIR__ . '/views/admin/categorias.php';
    break;

    case 'marcas':
    require_once __DIR__ . '/data/marcas.php';
    require_once __DIR__ . '/controllers/admin/marcas.php';

    $vista = __DIR__ . '/views/admin/marcas.php';
    break;

    case 'comentarios':
    require_once __DIR__ . '/data/productos.php';
    require_once __DIR__ . '/data/comentarios.php';
    require_once __DIR__ . '/controllers/admin/comentarios.php';

    $vista = __DIR__ . '/views/admin/comentarios.php';
    break;

    case 'usuarios':
    require_once __DIR__ . '/data/usuarios.php';
    require_once __DIR__ . '/data/perfiles.php';
    require_once __DIR__ . '/controllers/admin/usuarios.php';

    $vista = __DIR__ . '/views/admin/usuarios.php';
    break;

    default:
        http_response_code(404);
        require __DIR__ . '/views/public/404.php';
        exit;
}

require __DIR__ . '/views/layouts/admin/header.php';

require $vista;

require __DIR__ . '/views/layouts/admin/footer.php';
