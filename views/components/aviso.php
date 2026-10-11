<?php

$textoAviso = $mensajeAviso ?? '';
$tipo = $tipoAviso ?? 'info';

// Tipos de aviso permitidos
if (!in_array($tipo, ['info', 'exito', 'error'], true)) {
    $tipo = 'info';
}

?>

<?php if (is_string($textoAviso) && $textoAviso !== ''): ?>

    <p
        class="aviso aviso--<?= $tipo ?>"
        role="<?= $tipo === 'error' ? 'alert' : 'status' ?>"
    >
        <?= htmlspecialchars($textoAviso, ENT_QUOTES, 'UTF-8') ?>
    </p>

<?php endif; ?>