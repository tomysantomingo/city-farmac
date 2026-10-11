<?php

$leerFiltro = function (string $nombre): string {
    $valor = $_GET[$nombre] ?? '';
    return is_string($valor) ? trim($valor) : '';
};

$categoriaActual = $leerFiltro('categoria');
$subcategoriaActual = $leerFiltro('subcategoria');
$marcaActual = $leerFiltro('marca');
$ordenActual = $leerFiltro('orden');

$ordenesPermitidos = ['destacados', 'ranking', 'az', 'za'];

if (!in_array($ordenActual, $ordenesPermitidos, true)) {
    $ordenActual = 'destacados';
}

// Obtener categorías, subcategorías y marcas disponibles
$categorias = [];
$marcas = [];

foreach ($productos as $producto) {
    $categorias[$producto->categoria][$producto->subcategoria] = true;
    $marcas[$producto->marca] = true;
}

ksort($categorias);
ksort($marcas);

foreach ($categorias as &$subcategorias) {
    ksort($subcategorias);
}
unset($subcategorias);

// Aplicar los filtros
$productosFiltrados = array_filter(
    $productos,
    function ($producto) use (
        $categoriaActual,
        $subcategoriaActual,
        $marcaActual
    ) {
        return
            ($categoriaActual === '' || $producto->categoria === $categoriaActual)
            &&
            ($subcategoriaActual === '' || $producto->subcategoria === $subcategoriaActual)
            &&
            ($marcaActual === '' || $producto->marca === $marcaActual);
    }
);

// Ordenar
usort($productosFiltrados, function ($a, $b) use ($ordenActual) {
    return match ($ordenActual) {
        'ranking' => $b->ranking <=> $a->ranking,
        'az' => strcasecmp($a->nombre, $b->nombre),
        'za' => strcasecmp($b->nombre, $a->nombre),
        default => ($b->destacado <=> $a->destacado)
                   ?: ($a->id <=> $b->id)
    };
});

// Construir enlaces de categorías conservando marca y orden
$crearEnlaceCategoria = function (
    string $categoria = '',
    string $subcategoria = ''
) use ($marcaActual, $ordenActual): string {

    $parametros = ['page' => 'productos'];

    if ($categoria !== '') {
        $parametros['categoria'] = $categoria;
    }

    if ($subcategoria !== '') {
        $parametros['subcategoria'] = $subcategoria;
    }

    if ($marcaActual !== '') {
        $parametros['marca'] = $marcaActual;
    }

    if ($ordenActual !== 'destacados') {
        $parametros['orden'] = $ordenActual;
    }

    return BASE_URL . '/index.php?' . http_build_query($parametros);
};