<?php


namespace App\Interfaces;


interface ApiPlaceholderInterface
{
    public function usuarios();

    public function usuario(int $id);

    public function publicaciones();

    public function publicacion(int $id);

    public function fotos();

    public function foto(int $id);
}
