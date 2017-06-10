<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Usuario;
use App\Docente;
use DB;
use Session;
use Exception;
use Redirect;
use Yajra\Datatables\Facades\Datatables;
use App\Http\Requests\UsuarioRequest;
use Auth;
use Hash;
class UsuarioController extends Controller
{
    public function store(UsuarioRequest $request){
        
        Usuario::create([
        'usuario'   =>$request['usuario'],
        'password'  =>Hash::make($request->password),
        'tipo'      =>$request['tipo'],
        'correo'    =>$request['email']
        ]);
        
        $user=DB::table('usuario')->orderBy('id','desc')->first();
        Docente::create([
        'id_depto'=>$request['depto'],
        'id_usuario'=>$user->id,
        'nombre'=>$request['nombre'],
        'apellidos'=>$request['apellidos'],
        'email'=>$request['email']
        ]);

        
        return redirect::route('nuevo.usuario')->with('msnExito', 'Nueva Usuario ingresado exitosamente!');


    }

    public function create(){

        $deptos=DB::table('departamento')
                ->where('estado','=','1')->get();

        $tipos=DB::table('tipo_usuario')
                ->where('estado','=','1')->get();
        $data['deptos']=$deptos;
        $data['tipos']=$tipos;
        return view('usuarios.create',$data);
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
        $docente=Docente::find($request['idDocente']);
        $usuario=Usuario::find($docente->id_usuario);

        $docente->id_depto=$request->depto;
        $docente->nombre=$request->nombre;
        $docente->apellidos=$request->apellidos;
        $docente->email=$request->email;
        $docente->estado=$request->estado;
        $docente->save();
         
        $usuario->usuario=$request->usuario;
        $usuario->password=$request->password;
        $usuario->tipo=$request->tipo;
        $usuario->estado=$request->estado;
        $usuario->save();
        Session::flash('message','Usuario actualizado correctamente');
        
        return redirect::route('consultar.docentes');
    }

    public function show($id){
        $user=Docente::getUsuarioDocente($id);
        
        DB::table('docente')->where('id_docente',$id)->delete();
        DB::table('usuario')->where('id_usuario',$user[0]->id_usuario)->delete();
        
        return redirect::route('consultar.docentes');

    }

}