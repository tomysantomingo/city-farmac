
<?php

$accionUsuario = $_GET['accion'] ?? 'listar';

if (
    !is_string($accionUsuario) ||
    !in_array($accionUsuario, ['listar', 'crear', 'editar', 'estado'], true)
) {
    $accionUsuario = 'listar';
}

$idUsuario = filter_input(
    INPUT_GET,
    'id',
    FILTER_VALIDATE_INT
);

$usuarioSeleccionado = null;
$mensajeAviso = '';
$perfilesPorId = [];

foreach ($perfiles as $perfil) {
    $perfilesPorId[$perfil['id']] = $perfil['nombre'];
}

foreach ($usuarios as $usuario) {

    if ($usuario['id'] === $idUsuario) {
        $usuarioSeleccionado = $usuario;
        break;
    }
}

if ($accionUsuario === 'estado') {

    $mensajeAviso = $usuarioSeleccionado !== null
        ? 'Acción simulada: el estado del usuario no fue modificado.'
        : 'No se encontró el usuario solicitado.';

    $accionUsuario = 'listar';
}

// Validar que el usuario exista antes de editar
if (
    $accionUsuario === 'editar' &&
    $usuarioSeleccionado === null
) {
    $mensajeAviso = 'No se encontró el usuario solicitado.';
    $accionUsuario = 'listar';
}

// Simular envío del formulario
if (
    $_SERVER['REQUEST_METHOD'] === 'POST' &&
    in_array($accionUsuario, ['crear', 'editar'], true)
) {
    $mensajeAviso = 'Formulario de demostración: los datos no se guardaron.';
}
