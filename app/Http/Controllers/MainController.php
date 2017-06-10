<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;
use Auth;
class MainController extends Controller
{
    public function getLogin(){

		//Verificamos si ya esta logueado de lo contrario se redirige al login
		if(Auth::check()){
			return view('inicio.index'); 
		}else{
			return view('login.login1'); 	
		}
    }

    public function postLogin(Request $request) {  
    	//dd($request->all());
        if(Auth::attempt(['usuario'=>$request['username'], 'password'=>$request['password']])){
  			
  			return redirect()->route('doInicio');
  		}
  		else{
  			return redirect()->route('doLogin')->withErrors(['errors' => 'Usuario y/o Contraseña Invalidos!']);
  		}
    }  
    public function getLogout()
	{
		//Deslogueamos al usuario
		Auth::logout();
		//Redireccion a ruta inicial
		return redirect()->route('doLogin');
	}
	
    public function index()
	{
		
		return view('inicio.index');

	}  
}
