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


//Route::view('/', 'home')->middleware('language');

//Route::get('/' ,'HomeController@getHome')->middleware('language');


Route::get('/login', function () {
    return view('/auth/login');
});
Route::get('/', function () {
    return view('/auth/login');
});

//rutas para verificar
Auth::routes(['verify' => 'true']);

Route::group(['middleware' => 'verified'], function () {

  Route::get('/catalog', 'CatalogController@getIndex')->middleware('auth');

  Route::delete('/catalog/delete/{id}', 'CatalogController@putDelete')->middleware('auth');

  Route::get('/catalog/show/{id}','CatalogController@getShow')->middleware('auth');

  Route::get('/catalog/create', 'CatalogController@getCreate')->middleware('auth');

  Route::post('/catalog/create', 'CatalogController@postCreate')->middleware('auth');

  Route::get('/catalog/edit/{id}', 'CatalogController@getEdit')->middleware('auth');

  Route::put('/catalog/edit/{id}', 'CatalogController@putEdit')->middleware('auth');

  Route::get('logout', 'Auth\LoginController@logout');

  Route::get('/probarconexion', function()
  {
    try {
      DB::connection()->getPdo();
    } catch (\Exception $e) {
      die("no se puede conectar a la base de datos. Revise su configuracion".$e);
    }

  })->middleware('auth');
});
//PRUEBAS
/*
Route::get('/', function () {
    return view('prueba');
});

Route::get('/hola', function () {
    return view('home');
});
Route::get('/fecha', function () {
    return view('fecha', ['dia' => date('d'), 'mes' => date('m'), 'ano' => date('o')]);
});

Route::get('/fecha2', function () {
  $dia= date('d');
  $mes=date('m');
  $ano=date('o');
    return view('fecha', compact("dia", "mes", "ano"));
});

Route::get('/fecha3', function () {
    return view('fecha')->with('dia', date('d'))->with('mes', date('m'))->with('ano', date('o'));
});
*/

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
