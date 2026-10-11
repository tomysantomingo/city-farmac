
<?php

$accionMarca = $_GET['accion'] ?? 'listar';

if (
    !is_string($accionMarca) ||
    !in_array($accionMarca, ['listar', 'crear', 'editar', 'estado'], true)
) {
    $accionMarca = 'listar';
}

$idMarca = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);

$marcaSeleccionada = null;
$avisoMarca = '';


foreach ($marcas as $marca) {

    if ($marca['id'] === $idMarca) {
        $marcaSeleccionada = $marca;
        break;
    }
}

if ($accionMarca === 'estado') {

    if ($marcaSeleccionada !== null) {
        $avisoMarca = 'Acción simulada: el estado de la marca no fue modificado.';
    } else {
        $avisoMarca = 'No se encontró la marca solicitada.';
    }

    $accionMarca = 'listar';
}

if ($accionMarca === 'editar' && $marcaSeleccionada === null) {

    $avisoMarca = 'No se encontró la marca solicitada.';
    $accionMarca = 'listar';
}

// Simular el envío del formulario
if (
    $_SERVER['REQUEST_METHOD'] === 'POST' &&
    in_array($accionMarca, ['crear', 'editar'], true)
) {
    $avisoMarca = 'Formulario de demostración: los datos no se guardaron.';
}
