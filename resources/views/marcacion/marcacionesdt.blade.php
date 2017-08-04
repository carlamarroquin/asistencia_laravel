@extends('masterindex')

@section('css')
<style type="text/css">
	td.details-control {
    	background: url("{{ asset('/plugins/datatable/images/details_open.png') }}") no-repeat center center;
    	cursor: pointer;
	}
	tr.shown td.details-control {
    	background: url("{{ asset('/plugins/datatable/images/details_close.png') }}") no-repeat center center;
	}
</style>
@endsection

@section('content')
{{-- MENSAJE DE EXITO --}}
@if(Session::has('msnExito'))
	<div class="alert alert-success square fade in alert-dismissable">
		<button class="close" aria-hidden="true" data-dismiss="alert" type="button">x</button>
		<strong>Enhorabuena!</strong>
		{{ Session::get('msnExito') }}
	</div>
@endif
{{-- MENSAJE DE ERROR --}}
@if(Session::has('msnError'))
	<div class="alert alert-danger square fade in alert-dismissable">
		<button class="close" aria-hidden="true" data-dismiss="alert" type="button">x</button>
		<strong>Auchh!</strong>
		Algo ha salido mal.	{{ Session::get('msnError') }}
	</div>
@endif

  <div class="card row" style="padding: 2%;">
   <h5>LISTADO DE MARCACION DE DOCENTES</h5>
   
    <div class="table-responsive">
    <table class="table table-striped table-hover" id="dt-marcaciones" style="font-size:13px;" width="100%">

        <thead class="the-box dark full">
            <tr>
                <th>CORRELATIVO</th>
                <th>DOCENTE</th>
                <th>FECHA</th>
                <th>HORA</th>
                <th>TIPO</th>
               

            </tr>
        </thead>
        <tbody></tbody>
    </table>
    </div><!-- /.table-responsive -->
</div><!-- /.the-box .default -->
<!-- END DATA TABLE -->
@endsection

@section('js')
{!! Html::script('plugins/datatable/js/jquery.dataTables.min.js') !!}
{!! Html::script('plugins/datatable/js/bootstrap.datatable.js') !!}
<script>
    
$( document ).ready(function(){
   var table = $('#dt-marcaciones').DataTable({
        filter: true,
        serverSide: true,
        
        
        ajax: '{!! route('get.all.marcaciones') !!}',
        columns: [  
            
            
            {data: 'idMarcacion', name: 'mar.idMarcacion'},
            {data: 'docente', name: 'docente'},
            {data: 'fecha', name: 'fecha'},
            {data: 'marcacion', name: 'marcacion'},
            {data: 'tipoMarcacion', name: 'tipoMarcacion'}
            
                      
        ],
    
        
        language: {
            "url": "{{ asset('plugins/datatable/lang/es.json') }}"
        },
        order: [[1, 'desc']]
       
    });
});
</script>

@endsection