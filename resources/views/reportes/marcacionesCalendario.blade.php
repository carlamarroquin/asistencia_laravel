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

		$('#calendar').fullCalendar({
			now: moment(),
			editable: false,
			aspectRatio: 2,
			scrollTime: '00:00',
			header: {
				left: 'today prev,next',
				center: 'title',
				right: 'timelineSevenDay,basicWeek,timelineMonth'
			},
			defaultView: 'timelineMonth',
			views: {
				timelineSevenDay: {
					type: 'timeline',
					duration: { days: 7 }
				}
			},
			navLinks: true,
			resourceAreaWidth: '20%',
			resourceLabelText: 'Docentes',

			resources: { 
            	url: '{!! route('resources') !!}',
				type: 'GET',
                	
			},
			events:  { 
            	url: '{!! route('events') !!}',
				type: 'GET',
                	
			}
				
		});
	
	});

</script>


@endsection
