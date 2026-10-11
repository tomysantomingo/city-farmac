
<?php


$estadoActual = $_GET['estado'] ?? 'todos';

if (
    !is_string($estadoActual) ||
    !in_array($estadoActual, ['todos', 'activos', 'inactivos'], true)
) {
    $estadoActual = 'todos';
}


$productoActual = filter_input(
    INPUT_GET,
    'producto',
    FILTER_VALIDATE_INT
);

if (!is_int($productoActual) || $productoActual < 1) {
    $productoActual = null;
}


$accionComentario = $_GET['accion'] ?? '';

if (
    !is_string($accionComentario) ||
    !in_array($accionComentario, ['aprobar', 'desaprobar'], true)
) {
    $accionComentario = '';
}

$idComentario = filter_input(
    INPUT_GET,
    'id',
    FILTER_VALIDATE_INT
);


$mensajeAviso = '';
$comentarioSeleccionado = null;
$productosPorId = [];


foreach ($productos as $producto) {
    $productosPorId[$producto->id] = $producto->nombre;
}


foreach ($comentarios as $comentario) {

    if ($comentario['id'] === $idComentario) {
        $comentarioSeleccionado = $comentario;
        break;
    }
}

// Simular aprobación o desaprobación
if ($accionComentario !== '') {

    if ($comentarioSeleccionado === null) {

        $mensajeAviso = 'No se encontró el comentario solicitado.';

    } else {

        $mensajeAviso = 'Acción simulada: el estado del comentario no fue modificado.';

    }
}


$comentariosFiltrados = array_filter(
    $comentarios,
    function ($comentario) use ($estadoActual, $productoActual) {

        $coincideEstado = true;
        $coincideProducto = true;

        if ($estadoActual === 'activos') {
            $coincideEstado = $comentario['aprobado'] === true;
        }

        if ($estadoActual === 'inactivos') {
            $coincideEstado = $comentario['aprobado'] === false;
        }

        if ($productoActual !== null) {
            $coincideProducto =
                $comentario['producto_id'] === $productoActual;
        }

        return $coincideEstado && $coincideProducto;
    }
);

// Crear enlaces de acciones conservando los filtros
$crearEnlaceComentario = function (array $comentario) use (
    $estadoActual,
    $productoActual
): string {

    $parametros = [
        'page' => 'comentarios',
        'accion' => $comentario['aprobado'] ? 'desaprobar' : 'aprobar',
        'id' => $comentario['id'],
        'estado' => $estadoActual
    ];

    if ($productoActual !== null) {
        $parametros['producto'] = $productoActual;
    }

    return BASE_URL . '/admin.php?' . http_build_query($parametros);
};
