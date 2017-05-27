@extends('masterindex')

@section('css')
@endsection

@section('content')

@if(Session::has('message'))
<div class="alert alert-success" role="alert" style="width: 100%; margin-top: 100px; ">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    {{Session::get('message')}}
</div>
@endif

  <div class="table-responsive">
    <table class="table table-striped table-hover" id="tr-pry" style="font-size:13px;" width="100%">
        <thead class="the-box dark full">
          <tr>
            <th>Corelativo</th>
  		  		<th>Nombre</th>
  		  		<th>email</th>
  		  		<th>Departamento</th>
  		  		
          </tr>
        </thead>
        	@foreach($docentes as $doc)
        <tbody>
         <!--   <th>{{$doc->id_docente}}</th>

            <th>{{$doc->nombre}}</th>
            <th>{{$doc->email}}</th>
            <th>{{$doc->departamento}}</th>

            <td> {!!link_to_route('usuarios.edit', 'Editar',$parameters=$doc->id_docente, $attributes = ['class'=>'btn btn-warning'])!!}
            {!!link_to_route('usuarios.destroy', 'Eliminar',$parameters=$doc->id_docente, $attributes = ['class'=>'btn btn-danger'])!!}</td>
      
			-->
        </tbody>
        	@endforeach
    </table>
  </div><!-- /.table-responsive -->
 @endsection

@section('js')
<!--<script src="plugins/datatable/js/jquery.dataTables.min.js"></script>
  <script src="plugins/datatable/js/bootstrap.datatable.js"></script>-->
  {!!Html::script('plugins/datatable/js/jquery.dataTables.min.js') !!}
{!!Html::script('plugins/datatable/js/bootstrap.datatable.js') !!}

<script>

$(document).ready(function(){
   var table = $('#dt-docente').DataTable({
        filter: true,
        serverSide: true,

        ajax: '{!! route('dt.row.data.docentes') !!}',
        columns: [


            {data: 'id_docente', name: 'doc.id_docente'},
            {data: 'nombre', name: 'doc.nombre'},
            {data: 'email', name: 'doc.email'},
            {data: 'departamento', name: 'doc.departamento'}
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
