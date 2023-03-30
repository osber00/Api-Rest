<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UsuariosController extends Controller
{
    public function index()
    {
        $users = User::all();
        return response()->json($users);
    }

    public function estado(int $estado)
    {
        $users = User::where('activo',$estado)->get();
        return response()->json($users);
    }

    public function show(User $user)
    {
        //$user = User::find($user_id);
        return response()->json($user);
    }

    public function store(Request $request)
    {
        $rules = [
            'name' => 'required|string|max:100',
            'email' => 'required|email|max:80|unique:users',
            'password' => 'required|string|min:6'
        ];

        $validacion = Validator::make($request->all(),$rules);

        if ($validacion->fails()){
            return response()->json($validacion->errors());
        }

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();
        return response()->json($user);
    }

    public function update(Request $request, $user)
    {
        $userUpdate = User::find($user);
        $userUpdate->name = $request->name;
        $userUpdate->email = $request->email;
        $userUpdate->save();
        return response()->json($userUpdate);
    }

    public function delete($user)
    {
        $userDelete = User::where('id',$user)->delete();
        return response()->json($userDelete);
    }
}
