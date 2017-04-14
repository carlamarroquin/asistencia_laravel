@extends('masterindex')

@section('content')


<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header">
                <h2>
                    CREACI&Oacute;N DE USUARIOS
                </h2>
            </div>
            <div class="body">
                <form method="post" action="{{route('crear.usuario')}}" >
                    <label for="email_address">Nombres:</label>
                    <div class="form-group">
                        <div class="form-line">
                            <input type="text" name="nombre" id="nombre" class="form-control">
                        </div>
                    </div>

                    <label for="email_address">Apellidos:</label>
                    <div class="form-group">
                        <div class="form-line">
                            <input type="text" name="apellidos" class="form-control">
                        </div>
                    </div>

                    <label for="email_address">Correo:</label>
                    <div class="form-group">
                        <div class="form-line">
                            <input type="email" name="email" class="form-control">
                        </div>
                    </div>
					
					<label for="email_address">Departamento:</label>
                    <div class="form-group">
                        <div class="form-line">
                            <select name="depto" class="form-control">
								<option value="0"></option>
									@foreach ($deptos as $depto)
						            <option value="{{$depto->id_depto}}">{!!$depto->departamento!!}</option>
									@endforeach
							</select>
                        </div>
                    </div>
					
					<label for="email_address">Usuario:</label>
                    <div class="form-group">
                        <div class="form-line">
                        	<input type="text" name="usuario" class="form-control">
                        </div>
                    </div>
					
					<label for="email_address">Tipo de Usuario:</label>
                    <div class="form-group">
                        <div class="form-line">
                        	<select name="tipo" class="form-control">
								<option value="0"></option>
									@foreach($tipos as $tipo)
			             				<option value="{{$tipo->id_tipousuario}}">{!!$tipo->tipo!!}</option>  
									@endforeach
							</select>
                        </div>
                    </div>

                    <label for="email_address">Contraseña:</label>
                    <div class="form-group">
                        <div class="form-line">
                        	<input type="password" name="password" class="form-control">
                        </div>
                    </div>
                    <div align="center">
					<input type="submit" value="Guardar" class="btn btn-primary">
					</div>
                </form>
            </div>
        </div>
    </div>
</div>


@endsection