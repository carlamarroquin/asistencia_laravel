<?php
Route::group(['prefix' => 'docentes', 'middleware' => ['auth']], function(){
	
	//Route::resource('docentes','marcacionController');	

	Route::post('/marcacion',[
			'as' 	=> 'nueva.marcacion',
			'uses' 	=> 'marcacionController@createMarcacion'
	 	]);

});
