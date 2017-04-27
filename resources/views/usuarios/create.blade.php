@extends('masterindex')

@section('content')


{{-- MENSAJE ERROR VALIDACIONES --}}
@if($errors->any())
    <div class="alert alert-warning square fade in alert-dismissable">
        <button class="close" aria-hidden="true" data-dismiss="alert" type="button">x</button>
        <strong>Oops!</strong>
        Debes corregir los siguientes errores para poder continuar      
        <ul class="inline-popups">
            @foreach ($errors->all() as $error)
                <li  class="alert-link">{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
{{-- MENSAJE DE EXITO --}}
@if(Session::has('msnExito'))
    <div class="alert alert-success square fade in alert-dismissable">
        <button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
        <strong>Enhorabuena!</strong>
        {{ Session::get('msnExito') }}
    </div>
@endif
{{-- MENSAJE DE ERROR --}}
@if(Session::has('msnError'))
    <div class="alert alert-danger square fade in alert-dismissable">
        <button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
        <strong>Auchh!</strong>
        Algo ha salido mal. {{ Session::get('msnError') }}
    </div>
@endif


<div class="row clearfix">

    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header">
                <h2>
                    CREACI&Oacute;N DE USUARIOS
                </h2>
            </div>
            <div class="body">
                <form method="post" action="{{route('crear.usuario')}}">
                <div class="row">
                      <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                        <label for="nombre">Nombres:</label>
                        <div class="form-group">
                            <div class="form-line">
                                <input type="text" name="nombre" id="nombre" class="form-control" required>
                            </div>
                        </div>
                      </div>
                      <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                        <label for="apellidos">Apellidos:</label>
                        <div class="form-group">
                            <div class="form-line">
                                <input type="text" name="apellidos" class="form-control" required>
                            </div>
                        </div>
                      </div>    
                </div>
                <div class="row">

                      <div class="col-lg-8 col-md-8 col-sm-10 col-xs-12">
                        <label for="email_address">Correo:</label>
                        <div class="form-group">
                            <div class="form-line">
                                <input type="email" name="email" class="form-control" required>
                            </div>
                        </div>
                      </div>  
    				  <div class="col-lg-4 col-md-4 col-sm-10 col-xs-12">	
    					<label for="depto">Departamento:</label>
                        <div class="form-group ">
                                <select name="depto" class="form-control show-tick" required>
    								<option value="0"></option>
    									@foreach ($deptos as $depto)
    						            <option value="{{$depto->id_depto}}">{!!$depto->departamento!!}</option>
    									@endforeach
    							</select>
                        </div>
                      </div>
    				</div> 
                    <div class="row">
                          <div class="col-lg-4 col-md-4 col-sm-10 col-xs-12">  
        					<label for="email_address">Usuario:</label>
                            <div class="form-group">
                                <div class="form-line">
                                	<input type="text" name="usuario" class="form-control" required>
                                </div>
                            </div>
                          </div>  
        				  <div class="col-lg-4 col-md-4 col-sm-10 col-xs-12">	
        					<label for="email_address">Tipo de Usuario:</label>
                            <div class="form-group">
                                <div class="form-line">
                                	<select name="tipo" class="form-control" required>
        								<option value="0"></option>
        									@foreach($tipos as $tipo)
        			             				<option value="{{$tipo->id_tipousuario}}">{!!$tipo->tipo!!}</option>  
        									@endforeach
        							</select>
                                </div>
                            </div>
                          </div>  
                          <div class="col-lg-4 col-md-4 col-sm-10 col-xs-12">
                            <label for="email_address">Contraseña:</label>
                            <div class="form-group">
                                <div class="form-line">
                                	<input type="password" name="password" class="form-control" required>
                                </div>
                            </div>
                          </div>  
                    </div>
                    <div align="center">
                     <input type="hidden" name="_token" value="{{ csrf_token() }}">
					<input type="submit" value="Guardar" class="btn btn-primary">
					</div>
                </form>
            </div>
        </div>
    </div>
</div>


@endsection