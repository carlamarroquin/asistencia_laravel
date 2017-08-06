<?php

namespace App;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use DB;


class Usuario extends Authenticatable
{	 use Notifiable;
	
     protected $table='usuario';	

     protected $primaryKey='id';
     protected $fillable=['id','usuario','email','password','estado'];

   
    public $timestamps=false; 

}
