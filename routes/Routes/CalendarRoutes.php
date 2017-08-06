<?php
Route::group(['prefix' => 'calendar', 'middleware' => ['auth']], function(){
	
	//Route::resource('docentes','marcacionController');	

	Route::get('/resources',[
			'as' 	=> 'resources',
			'uses' 	=> 'CalendarController@getResources'
	 	]);

	Route::get('/events',[
			'as' 	=> 'events',
			'uses' 	=> 'CalendarController@getEvents'
	 	]);
	
	Route::post('/eventsMar',[
			'as' 	=> 'events.marcaciones',
			'uses' 	=> 'CalendarController@getMarcaciones'
	 	]);
	

	Route::post('/resourcesAsist',[
			'as' 	=> 'resources.asistencias',
			'uses' 	=> 'CalendarController@getAsistResources'
	 	]);

	Route::get('/eventsAsist',[
			'as' 	=> 'events.asistencias',
			'uses' 	=> 'CalendarController@getAsistEvents'
	 	]);

});
