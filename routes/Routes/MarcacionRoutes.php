<?php
Route::group(['prefix' => 'docentes', 'middleware' => ['auth']], function(){
	
	//Route::resource('docentes','marcacionController');	

	Route::post('/marcacion',[
			'as' 	=> 'nueva.marcacion',
			'uses' 	=> 'marcacionController@createMarcacion'
	 	]);

	
    Route::get('/asistencias',[ 
        'as' => 'asistencias', 
        'uses' => 'marcacionController@getAsistCalendario'
        ]);

    Route::get('/marcaciones',[ 
        'as' => 'marcaciones', 
        'uses' => 'marcacionController@getCalendario'
        ]);

	Route::get('/mismarcaciones',[
			'as' 	=> 'mis.marcaciones',
			'uses' 	=> 'marcacionController@misMarcaciones'
	 	]);
		

});
