<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Docente extends Model
{
	protected $table="docente";

    protected $fillable=['id_docente','id_usuario','id_depto', 'nombre','apellidos','email','estado'];
    public $timestamps=false;
}
