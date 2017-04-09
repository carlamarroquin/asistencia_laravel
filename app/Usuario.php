<?php

namespace App;
use DB;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Usuario extends Authenticatable
{
   protected $table='usuario';	
   protected $fillable=['id_usuario','usuario', 'password','estado'];
   
    public $timestamps=false; 

}
