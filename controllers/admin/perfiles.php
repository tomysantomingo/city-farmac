
<?php

$accionPerfil = $_GET['accion'] ?? 'listar';

if (
    !is_string($accionPerfil) ||
    !in_array($accionPerfil, ['listar', 'crear', 'editar', 'estado'], true)
) {
    $accionPerfil = 'listar';
}

$idPerfil = filter_input(
    INPUT_GET,
    'id',
    FILTER_VALIDATE_INT
);

$perfilSeleccionado = null;
$mensajeAviso = '';

// Secciones disponibles en el panel administrativo
$seccionesDisponibles = [
    'inicio' => 'Inicio',
    'productos' => 'Productos',
    'categorias' => 'Categorías',
    'marcas' => 'Marcas',
    'comentarios' => 'Comentarios',
    'usuarios' => 'Usuarios',
    'perfiles' => 'Perfiles'
];


foreach ($perfiles as $perfil) {

    if ($perfil['id'] === $idPerfil) {
        $perfilSeleccionado = $perfil;
        break;
    }
}

if ($accionPerfil === 'estado') {

    $mensajeAviso = $perfilSeleccionado !== null
        ? 'Acción simulada: el estado del perfil no fue modificado.'
        : 'No se encontró el perfil solicitado.';

    $accionPerfil = 'listar';
}

if (
    $accionPerfil === 'editar' &&
    $perfilSeleccionado === null
) {
    $mensajeAviso = 'No se encontró el perfil solicitado.';
    $accionPerfil = 'listar';
}

// Simular el envío del formulario
if (
    $_SERVER['REQUEST_METHOD'] === 'POST' &&
    in_array($accionPerfil, ['crear', 'editar'], true)
) {
    $mensajeAviso = 'Formulario de demostración: los datos no se guardaron.';
}
