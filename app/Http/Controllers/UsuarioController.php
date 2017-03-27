<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Usuario;
use App\Docente;
use DB;
use Session;
use Exception;

class UsuarioController extends Controller
{
    public function store(Request $request){
    try{
        Usuario::create([
        'usuario'=>$request['usuario'],
        'password'=>$request['password'],
        'tipo'=>$request['tipo']
        ]);
        
    $user=DB::table('usuario')->orderBy('id_usuario','desc')->first();
        Docente::create([
        'id_depto'=>$request['depto'],
        'id_usuario'=>$user->id_usuario,
        'nombre'=>$request['nombre'],
        'apellidos'=>$request['apellidos'],
        'email'=>$request['email']
        ]);
        Session::flash('Usuario creado con exito');
        return redirect::to('/usuario');
    } catch(Exception $e){
        Session::flash('Ocurrio un error');
        return redirect::to('/usuario');
        }
    }
}