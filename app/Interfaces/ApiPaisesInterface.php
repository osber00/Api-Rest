<?php


namespace App\Interfaces;


interface ApiPaisesInterface
{
    public function listapaises();

    public function paisnombre(string $pais);

    public function paiscapital(string $capital);
}
