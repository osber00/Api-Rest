<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $credenciales = ['email'=>$request->email,'password'=>$request->password,'activo'=>1];
        if (!Auth::attempt($credenciales))
        {
            return response()->json(['No autorizado'],401);
        }
        $user = User::where('email',$request->email)->firstOrFail();
        $token = $user->createToken('auth_token',['user:premium'])->plainTextToken;
        $data = ['mensaje'=> 'Hola '.$user->name,'usuario'=> $user,'accessToken'=>$token,'token_type'=>'Bearer'];
        return response()->json($data);
    }
}
