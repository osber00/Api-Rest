<?php

namespace Database\Seeders;

use App\Models\Categoria;
use App\Models\Publicacion;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DataInicialSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->usuarios();
        $this->categorias();
        $this->publicaciones();
    }

    protected function usuarios()
    {
        for ($i = 1; $i <= 10; $i++)
        {
            User::create([
                'name' => 'Usuario '.$i,
                'email' => 'usuario'.$i.'@email.com',
                'password' => Hash::make('usuario'.$i),
                'activo' => rand(0,1)
            ]);
        }
    }

    protected function categorias()
    {
        for ($i = 1; $i <= 3; $i++)
        {
            Categoria::create([
                'categoria' => 'Categoria '.$i
            ]);
        }
    }

    protected function publicaciones()
    {
        for ($i = 1; $i <= 10; $i++)
        {
            Publicacion::create([
                'titulo' => 'Título '.$i,
                'contenido' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse sem lectus, pretium at iaculis commodo, tincidunt eu arcu. Curabitur nulla nisl, dignissim quis urna ac, congue cursus purus. Mauris metus est, hendrerit in dui at, pulvinar elementum neque. Maecenas mollis felis vitae massa ullamcorper sodales. Donec condimentum est sit amet massa facilisis tempus',
                'imagen' => 'default.jpg',
                'user_id' => rand(1,5),
                'categoria_id' => rand(1,3),
                'publicada' => rand(0,1)
            ]);
        }
    }
}
