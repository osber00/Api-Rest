<?php

namespace App\Http\Controllers\Api;

use App\Adapters\PaisAdapter;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class APIPaisController extends Controller
{
    private $paisAdapter;

    public function __construct(PaisAdapter $paisAdapter)
    {
        $this->paisAdapter = $paisAdapter;
    }

    public function getPaises()
    {
        return $this->paisAdapter->listapaises();
    }

    public function getPaisNombre(string $pais)
    {
        return $this->paisAdapter->paisnombre($pais);
    }

    public function getPaisCapital(string $capital)
    {
        return $this->paisAdapter->paiscapital($capital);
    }
}
