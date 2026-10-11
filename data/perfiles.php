
<?php

$perfiles = [
    [
        'id' => 1,
        'nombre' => 'Administrador',
        'activo' => true,
        'permisos' => [
            'inicio',
            'productos',
            'categorias',
            'marcas',
            'comentarios',
            'usuarios',
            'perfiles'
        ]
    ],
    [
        'id' => 2,
        'nombre' => 'Editor de catálogo',
        'activo' => true,
        'permisos' => [
            'inicio',
            'productos',
            'categorias',
            'marcas'
        ]
    ],
    [
        'id' => 3,
        'nombre' => 'Moderador',
        'activo' => true,
        'permisos' => [
            'inicio',
            'comentarios'
        ]
    ]
];
