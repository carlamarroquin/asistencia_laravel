<?php

namespace App\Http\Controllers;
USE DB;
use Carbon\Carbon;
use Illuminate\Http\Request;

class marcacionController extends Controller
{
    public function create(){
    	$date=Carbon::now();
    	$data['date']=$date;
    	return view('marcacion.marcacion',$data);
    }
}
