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
        true,
        'Farmacia',
        'Protección solar',
        'Protector solar de alta protección para todo tipo de pieles.',
        'FPS 50'
    ),

    new Producto(
        2,
        'Shampoo Reparador',
        'L\'Oréal',
        8500,
        4,
        'productos/shampoo-reparador.jpg',
        true,
        'Cuidado personal',
        'Cuidado capilar',
        'Shampoo reparador diseñado para limpiar y cuidar el cabello, ayudando a mantenerlo suave y saludable.',
        'Reparador'    
    ),
    
    new Producto(
        3,
        'Crema Hidratante',
        'Nivea',
        7200,
        4,
        'productos/crema-hidratante.png',
        true,
        'Cuidado personal',
        'Cuidado facial',
        'Crema hidratante para el rostro, ideal para mantener la piel suave y nutrida durante todo el día.',
        'Hidratante'
    ),

    new Producto(
        4,
        'Perfume The Icon',
        'Antonio Banderas',
        32000,
        5,
        'productos/perfume-the-icon.jpg',
        true,
        'Perfumería',
        'Perfumes',
        'Perfume masculino con aroma fresco y duradero, ideal para cualquier ocasión.',
        'The Icon'
    ),

    new Producto(
        5,
        'Agua Micelar',
        'Garnier',
        9400,
        4,
        'productos/agua-micelar.webp',
        true,
        'Cuidado personal',
        'Cuidado facial',
        'Agua micelar que limpia y desmaquilla la piel, eliminando impurezas sin irritarla.',
        'Agua Micelar'
    ),

    new Producto(
        6,
        'Bálsamo Labial',
        'Nivea',
        4500,
        3,
        'productos/balsamo-labial.webp',
        true,
        'Farmacia',
        'Cuidado Labial',
        'Bálsamo para el cuidado diario de los labios, ayudando a mantenerlos suaves e hidratados.',
        'Balsamo Labial'
    )
];