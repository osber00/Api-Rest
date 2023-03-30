<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Publicacion;
use App\Repositorys\PublicacionRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PublicacionesController extends Controller
{

    private $publicacionRepository;

    public function __construct(PublicacionRepository $publicacionRepository)
    {
        $this->publicacionRepository = $publicacionRepository;
    }

    public function index()
    {
        $publicaciones = $this->publicacionRepository->publicaciones();
        return response()->json($publicaciones);
    }

    public function filtrocategoria(Request $request, $categoria, $estado = null)
    {
        //$estado = $request->get('estado');
        $publicaciones = $this->publicacionRepository->publicacionescategoria($categoria,$estado);
        return response()->json($publicaciones);
    }

    public function show(int $id)
    {
        $publicacion = $this->publicacionRepository->publicacion($id);
        return response()->json($publicacion);
    }

    public function store(Request $request)
    {
        $rules = [
            'titulo' => 'required|string|max:50',
            'contenido' => 'required|max:1000',
            'categoria' => 'required|exists:categorias,id',
            'usuario' => 'required|exists:users,id'
        ];

        $validacion = Validator::make($request->all(),$rules);

        if ($validacion->fails()){
            return response()->json($validacion->errors());
        }

        $publicacion = new Publicacion();
        $publicacion->titulo = $request->titulo;
        $publicacion->contenido = $request->contenido;
        $publicacion->categoria_id = $request->categoria;
        $publicacion->user_id = $request->usuario;
        $publicacion->imagen = 'default.jpg';
        $this->publicacionRepository->guardarpublicacion($publicacion);
        return response()->json($publicacion);
    }

    public function update(Request $request, $publicacion)
    {
        $publicacionUpdate = Publicacion::find($publicacion);
        $publicacionUpdate->titulo = $request->titulo;
        $publicacionUpdate->contenido = $request->contenido;
        $publicacionUpdate->categoria_id = $request->categoria;
        $this->publicacionRepository->guardarpublicacion($publicacionUpdate);
        return response()->json($publicacionUpdate);
    }

    public function destroy(int $id)
    {
        $publicacion = $this->publicacionRepository->publicacion($id);
        $this->publicacionRepository->eliminarpublicacion($publicacion);
        return response()->json($publicacion);
    }
}
