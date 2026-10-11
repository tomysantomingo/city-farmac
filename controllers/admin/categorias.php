
<?php

$accionCategoria = $_GET['accion'] ?? 'listar';

if (!is_string($accionCategoria) ||
    !in_array($accionCategoria, ['listar', 'crear', 'editar', 'estado'], true)) {
    $accionCategoria = 'listar';
}

$idPadre = filter_input(INPUT_GET, 'padre', FILTER_VALIDATE_INT) ?: null;
$idCategoria = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT) ?: null;

$categoriasPrincipales = [];
$categoriasVisibles = [];
$categoriaPadre = null;
$categoriaSeleccionada = null;
$avisoCategoria = '';

foreach ($categorias as $categoria) {

   
    if ($categoria['padre_id'] === null) {
        $categoriasPrincipales[] = $categoria;
    }

    if ($categoria['id'] === $idPadre) {
        $categoriaPadre = $categoria;
    }
   
    if ($categoria['id'] === $idCategoria) {
        $categoriaSeleccionada = $categoria;
    }
}

// Validar que el padre sea una categoría principal
if ($idPadre !== null &&
    ($categoriaPadre === null || $categoriaPadre['padre_id'] !== null)) {

    $idPadre = null;
    $categoriaPadre = null;
    $avisoCategoria = 'La categoría solicitada no existe.';
}

// Filtrar la tabla según el padre seleccionado
foreach ($categorias as $categoria) {
    if ($categoria['padre_id'] === $idPadre) {
        $categoriasVisibles[] = $categoria;
    }
}

// Simular activar o inactivar
if ($accionCategoria === 'estado') {

    $avisoCategoria = $categoriaSeleccionada !== null
        ? 'Acción simulada: el estado no fue modificado.'
        : 'No se encontró la categoría.';

    $accionCategoria = 'listar';
}

if ($accionCategoria === 'editar' && $categoriaSeleccionada === null) {
    $avisoCategoria = 'No se encontró la categoría.';
    $accionCategoria = 'listar';
}

// Simular el envío del formulario
if ($_SERVER['REQUEST_METHOD'] === 'POST' &&
    in_array($accionCategoria, ['crear', 'editar'], true)) {

    $avisoCategoria = 'Formulario de demostración: los datos no se guardaron.';
}
