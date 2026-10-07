<?php
require_once __DIR__ . '/config/config.php';

require_once __DIR__ . '/data/productos.php';

$page = $_GET['page'] ?? 'home';

require_once __DIR__ . '/views/layouts/public/header.php';

switch ($page) {
    
   case 'home':
    require_once __DIR__ . '/views/public/home.php';
    break;

    default:
        echo '<h2>Página no encontrada</h2>';
        break;
}

require_once __DIR__ . '/views/layouts/public/footer.php';

?>