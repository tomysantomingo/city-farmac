<?php

class Producto
{
    public int $id;
    public string $nombre;
    public string $marca;
    public float $precio;
    public int $ranking;
    public string $imagen;
    public bool $destacado;
    public string $categoria;
    public string $subcategoria;

    public function __construct(
        int $id,
        string $nombre,
        string $marca,
        float $precio,
        int $ranking,
        string $imagen,
        bool $destacado = false,
        string $categoria = 'Sin categoría',
        string $subcategoria = 'General'
    ) {
        $this->id = $id;
        $this->nombre = $nombre;
        $this->marca = $marca;
        $this->precio = $precio;
        $this->ranking = $ranking;
        $this->imagen = $imagen;
        $this->destacado = $destacado;
         $this->categoria = $categoria;
        $this->subcategoria = $subcategoria;
    }
}