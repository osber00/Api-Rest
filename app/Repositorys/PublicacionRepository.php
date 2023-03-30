<?php


namespace App\Repositorys;


use App\Models\Publicacion;

class PublicacionRepository
{
    private $model;

    public function __construct()
    {
        $this->model = new Publicacion();
    }

    public function publicaciones()
    {
        return $this->model->with('categoria','user')->get();
    }

    public function publicacion(int $id)
    {
        return $this->model->with('categoria','user')->where('id',$id)->first();
    }

    public function publicacionescategoria($categoria_id, $estado = null)
    {
        $query = $this->model->where('categoria_id',$categoria_id);
        if ($estado != null){
            $query->where('publicada',1);
        }
        return $query->get();
    }

    public function guardarpublicacion(Publicacion $publicacion)
    {
        $publicacion->save();
        return $publicacion;
    }

    public function eliminarpublicacion(Publicacion $publicacion)
    {
        $publicacion->delete();
        return $publicacion;
    }
}
