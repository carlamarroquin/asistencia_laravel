<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Usuario;
use App\Docente;

class UsuarioController extends Controller
{
    public function store(Request $request){
 
    Usuario::create([
    'usuario'=>$request['usuario'],
    'password'=>$request['password'],
    'tipo'=>$request['tipo']
    ]);
    
    $user=Usuario::all();

    Docente::create([
    'id_depto'=>$request['depto'],
    'id_usuario'=>$user->id->last(),
    'nombre'=>$request['nombre'],
    'apellidos'=>$request['apellidos'],
    'email'=>$request['email']
    ]);

    }
}
