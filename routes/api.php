<?php

use App\Http\Controllers\Api\APIExternaController;
use App\Http\Controllers\Api\APIPaisController;
use App\Http\Controllers\Api\APIPlaceholderController;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\PublicacionesController;
use App\Http\Controllers\Api\UsuariosController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware(['auth:sanctum'])->group(function (){
    Route::get('usuarios', [UsuariosController::class, 'index']);
    Route::get('publicaciones', [PublicacionesController::class, 'index']);
    Route::get('publicaciones/categoria/{categoria}/{estado?}',[PublicacionesController::class,'filtrocategoria']);
    Route::get('publicaciones/{id}',[PublicacionesController::class,'show']);
    Route::post('publicaciones',[PublicacionesController::class,'store']);
    Route::put('publicaciones/{publicacion}',[PublicacionesController::class, 'update']);
    Route::delete('publicaciones/{id}',[PublicacionesController::class,'destroy']);

    Route::get('datosexternos',[APIExternaController::class,'datosexternos']);
});

Route::middleware(['auth:sanctum','abilities:user:premium'])->group(function (){
    Route::get('usuariosph', [APIPlaceholderController::class, 'usuarios']);
    Route::get('usuariosph/{id}', [APIPlaceholderController::class, 'usuario']);
    Route::get('publicacionesph', [APIPlaceholderController::class, 'publicaciones']);
    Route::get('publicacionesph/{id}', [APIPlaceholderController::class, 'publicacion']);
    Route::get('fotosph', [APIPlaceholderController::class, 'fotos']);
    Route::get('fotosph/{id}', [APIPlaceholderController::class, 'foto']);
});

Route::post('login', [AuthController::class,'login']);

Route::get('usuarios/{user}', [UsuariosController::class, 'show']);
Route::get('usuariosestados/{estado}', [UsuariosController::class, 'estado']);
Route::post('usuarios', [UsuariosController::class, 'store']);
Route::put('usuarios/{user}', [UsuariosController::class, 'update']);
Route::delete('usuarios/{user}', [UsuariosController::class, 'delete']);

Route::get('paises',[APIPaisController::class, 'getPaises']);
Route::get('paisnombre/{pais}',[APIPaisController::class, 'getPaisNombre']);
Route::get('paiscapital/{capital}',[APIPaisController::class, 'getPaisCapital']);
