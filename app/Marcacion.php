<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;
class Marcacion extends Model
{
    protected $table='marcacion';
    protected $primarykey='idMarcacion';
    protected $fillable=['idDocente','fecha', 'marcacion','tipo'];
    public $timestamps='true';


    public static function getMarcaciones(){
    	$marcaciones=DB::table('asistencia.marcacion as mar')
    	->join('asistencia.docente as doc','mar.idDocente','=','doc.id_docente')
    	->select('mar.idMarcacion','mar.idDocente',DB::raw('concat(doc.nombre," ",doc.apellidos) as docente'),'mar.fecha','mar.marcacion','mar.tipo');

    	return $marcaciones;
    }

    public static function getMarcacionesReporte(){
        $marcaciones=DB::table('asistencia.marcacion AS mar')
        ->join('asistencia.docente AS doc','mar.idDocente','=','doc.id_docente')
        ->select('mar.idMarcacion','mar.idDocente',DB::raw('concat(doc.nombre," ",doc.apellidos) as docente'),'mar.fecha','mar.marcacion', DB::raw('CASE WHEN mar.tipo=0 THEN "ENTRADA" ELSE "SALIDA" END as tipo'))
        ->get();

        return $marcaciones;
    }

    public static function getMarcacionesDocente($idDocente,$fechaInicio,$fechaFin){
        return $docentes=DB::table('asistencia.docente AS doc')
        ->join('asistencia.marcacion AS mar','mar.idDocente','=','doc.id_docente')
        ->select('doc.id_docente', DB::raw('concat(doc.nombre," ",doc.apellidos) as docente'),'mar.fecha','mar.marcacion',
            DB::raw('CASE WHEN mar.tipo=0 THEN "ENTRADA" ELSE "SALIDA" END as tipo'))
        ->where('mar.idDocente',$idDocente)
        ->whereBetween('mar.fecha',[$fechaInicio,$fechaFin])->get();
    }

    public static function getDocentes(){
        return $docentes=DB::table('asistencia.docente AS doc')
        ->select('doc.id_docente', DB::raw('concat(doc.nombre," ",doc.apellidos) as docente'))
        ->where('estado','1')->get();
    }

    public static function getHorasTrabajadas(){
        return DB::table('asistencia.vw_horas_trab AS vw')
        ->select('vw.id_docente','vw.nombre', DB::raw("DAYOFWEEK(vw.fecha) as indexDia"),
            DB::raw("(CASE WHEN DAYOFWEEK(vw.fecha)=1 THEN 'D'
                          WHEN DAYOFWEEK(vw.fecha)=2 THEN 'L'
                          WHEN DAYOFWEEK(vw.fecha)=3 THEN 'M'
                          WHEN DAYOFWEEK(vw.fecha)=4 THEN 'M'
                          WHEN DAYOFWEEK(vw.fecha)=5 THEN 'J'
                          WHEN DAYOFWEEK(vw.fecha)=6 THEN 'V'
                          ELSE 'S' END) as dia"),'vw.fecha', 
            DB::raw("SEC_TO_TIME(SUM(TIME_TO_SEC(vw.HORAS))) as horas"))
            ->groupBy('vw.fecha')
            ->get();
        }

}
