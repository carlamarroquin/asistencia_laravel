<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Marcacion extends Model
{
    protected $table='marcacion';
    protected $primarykey='idMarcacion';
    protected $fillable=['idDocente','fecha', 'marcacion','tipo'];
    public $timestamps='true';

}
