<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Docente;
use App\Marcacion;

use DB;

class CalendarController extends Controller
{
    //

    public  function getResources(){

    	$docentes = Docente::get()->toArray();
		$resources = array();
		//dd($docentes[0]);
		for($i=0;$i<count($docentes);$i++) {
			$resources[$i]['id']=$docentes[$i]["id_docente"];
			$resources[$i]['title']=$docentes[$i]["nombre"].' '.$docentes[$i]["apellidos"];
			//$resources[$i]['total']=0;
		}
		return json_encode($resources);

    }

    public function getEvents(){

      $marcaciones = Marcacion::select('idMarcacion','idDocente',DB::raw('CONCAT(fecha,"T",marcacion) as marcacion'),DB::raw('case when tipo=0 then "ENTRADA" when  tipo=1 then "SALIDA" end as tipo'))->get()->toArray();

        $events = array();
        for($i=0;$i<count($marcaciones);$i++) {
        	if($marcaciones[$i]["tipo"]==="ENTRADA"){
				$events[$i]['id']=$marcaciones[$i]["idMarcacion"];
				$events[$i]['resourceId']=$marcaciones[$i]["idDocente"];
				$events[$i]['start']=$marcaciones[$i]["marcacion"];
				$events[$i]['end']=$marcaciones[$i]["marcacion"];
				$events[$i]['title']="";
				$events[$i]['color']='#2EFE2E';
			}
			else{
				$events[$i]['id']=$marcaciones[$i]["idMarcacion"];
				$events[$i]['resourceId']=$marcaciones[$i]["idDocente"];
				$events[$i]['start']=$marcaciones[$i]["marcacion"];
				$events[$i]['end']=$marcaciones[$i]["marcacion"];
				$events[$i]['title']="";
				$events[$i]['color']='#FE642E';
			}
		}
		return json_encode($events);
		
		
    }

    public function getMarcaciones(Request $request){
    	//dd($idDocente);
    	 $marcaciones = Marcacion::getMisMarcaciones($request->id);
    	 $events=array();

    	 for($i=0;$i<count($marcaciones);$i++){
			if($marcaciones[$i]->tipo=='ENTRADA'){
			$events[$i]['color']='#2EFE2E';
			}
			else{ 
			$events[$i]['color']='#FE642E';
			}
			$events[$i]['title']=$marcaciones[$i]->tipo;
			$events[$i]['start']=$marcaciones[$i]->marcacion;
			

    	 }
    	 return json_encode($events);
		

    }

    public  function getAsistResources(Request $request){
    	//dd($request->all());
    	if($request->mes!=0){
    		$time = strtotime($request->mes);

			$mes1 = (int)date('m',$time);
			//dd((int)$mes1);
    		$docentes=Marcacion::getHorasTrabajadasPorMes($mes1);
			$resources = array();
			
			for($i=0;$i<count($docentes);$i++) {
				$resources[$i]['id']=$docentes[$i]->id_docente;
				$resources[$i]['title']=$docentes[$i]->nombre;
				$resources[$i]['total']=$docentes[$i]->horas;
			}
			return $resources;
		}
    }

    public function getAsistEvents(){
    	$marcaciones = Marcacion::getHorasTrabajadas();
      /*select('idMarcacion','idDocente',DB::raw('CONCAT(fecha,"T",marcacion) as marcacion'),DB::raw('case when tipo=0 then "ENTRADA" when  tipo=1 then "SALIDA" end as tipo'))->get()->toArray();
*/
        $events = array();
        for($i=0;$i<count($marcaciones);$i++) {
			//$events[$i]['id']=$marcaciones[$i]["idMarcacion"];
			$events[$i]['resourceId']=$marcaciones[$i]->id_docente;
			$events[$i]['start']=$marcaciones[$i]->fecha;
			$events[$i]['end']=$marcaciones[$i]->fecha;
			$events[$i]['title']=$marcaciones[$i]->horas;
			$events[$i]['color']='#F6AA09';
		}
		return json_encode($events);
    }


  
  
}
