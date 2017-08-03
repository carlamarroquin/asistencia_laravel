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
	
	
	

});
