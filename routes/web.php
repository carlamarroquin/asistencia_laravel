<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('masterindex');
});

Route::get('/inicio', function () {
    return view('master');
});


Route::get('/usuario', [
    'as'=>'usuario',
    'uses'=>'MainController@getCrearUsuario'
]);
/*
Route::get('/usuario', [
    'as'=>'usuario',
    'uses'=>'MainController@getCrearUsuario'
]);*/

Route::resource('user','UsuarioController');

Route::post('/update', [
    'as'=>'actualizar.docente',
    'uses'=>'UsuarioController@update'
]);

Route::get('/dt-row-data',[
	 		'as' => 'dt.row.data.docentes',
			'uses' => 'UsuarioController@getDataRowsDocentes'
	 	]);	
