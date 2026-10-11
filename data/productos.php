<?php

require_once __DIR__ . '/../models/Producto.php';

$productos = [
    new Producto(
        1,
        'Protector Solar FPS 50',
        'Dermaglós',
        18500,
        5,
        'productos/protector-solar.webp',
        true
    ),

    new Producto(
        2,
        'Shampoo Reparador',
        'L\'Oréal',
        8500,
        4,
        'productos/shampoo-reparador.jpg',
        true
    ),

    new Producto(
        3,
        'Crema Hidratante',
        'Nivea',
        7200,
        4,
        'productos/crema-hidratante.png',
        true
    ),

    new Producto(
        4,
        'Perfume The Icon',
        'Antonio Banderas',
        32000,
        5,
        'productos/perfume-the-icon.jpg',
        true
    ),

    new Producto(
        5,
        'Agua Micelar',
        'Garnier',
        9400,
        4,
        'productos/agua-micelar.webp',
        true
    ),

    new Producto(
        6,
        'Bálsamo Labial',
        'Nivea',
        4500,
        3,
        'productos/balsamo-labial.webp',
        true
    )
];