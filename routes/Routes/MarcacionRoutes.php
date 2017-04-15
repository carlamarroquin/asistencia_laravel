<?php
Route::group(['prefix' => 'docentes' ], function(){
	
	Route::resource('docentes','marcacionController');	


});
