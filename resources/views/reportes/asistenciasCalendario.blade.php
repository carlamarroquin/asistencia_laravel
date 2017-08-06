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
		display: flex;
		
     	margin: 0 auto;
	}

	#calendar {
		max-width: 900px;
		margin: 30px auto;
	}
	
	     
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
	
	var date = new Date();
	
	var month=date.getMonth()+1;
	
	var resourcesArray;
	
	$(document).ready(function () {// document ready
		
		


		$('#calendar').fullCalendar({
			refetchResourcesOnNavigate: true,
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
			resourceAreaWidth: '25%',
			resourceColumns: [
				{
					labelText: 'Docentes',
					field: 'title'
				},
				{
					labelText: 'Total',
					field: 'total'
				}
			],
			resources: function(callback,start, end, timezone) {
				console.log(start.format());
				$.ajax({
		            data: {_token: '{{ csrf_token() }}',mes:start.format()} ,
		            url:   "{{ route('resources.asistencias') }}",
		            type:  'post',
		            success:  function (r){
		               console.log(r);
		               resourcesArray=r;
		               callback(r);
		            },
		            error: function(data){
		                // Error...
		                var errors = $.parseJSON(data.responseText);
		                console.log(errors);
		            }
		        });
    			
			},
			events:  { 
            	url: '{!! route('events.asistencias') !!}',
				type: 'GET',
                	
			}
				
		});


		$('.fc-prev-button').click(function () {	
            var b = $('#calendar').fullCalendar('getDate');
            var date = new Date(b.format('L'));
    		var month=date.getMonth();
    		console.log(date.getMonth());
        });

        $('.fc-next-button').click(function () {
            var b = $('#calendar').fullCalendar('getDate');
    		var date = new Date(b.format('L'));
    		var month=date.getMonth();
			console.log(date.getMonth());
        });
	
	});



</script>


@endsection
