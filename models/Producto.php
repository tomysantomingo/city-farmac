<?php

class Producto
{
    public int $id;
    public string $nombre;
    public string $marca;
    public float $precio;
    public int $ranking;
    public string $imagen;

    public function __construct(
        int $id,
        string $nombre,
        string $marca,
        float $precio,
        int $ranking,
        string $imagen
    ) {
        $this->id = $id;
        $this->nombre = $nombre;
        $this->marca = $marca;
        $this->precio = $precio;
        $this->ranking = $ranking;
        $this->imagen = $imagen;
    }
}