<?php


namespace App\Adapters;


use App\Interfaces\ApiPlaceholderInterface;
use Illuminate\Support\Facades\Http;

class ApiPlaceholderAdapater implements ApiPlaceholderInterface
{
    private $endpoint;
    public function __construct()
    {
        $this->endpoint = "https://jsonplaceholder.typicode.com/";
    }

    public function usuarios()
    {
        $respuesta = Http::get("{$this->endpoint}users");
        return $respuesta->json();
    }

    public function usuario(int $id)
    {
        $respuesta = Http::get("{$this->endpoint}users/{$id}");
        return $respuesta->json();
    }

    public function publicaciones()
    {
       $respuesta = Http::get("{$this->endpoint}posts");
       return $respuesta->json();
    }

    public function publicacion(int $id)
    {
        $respuesta = Http::get("{$this->endpoint}posts/{$id}");
        return $respuesta->json();
    }

    public function fotos()
    {
        $respuesta = Http::get("{$this->endpoint}photos");
        return $respuesta->json();
    }

    public function foto(int $id)
    {
        $respuesta = Http::get("{$this->endpoint}photos/{$id}");
        return $respuesta->json();
    }
}
