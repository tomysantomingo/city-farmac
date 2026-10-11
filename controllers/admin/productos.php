
<?php

// Obtener filtros de forma segura desde la URL
$obtenerParametro = function (string $nombre): string {
    $valor = $_GET[$nombre] ?? '';
    return is_string($valor) ? trim($valor) : '';
};

$categoriaActual = $obtenerParametro('categoria');
$subcategoriaActual = $obtenerParametro('subcategoria');
$accionAdmin = $obtenerParametro('accion') ?: 'listar';

// Acciones permitidas
if (!in_array($accionAdmin, ['listar', 'crear', 'editar', 'estado'], true)) {
    $accionAdmin = 'listar';
}

// Preparar categorías y subcategorías
$categoriasAdmin = [];
$subcategoriasAdmin = [];

foreach ($productos as $producto) {
    $categoriasAdmin[$producto->categoria] = true;
    $subcategoriasAdmin[$producto->subcategoria] = true;
}

$categoriasAdmin = array_keys($categoriasAdmin);
$subcategoriasAdmin = array_keys($subcategoriasAdmin);

sort($categoriasAdmin);
sort($subcategoriasAdmin);

// Filtrar productos para la tabla
$productosAdmin = array_filter(
    $productos,
    function ($producto) use ($categoriaActual, $subcategoriaActual) {
        return
            ($categoriaActual === '' || $producto->categoria === $categoriaActual)
            &&
            ($subcategoriaActual === '' || $producto->subcategoria === $subcategoriaActual);
    }
);

// Buscar producto para editar o simular una acción
$idProducto = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
$productoSeleccionado = null;

foreach ($productos as $producto) {
    if ($producto->id === $idProducto) {
        $productoSeleccionado = $producto;
        break;
    }
}

$avisoAdmin = '';

//activar/inactivar - simular
if ($accionAdmin === 'estado') {
    $avisoAdmin = $productoSeleccionado !== null
        ? 'Acción simulada: el estado del producto no fue modificado.'
        : 'No se encontró el producto solicitado.';

    $accionAdmin = 'listar';
}

// Comprobar que el producto exista antes de editar
if ($accionAdmin === 'editar' && $productoSeleccionado === null) {
    $avisoAdmin = 'No se encontró el producto solicitado.';
    $accionAdmin = 'listar';
}

// Simulación del envío del formulario
if (
    $_SERVER['REQUEST_METHOD'] === 'POST'
    && in_array($accionAdmin, ['crear', 'editar'], true)
) {
    $avisoAdmin = 'Formulario de demostración: los datos no se guardaron.';
}
