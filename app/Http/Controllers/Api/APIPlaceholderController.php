<?php

namespace App\Http\Controllers\Api;

use App\Adapters\ApiPlaceholderAdapater;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class APIPlaceholderController extends Controller
{

    private $apiPlaceholderAdapater;

    public function __construct(ApiPlaceholderAdapater $apiPlaceholderAdapater)
    {
        $this->apiPlaceholderAdapater = $apiPlaceholderAdapater;
    }

    public function usuarios()
    {
        return $this->apiPlaceholderAdapater->usuarios();
    }

    public function usuario($id)
    {
        return $this->apiPlaceholderAdapater->usuario($id);
    }

    public function publicaciones()
    {
        return $this->apiPlaceholderAdapater->publicaciones();
    }

    public function publicacion($id)
    {
        return $this->apiPlaceholderAdapater->publicacion($id);
    }

    public function fotos()
    {
        return $this->apiPlaceholderAdapater->fotos();
    }

    public function foto($id)
    {
        return $this->apiPlaceholderAdapater->foto($id);
    }
}
