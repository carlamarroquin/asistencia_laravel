<?php
Route::group(['prefix' => 'administrador', 'middleware' => ['auth']], function(){
	/*
		Ruta para el proceso ingreso y visualización de restricciones de laboratorios nacionales
	*/	
	Route::group(['prefix' => 'usuarios'], function(){
		
		Route::resource('usuarios','UsuarioController');		
		
		Route::get('/nuevo',[
			'as' 	=> 'nuevo.usuario',
			'uses' 	=> 'UsuarioController@create'
	 	]);

	 	Route::post('/crear-usuario',[
			'as' 	=> 'crear.usuario',
			'uses' 	=> 'UsuarioController@store'
	 	]);

		Route::get('/consultar', [
		    'as'=>'consultar.docentes',
		    'uses'=>'UsuarioController@index'
		]);
	 	

		Route::post('/update', [
		    'as'=>'actualizar.docente',
		    'uses'=>'UsuarioController@update'
		]);

		Route::get('/dt-row-data',[
			 		'as' => 'dt.row.data.docentes',
					'uses' => 'UsuarioController@getDataRowsDocentes'
		]);	
		Route::get('/editar/{id}/',[
			 		'as' => 'editar.usuario',
					'uses' => 'UsuarioController@edit'
		]);	

		Route::get('/reporteMarcacion', [
		'as' => 'reporteMarcacion', 
		'uses' => 'PdfController@generarReporte'
		]);
		
		Route::post('/pdf', [
			'as' => 'pdf', 
			'uses' => 'PdfController@reportePorEmpleado'
			]);
		Route::get('/reporteAsis', [
			'as' => 'reporteAsis', 
			'uses' => 'PdfController@getReporteAsistencias'
			]);
		
		Route::post('/asistenciasPdf', [
			'as' => 'asistenciaPdf', 
			'uses' => 'PdfController@reporteAsistencias'
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
});
