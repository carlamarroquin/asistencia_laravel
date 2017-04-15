<?php

namespace App;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use DB;
use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
     protected $table='usuario';	
     protected $primarykey='id_docente';
     protected $fillable=['id_usuario','usuario', 'password','estado'];
   
    public $timestamps=false; 

}
