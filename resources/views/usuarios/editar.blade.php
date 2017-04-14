@extends('masterindex')

@section('content')

 <div class="block-header">

{!!Form::open(['route'=>'actualizar.docente', 'method'=>'POST'])!!}
    <input type="hidden" name="idDocente" value="{{$docente[0]->id_docente}}">

	Nombres:
    <input type="text" name="nombre" class="form-control" value="{{$docente[0]->nombre}}">Apellidos:<br/>
		<input type="text" name="apellidos" class="form-control" value="{{$docente[0]->apellidos}}">
	Email:<br/>
		<input type="email" name="email" class="form-control" value="{{$docente[0]->email}}">
	Departamento:<br/>
		<select name="depto" class="form-control">
			@foreach ($deptos as $depto)
              @if($docente[0]->id_depto==$depto->id_depto)
            <option value="{{$depto->id_depto}}" selected>{!!$depto->departamento!!}</option>
			  @else
			<option value="{{$depto->id_depto}}">{!!$depto->departamento!!}</option>
			  @endif
			@endforeach
		</select>
	Usuario:<br/>
		<input type="text" name="usuario" class="form-control" value="{{$docente[0]->usuario}}">
	Tipo de Usuario:<br/>
		<select name="tipo" class="form-control">
		  @foreach($tipos as $tipo)
			@if($docente[0]->id_tipousuario==$tipo->id_tipousuario)
             <option value="{{$tipo->id_tipousuario}}" selected>{!!$tipo->tipo!!} 
             </option>
            @else
             <option value="{{$tipo->id_tipousuario}}">{!!$tipo->tipo!!} 
             </option>
            @endif  
		  @endforeach
		</select>
	Contraseña:<br/>
		<input type="password" name="password" class="form-control" value="{{$docente[0]->password}}">
    Estado:<br/>
		<input type="text" name="estado" class="form-control" value="{{$docente[0]->estado}}">
    
        <br/>
		<input type="submit" value="Guardar" class="btn btn-success">
{!!Form::close()!!}
</div>
@endsection