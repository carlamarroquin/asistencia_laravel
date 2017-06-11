@extends('masterindex')

@section('css')
  {!! Html::style('plugins/alertifyjs/css/alertify.min.css') !!}
	{!! Html::style('plugins/alertifyjs/css/themes/default.min.css') !!}
@endsection

@section('content')
<h1>CONTROL DE ASISTENCIA ESCUELA DE ARQUITECTURA</h1>

<div class="row clearfix">

    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header">
                <h2>
                   MARCACI&Oacute;N:
                </h2>
            </div>
            <div class="body">
                <form method="post" id="marcacionFrm" class="form-inline" action="{{route('nueva.marcacion')}}">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    
                <div class="row">
                      <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                        <div class="input-group">
   							          <label>FECHA: </label>
                            <input type="text" name="fecha" id="fecha" class="form-control" value="{{date('Y-m-d')}}" readonly required>
                        </div>
                      </div>
                      <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                        <div class="form-group">
                        	<label for="apellidos">HORA:</label>
                            <input type="text" name="hora" class="form-control" value="{{date('H:i:s')}}" required readonly>
                        </div>
                      </div>
                      <div class="col-lg-4 col-md-3 col-sm-12 col-xs-12">
                        <div class="form-group">
                        	<label>SELECCIONE EL TIPO DE MARCACION:</label>
                          <select name="tipo" id="tipo" class="form-control">
                            <option value="-1"></option>
                            <option value="0">ENTRADA</option>
                            <option value="1">SALIDA</option> 
                          </select>
                        </div>
                      </div>
                      <div class="col-lg-2 col-md-2 col-sm-6 col-xs-6">
                        <div class="form-group">
                          <label></label>
                          <br>
                          <input type="hidden" name="_token" value="{{ csrf_token() }}">
                          <button type="button" id="marcar" name="marcar" class="btn bg-red waves-effect">Marcar</button>
                        </div>
                      </div>     
                </div> 
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
{!! Html::script('plugins/alertifyjs/alertify.min.js') !!}
<script type="text/javascript">

  $(document).ready(function(){
      $('#marcar').click(function(){  
          var tipo=$('#tipo').val();          
          if(tipo==-1){
            alertify.alert("Mensaje de sistema - Error","Debe seleccionar el tipo de marcacion!");
          }
          else{
            $('#marcacionFrm').submit();
          }
      });
  });

</script>
@endsection