@extends('masterindex')

@section('css')
  	{!! Html::style('plugins/fullcalendar-scheduler/fullcalendar.min.css') !!}

<link href='../plugins/fullcalendar.print.min.css' rel='stylesheet' media='print' />
  	{!! Html::style('plugins/fullcalendar-scheduler/scheduler.min.css') !!}
<style>
.content {
		background-color: white;
		margin: 0;
		padding: 0;
		font-family: "Lucida Grande",Helvetica,Arial,Verdana,sans-serif;
		font-size: 14px;
	}

	#calendar {
		max-width: 900px;
		margin: 50px auto;
	}

</style>

@endsection

@section('content')
<div name="content">
<div id='calendar'></div>
</div>
@endsection

@section('js')
	{!! Html::script('plugins/fullcalendar-scheduler/moment.min.js') !!}
	{!! Html::script('plugins/fullcalendar-scheduler/jquery-ui.min.js') !!}
	{!! Html::script('plugins/fullcalendar-scheduler/fullcalendar.min.js') !!}
	{!! Html::script('plugins/fullcalendar-scheduler/scheduler.min.js') !!}
<script>

	$(function() { // document ready
		var id={{Auth::user()->id}};
	console.log(id);
		$('#calendar').fullCalendar({
			header: {
				left: 'prev,next today',
				center: 'title',
				right: 'month,basicWeek,basicDay'
			},
			defaultDate: '2017-08-12',
			navLinks: true, // can click day/week names to navigate views
			editable: false,
			eventLimit: true, // allow "more" link when too many events
			
			events:  { 
            	url: '{!! route('events.marcaciones') !!}',
            	data: { "id":id,
            			"_token": "{{ csrf_token() }}" },
				type: 'post',
                	
			}
				
		});
	
	});

</script>


@endsection
