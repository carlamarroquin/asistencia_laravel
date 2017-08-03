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
		}
		return json_encode($resources);

    }

    public function getEvents(){

        $marcaciones = Marcacion::select('idMarcacion','idDocente',DB::raw('CONCAT(fecha,"T",marcacion) as marcacion'),DB::raw('case when tipo=0 then "ENTRADA" when  tipo=1 then "SALIDA" end as tipo'))->get()->toArray();

        $events = array();
        for($i=0;$i<count($marcaciones);$i++) {
			$events[$i]['id']=$marcaciones[$i]["idMarcacion"];
			$events[$i]['resourceId']=$marcaciones[$i]["idDocente"];
			$events[$i]['start']=$marcaciones[$i]["marcacion"];
			$events[$i]['end']=$marcaciones[$i]["marcacion"];
			$events[$i]['title']=$marcaciones[$i]["tipo"];
		}
		return json_encode($events);
		
    }
}
