@extends('masterindex')

@section('content')

 <div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
			<div class="body">
                <form method="post" action="{{route('actualizar.docente')}}">
                	<input type="hidden" name="_token" value="{{ csrf_token()}}">
                	<input type="hidden" name="idDocente" value="{{$docente[0]->id_docente}}">
                    <label for="nombre">Nombres:</label>
                    <div class="form-group">
                        <div class="form-line">
                             <input type="text" name="nombre" class="form-control" value="{{$docente[0]->nombre}}">
                        </div>
                    </div>
  
            		<label for="nombre">Apellidos:</label>
                    <div class="form-group">
                        <div class="form-line">
                             <input type="text" name="apellidos" class="form-control" value="{{$docente[0]->apellidos}}">
                        </div>
                    </div>
  					
  					<label for="nombre">Email:</label>
                    <div class="form-group">
                        <div class="form-line">
                             <input type="email" name="email" class="form-control" value="{{$docente[0]->email}}">
                        </div>
                    </div>
  				

  					<label for="nombre">Departamento:</label>
                    <div class="form-group">
                        <div class="form-line">
                            <select name="depto" class="form-control">
								@foreach ($deptos as $depto)
					              @if($docente[0]->id_depto==$depto->id_depto)
						            <option value="{{$depto->id_depto}}" selected>{!!$depto->departamento!!}</option>
								  @else
									<option value="{{$depto->id_depto}}">{!!$depto->departamento!!}</option>
								  @endif
								@endforeach
							</select>
                        </div>
                    </div>	


  					<label for="nombre">Usuario:</label>
                    <div class="form-group">
                        <div class="form-line">
                           	<input type="text" name="usuario" class="form-control" value="{{$docente[0]->usuario}}">
	
                        </div>
                    </div>
  					

  					<label for="nombre">Tipo Usuario:</label>
                    <div class="form-group">
                        <div class="form-line">
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
					    </div>
                    </div>

					<label for="nombre">Contraseña:</label>
                    <div class="form-group">
                        <div class="form-line">
                           	<input type="password" name="password" class="form-control" value="{{$docente[0]->password}}">
                        </div>
                    </div>

                    <label for="nombre">Estado:</label>
                    <div class="form-group">
                        <div class="form-line">
                           <select type="text" name="estado" class="form-control">
					        @if($docente[0]->estado==1)
					    	 <option value="1" selected>Activo</option>
					    	 <option value="0">Inactivo</option>
					        @else
					         <option value="0" selected>Inactivo</option>
					         <option value="1">Activo</option>
					        @endif 
                           </select>
                        </div>
                    </div>
                <div align="center">	    
                <input type="submit" value="Guardar" class="btn btn-success">
                </div>
    	        </form>
	        </div>
                    
		</div>
    </div>
</div>

@endsection