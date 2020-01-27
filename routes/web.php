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

Route::get('/pruebaRequest' ,'pruebaRequest@index')->middleware('language');

Route::get('/' ,'HomeController@getHome')->middleware('language');


Route::get('/login', function () {
    return view('/auth/login');
});

Route::get('/catalog', 'CatalogController@getIndex');

Route::get('/catalog/show/{id}','CatalogController@getShow');

Route::get('/catalog/create', 'CatalogController@getCreate');

Route::get('/catalog/edit/{id}', 'CatalogController@getEdit');
Route::post('/logout', function () {
    return view('home');
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
