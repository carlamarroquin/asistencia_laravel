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
}
