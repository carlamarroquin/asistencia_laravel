@extends('masterindex')


@section('content')

<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
      		  <div class="header">
                <h2>
                   INFORME DE ASISTENCIAS MENSUAL
                </h2>
              </div>

			<div class="body">
 				<form  action="{{route('asistenciaPdf')}}" method="POST">
          <div class="form-group row">
                	<input type="hidden" name="_token" value="{{ csrf_token() }}">
                  <div class="col-xs-8">
                    <label>Seleccione el mes para generar el informe:</label>
                    <select class="form-control" name="mes">
                      <option value="1">Enero</option>
                      <option value="2">Febrero</option>
                      <option value="3">Marzo</option>
                      <option value="4">Abril</option>
                      <option value="5">Mayo</option>
                      <option value="6">Junio</option>
                      <option value="7">Julio</option>
                      <option value="8">Agosto</option>
                      <option value="9">Septiembre</option>
                      <option value="10">Octubre</option>
                      <option value="11">Noviembre</option>
                      <option value="12">Diciembre</option>

                    </select>
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
