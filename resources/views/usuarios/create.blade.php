@extends('masterindex')

@section('content')

<div>

<h1>CREAR USUARIO</h1>
{!!Form::open(['route'=>'user.store', 'method'=>'POST'])!!}
	Nombres:
    	<input type="text" name="nombre" class="form-control">
	Apellidos:<br/>
		<input type="text" name="apellidos" class="form-control">
	Email:<br/>
		<input type="email" name="email" class="form-control">
	Departamento:<br/>
		<select name="depto" class="form-control">
			<option value="0"></option>
			@foreach ($deptos as $depto)
            <option value="{{$depto->id_depto}}">{!!$depto->departamento!!}</option>
			@endforeach
		</select>
	Usuario:<br/>
		<input type="text" name="usuario" class="form-control">
	Tipo de Usuario:<br/>
		<select name="tipo" class="form-control">
			<option value="0"></option>
			@foreach($tipos as $tipo)
             <option value="{{$tipo->id_tipousuario}}">{!!$tipo->tipo!!}</option>  
			@endforeach
		</select>
	Contraseña:<br/>
		<input type="password" name="password" class="form-control">
        <br/>
		<input type="submit" value="Guardar" class="btn btn-success">

{!!Form::close()!!}
</div>

@endsection