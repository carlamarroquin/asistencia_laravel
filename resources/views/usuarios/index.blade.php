@extends('masterindex')

@section('css')
   <link href="plugins/datatable/css/bootstrap.datatable.min.css" rel="stylesheet">
<!-{!! Html::style('plugins/datatable/css/bootstrap.datatable.min.css') !!}-->
@endsection

@section('content')

<div class="table-responsive">
    <table class="table table-striped table-hover" id="dt-docente" style="font-size:13px;" width="100%">
        <thead class="the-box dark full">
          <tr>
            <th>Corelativo</th>
  		  		<th>Nombre</th>
  		  		<th>email</th>
  		  		<th>Departamento</th>
  		  		<th>Opciones</th>
          </tr>
        </thead>
        	@foreach($docentes as $doc)
        <tbody>
            <th>{{$doc->id_docente}}</th>

            <th>{{$doc->nombre}}</th>
            <th>{{$doc->email}}</th>
            <th>{{$doc->id_depto}}</th>

            <td> {!!link_to_route('user.edit', 'Editar',$parameters=$doc->id_docente, $attributes = ['class'=>'btn btn-warning'])!!}</td>
			
        </tbody>
        	@endforeach
    </table>
  </div><!-- /.table-responsive -->
 @endsection

@section('js')
<!--Html::script('plugins/datatable/js/jquery.dataTables.min.js') !!}
{!! Html::script('plugins/datatable/js/bootstrap.datatable.js') !!}-->
  <script src="plugins/datatable/js/jquery.dataTables.min.js"></script>
  <script src="plugins/datatable/js/bootstrap.datatable.js"></script>

<script>

$( document ).ready(function(){
   var table = $('#dt-docente').DataTable({
        filter: true,
        serverSide: true,

        ajax: '{!! route('dt.row.data.docentes') !!}',
        columns: [


            {data: 'idDocente', name: 'doc.idDocente'},
            {data: 'nombre', name: 'doc.nombre'},
            {data: 'email', name: 'doc.email'},
            {data: 'depto', name: 'doc.depto'}
            //{data: 'fechaCreacion', name: 'pry.fechaCreacion'},
            //{data: 'eliminar', name: 'eliminar',orderable: false, searchable: false}


        ],


        language: {
            "url": "{{ asset('plugins/datatable/lang/es.json') }}"
        },
        order: [[1, 'desc']]

    });
});
</script>
@endsection
