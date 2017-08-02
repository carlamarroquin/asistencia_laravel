<?php
Route::group(['prefix' => 'docentes', 'middleware' => ['auth']], function(){
	
	//Route::resource('docentes','marcacionController');	

	Route::post('/marcacion',[
			'as' 	=> 'nueva.marcacion',
			'uses' 	=> 'marcacionController@createMarcacion'
	 	]);

	Route::get('/all-marcaciones',[
			'as' 	=> 'all.marcacion',
			'uses' 	=> 'marcacionController@AllMarcaciones'
	 	]);

	Route::get('/getmarcaciones',[
			'as' 	=> 'get.all.marcaciones',
			'uses' 	=> 'marcacionController@getDataRowsMarcaciones'
	 	]);
	
	

});
