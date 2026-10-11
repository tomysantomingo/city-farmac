<?php

// Obtener el ID del producto solicitado
$idProducto = filter_input(
    INPUT_GET,
    'id',
    FILTER_VALIDATE_INT
);

$productoDetalle = null;

// Buscar el producto
foreach ($productos as $producto) {

    if ($producto->id === $idProducto) {
        $productoDetalle = $producto;
        break;
    }
}

$comentariosAprobados = [];

if ($productoDetalle !== null) {

    require __DIR__ . '/../data/comentarios.php';

    foreach ($comentarios as $comentario) {

        if (
            $comentario['producto_id'] === $productoDetalle->id
            && $comentario['aprobado'] === true
        ) {
            $comentariosAprobados[] = $comentario;
        }
    }
}