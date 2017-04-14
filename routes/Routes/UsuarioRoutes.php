<?php
Route::group(['prefix' => 'administrador' ], function(){
	/*
		Ruta para el proceso ingreso y visualización de restricciones de laboratorios nacionales
	*/	
	Route::group(['prefix' => 'usuarios'], function(){
		
		Route::get('/nuevo',[
			'as' 	=> 'nuevo.usuario',
			'uses' 	=> 'UsuarioController@create'
	 	]);

	 	Route::post('/crear-usuario',[
			'as' 	=> 'crear.usuario',
			'uses' 	=> 'UsuarioController@store'
	 	]);
	 	

		Route::post('/update', [
		    'as'=>'actualizar.docente',
		    'uses'=>'UsuarioController@update'
		]);

		Route::get('/dt-row-data',[
			 		'as' => 'dt.row.data.docentes',
					'uses' => 'UsuarioController@getDataRowsDocentes'
		]);	

	});
});
