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
foreach (new DirectoryIterator(__DIR__.'/Routes') as $file)
{
    if (!$file->isDot() && !$file->isDir() && $file->getFilename() != '.gitignore')
    {
        require_once __DIR__.'/Routes/'.$file->getFilename();
        //require_once __DIR__.'/Routes/'.$file->getFilename();
    }
}


Route::get('/', ['as' => 'doLogin', 'uses' => 'MainController@getLogin']);   
Route::post('/login',['as' => 'postLogin', 'uses' => 'MainController@postLogin']);  
Route::get('/logout', 'MainController@getLogout'); 
Route::get('/inicio', ['middleware' => ['auth'], 'as' => 'doInicio', 'uses' => 'MainController@index']);


/*
Route::get('/',[
            'as'    => 'ver.marcacion',
            'uses'  => 'marcacionController@create'
        ]);
*/

