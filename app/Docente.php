<?php

namespace App;
use DB;

use Illuminate\Database\Eloquent\Model;

class Docente extends Model
{
	protected $table="docente";

    protected $fillable=['id_docente','id_usuario','id_depto', 'nombre','apellidos','email','estado'];
    public $timestamps=false;

    public static function getDocentes(){
       return DB::table('docente as doc')->where('estado',1)->get();

    }


    public static function getUsuarioDocente($id){
    	return DB::table('usuario as u')
    		   ->join('docente as d','u.id_usuario','=','d.id_usuario')
    		   ->select('u.id_usuario')
    		   ->where('d.id_docente',$id)
    		   ->get();
       
    }

    public static function getDocente($id){
    	return DB::table('docente')->where('id_docente',$id)->get();
    	
    }
}
