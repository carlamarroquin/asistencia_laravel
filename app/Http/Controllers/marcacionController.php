<?php

namespace App\Http\Controllers;
USE DB;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Auth;
use App\Docente;
use App\Marcacion;
use Session;
class marcacionController extends Controller
{
    public function createMarcacion(Request $request){


    	DB::beginTransaction();
    	try{
    	$docente=Docente::where('id_usuario',Auth::user()->id)->first();
    	$marcacion = new Marcacion();
    	$marcacion->idDocente=$docente->id_docente;
    	$marcacion->fecha=$request->fecha;
    	$marcacion->marcacion=$request->hora;
    	$marcacion->tipo=$request->tipo;
    	$marcacion->save();
    	}
    	catch(Exception $e){
			DB::rollback();
			throw $e;
			Session::flash($e->getMessage());
			return back();
		}  
		DB::commit();
    	Session::flash('msnExito','Se ha ingresado su marcacion exitosamente!');
    	return redirect()->route('doInicio');	
    	

    }


}
