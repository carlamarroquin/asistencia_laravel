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
        return DB::table('asistencia.horas_trab as vw')
        ->select('vw.id_docente', 'vw.fecha', 
            DB::raw("SEC_TO_TIME(SUM(TIME_TO_SEC(vw.horas))) as horas"))
            ->groupBy('vw.fecha','vw.id_docente')
            ->get()->toArray();
        }

    public static function getMisMarcaciones($idUsuario){
     return DB::table('asistencia.marcacion AS mar')
        ->join('asistencia.docente AS doc','mar.idDocente','=','doc.id_docente')
        ->join('asistencia.usuario AS u','u.id','=','doc.id_usuario')
        ->select('mar.idMarcacion','mar.idDocente',DB::raw('concat(doc.nombre," ",doc.apellidos) as docente'),DB::raw('concat(mar.fecha," ",mar.marcacion) as marcacion'), DB::raw('CASE WHEN mar.tipo=0 THEN "ENTRADA" ELSE "SALIDA" END as tipo'))
        ->where('u.id',$idUsuario)->orderBy('mar.idMarcacion')
        ->get()->toArray();
  
    }  

    public static function getHorasTrabajadasPorMes($idMes){
        return DB::table('asistencia.horas_trab as vw')
            ->join('asistencia.docente as d','vw.id_docente','=','d.id_docente')
        	->select('vw.id_docente',Db::raw('CONCAT(d.nombre," ",d.apellidos) as nombre'),DB::raw("MONTH(vw.fecha) as mes"), 
                DB::raw("SEC_TO_TIME(SUM(TIME_TO_SEC(vw.horas))) as horas"))
        	->where(DB::raw("MONTH(vw.fecha)"),$idMes)
            ->groupBy('vw.id_docente')
            ->get()->toArray();
        }  

    public static function getDiasTrabajados($idMes){
        return DB::table('asistencia.horas_trab as vw')
            ->join('asistencia.docente as d','vw.id_docente','=','d.id_docente')
            ->select('vw.id_docente','d.tipo_docente',Db::raw('CONCAT(d.nombre," ",d.apellidos) as nombre'),DB::raw('CONCAT(d.nombre," ",d.apellidos) as nombre'), 
                DB::raw("SEC_TO_TIME(SUM(TIME_TO_SEC(vw.horas))) as horas"),
                DB::raw("CASE WHEN d.tipo_docente=0 THEN HOUR(SEC_TO_TIME(SUM(TIME_TO_SEC(vw.horas)))/8)
     WHEN d.tipo_docente=1 THEN HOUR(SEC_TO_TIME(SUM(TIME_TO_SEC(vw.horas)))/4) 
     WHEN d.tipo_docente=2 THEN 0 END AS dias_trabajados"),
                DB::raw("CASE WHEN d.tipo_docente=0 THEN (HOUR(SEC_TO_TIME(SUM(TIME_TO_SEC(vw.horas)))/8))*100/20
     WHEN d.tipo_docente=1 THEN (HOUR(SEC_TO_TIME(SUM(TIME_TO_SEC(vw.horas)))/4))*100/10
     WHEN d.tipo_docente=2 THEN 0 END AS porcentaje"))
            ->where(DB::raw("MONTH(vw.fecha)"),$idMes)
            ->groupBy('vw.id_docente')
            ->get();
        }
}
