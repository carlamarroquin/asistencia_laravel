<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Usuario;
use App\Docente;
use DB;
use Session;
use Exception;
use Yajra\Datatables\Facades\Datatables;


class UsuarioController extends Controller
{
    public function store(Request $request){
        Usuario::create([
        'usuario'=>$request['usuario'],
        'password'=>$request['password'],
        'tipo'=>$request['tipo']
        ]);
        
        $user=DB::table('usuario')->orderBy('id_usuario','desc')->first();
        Docente::create([
        'id_depto'=>$request['depto'],
        'id_usuario'=>$user->id_usuario,
        'nombre'=>$request['nombre'],
        'apellidos'=>$request['apellidos'],
        'email'=>$request['email']
        ]);
        Session::flash('Usuario creado con exito');
        return redirect::to('/usuario');
    }

    public function index(){
        $docentes=Docente::getDocentes();
        $data['docentes']=$docentes;
        return view('usuarios.index',$data);

    }

    public function getDataRowsDocentes(){
        $users=Docente::getDocentes();
        return Datatables::of($users)->make(true);
        
    }

    public function edit($id){
        $deptos=DB::table('departamento')
                ->where('estado','=','1')->get();

        $tipos=DB::table('tipo_usuario')
                ->where('estado','=','1')->get();
        $data['deptos']=$deptos;
        $data['tipos']=$tipos;
        
        $docente=Docente::getDocente($id);
        $data['docente']=$docente;

        return view('usuarios.editar',$data);
    }

    public function update(Request $request){

        $docente=Docente::getDocenteActualizar($request['idDocente']);
        $docente[0]->id_depto=$request->depto;
        $docente[0]->nombre=$request->nombre;
        $docente[0]->apellidos=$request->apellidos;
        $docente[0]->email=$request->email;
        $docente[0]->estado=$request->estado;
        $docente->save();
        dd($docente);

        $usuario=Docente::getUsuarioDocente();

    }
}