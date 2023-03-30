<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class APIExternaController extends Controller
{
    public function datosexternos()
    {
        $respuesta = Http::get('https://jsonplaceholder.typicode.com/photos');
        return $respuesta->json();
        //return response()->json($respuesta);
    }
}
