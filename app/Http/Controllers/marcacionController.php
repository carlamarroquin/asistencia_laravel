<?php

namespace App\Http\Controllers;
USE DB;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Auth;
use App\Docente;
use App\Marcacion;
use Session;
use Datatables;

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

    public function AllMarcaciones(){
        return view('marcacion.marcacionesdt');
    }

    public function getDataRowsMarcaciones()
    {
        $marcaciones=Marcacion::getMarcaciones();
        return Datatables::of($marcaciones)
        ->addColumn('tipoMarcacion',function($dt){
            if($dt->tipo==0){
                return '<span class="label label-primary">Entrada</span>';
            }
            else{
                return '<span class="label label-success">Salida</span>';   
            }
        })
        ->make(true);
    }

    public function misMarcaciones(){
        return view ('reportes.misMarcaciones');
    }

    public function getCalendario(){
        $data=['title'=>'Generar Reporte de Marcación',
                'subtitle'=>''];
 
        return view('reportes.marcacionesCalendario');      
    }


    public function getAsistCalendario(){
        $data=['title'=>'Generar Reporte de Marcación',
                'subtitle'=>''];
        
        return view('reportes.asistenciasCalendario');      
    }

    
}

