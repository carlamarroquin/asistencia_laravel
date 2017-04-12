@extends('masterindex')

@section('content')


<div>

	Nombres:
    	<input type="text" name="nombre" class="form-control">
	Apellidos:<br/>
		<input type="text" name="apellidos" class="form-control">
	Email:<br/>
		<input type="email" name="email" class="form-control">
		<input type="submit" value="Guardar" class="btn btn-success">

</div>

@endsection
