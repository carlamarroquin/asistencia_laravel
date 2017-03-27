<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function getCrearUsuario(){
    	$deptos=DB::table('departamento')
    	        ->where('estado','=','1')->get();

    	$tipos=DB::table('tipo_usuario')
    			->where('estado','=','1')->get();
    	$data['deptos']=$deptos;
    	$data['tipos']=$tipos;
    	return view('usuarios.create',$data);
    }
}
