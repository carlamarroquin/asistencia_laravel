@extends('masterindex')

@section('content')

<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
      		  <div class="header">
                <h2>
                    MARCACI&Oacute;N
                </h2>
              </div>

			<div class="body">
 				<form method="post" action="{{route('ver.marcacion')}}">
                	<input type="hidden" name="_token" value="{{ csrf_token() }}">
                    	<label for="nombre">Nombre:</label>
		                    <div class="form-group">
		                        <div class="form-line">
		                            <input type="text" name="nombre" id="nombre" class="form-control" readonly="true">
		                        </div>
		                    </div>
		                <div class="form-group">		                       
		                    <div class="col-xs-3">
			                	<label for="nombre">Fecha:</label>
			                	<div class="form-line">
		                            <input type="text" name="fecha" class="form-control" value="{{$date->toFormattedDateString()}}" readonly="true">
		                        </div>
		                    </div>
		                </div>    	
		                 <div class="form-group">
		                    <div class="col-xs-3">
		               			<label for="nombre">Hora:</label>
		               			<div class="form-line">
		                            <input type="text" name="hora" class="form-control" value="{{$date->toTimeString()}}" readonly="true">
		                        </div>
		                    </div>

		                 <div class="form-group">
		                    <div class="col-xs-3">
		               			<label for="nombre">Tipo de Marcaci&oacute;n:</label>
		               			<div class="radio">
		                            <label class="radio-inline">
		                            <input type="radio" value="0" name="optradio">Entrada</label>
									<label class="radio-inline">
									<input type="radio" value="1" name="optradio">Salida</label>
		                        </div>
		                    </div>
		                </div><br/><br/><br/><br/>

		                <div align="center">
					<input type="submit" value="Guardar" class="btn btn-primary">
						</div>
				</form>
			</div>
		</div>
	</div>
</div>



@endsection