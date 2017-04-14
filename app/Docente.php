<?php

namespace App;
use DB;

use Illuminate\Database\Eloquent\Model;

class Docente extends Model
{
	
    protected $table='docente';
    protected $primarykey='id_docente';
    
    protected $fillable=['id_usuario','id_depto', 'nombre','apellidos','email','estado'];
    public $timestamps=false;

    public static function getDocentes(){
       return DB::table('docente as doc')
                ->join('departamento as depto','doc.id_depto','=','depto.id_depto')
                ->select('doc.*','depto.departamento')    
                ->where('doc.estado',1)   
                ->get();

    }


    public static function getDocenteActualizar($id){
       return DB::table('docente')->where('id_docente',$id)->get();

    }    

    public static function getUsuarioDocente($id){
    	return DB::table('usuario as u')
    		   ->join('docente as d','u.id_usuario','=','d.id_usuario')
    		   ->select('u.id_usuario')
    		   ->where('d.id_docente',$id)
    		   ->get();
       
    }

    public static function getDocente($id){
    	return DB::table('docente as d')
                    ->join('usuario as u','d.id_usuario','=','u.id_usuario')
                    ->join('departamento as dp','d.id_depto','=','dp.id_depto')
                    ->join('tipo_usuario as tu','u.tipo','=','tu.id_tipousuario')
                    ->select('d.*','u.usuario', 'u.password','tu.id_tipousuario')
                    ->where('d.id_docente',$id)
                    ->get();
    	
    }

      
}
