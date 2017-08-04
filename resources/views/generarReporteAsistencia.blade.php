@extends('masterindex')


@section('content')

<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
      		  <div class="header">
                <h2>
                   REPORTE DE ASISTENCIA
                </h2>
              </div>

			<div class="body">
 				<form  action="{{route('asistenciaPdf')}}" method="POST">
          <div class="form-group row">
                	<input type="hidden" name="_token" value="{{ csrf_token() }}">
                  <div class="col-xs-8">
                    <label>Periodo</label>
                    <div class="input-daterange input-group" id="date-range">      
                      <span class="input-group-addon text-white" style="background-color: #BDBDBD; border-radius: 5px; padding-left: 10px;"> Desde</span>
                      <input type="text" class="form-control" name="inicio" placeholder="Ingrese fecha Inicial...">
                      <span class="input-group-addon text-white" style="background-color: #BDBDBD; border-radius: 5px; padding-left: 10px; "> Hasta</span>
                      <input type="text" class="form-control" name="fin" placeholder="Ingrese fecha Final...">
                    </div>
                  </div>
                  <div class="col-xs-8">
                        <input type="submit" class="btn btn-danger" value="Generar">
                  </div>
            </div>
        </form>
      </div>
     </div>
    </div>
  </div>

  @endsection
