<?php


namespace App\Adapters;


use App\Interfaces\ApiPaisesInterface;
use Illuminate\Support\Facades\Http;

class PaisAdapter implements ApiPaisesInterface
{
    private $endpoint;

    public function __construct()
    {
        $this->endpoint = "https://restcountries.com/v3.1/";
    }

    public function listapaises()
    {
        //https://restcountries.com/v3.1/all
        $respuesta = Http::get("{$this->endpoint}all");
        return $respuesta->json();
    }

    public function paisnombre(string $pais)
    {
        //https://restcountries.com/v3.1/name/{name}
        $respuesta = Http::get("{$this->endpoint}name/{$pais}");
        return $respuesta->json();
    }

    public function paiscapital(string $capital)
    {
        //https://restcountries.com/v3.1/capital/{capital}
        $respuesta = Http::get("{$this->endpoint}capital/{$capital}");
        return $respuesta->json();
    }
}
