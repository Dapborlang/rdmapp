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
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('ip','IPController');
Route::resource('routine','RoutineController');

Route::get('/migrate', function () {
    $exitCode = Artisan::call('migrate');

    return $exitCode;
})->middleware('CheckUser');

Route::get('ui','ButtonsController@index');

Route::post('setStatus','IPController@setStatus');

Route::resource('switches','SwitchStatusController');

Route::get('/cronjob','IPController@CronJob');

Route::get('/pump/0','MailController@send');

Route::post('/webhook/status','WebhookController@status');
Route::post('/webhook/ip','WebhookController@ipUpdate');

Route::resource('formpopulate','FormPopulateController');
Route::get('formpopulateall','FormPopulateController@resources');
Route::resource('formpopulateindex','FormPopulateIndexController');

Route::get('formbuilder/{id}','FormBuilderController@index');
Route::get('formbuilder/{id}/create','FormBuilderController@create');
Route::post('formbuilder/{id}','FormBuilderController@store');
Route::post('formbuilder/{id}/index','FormBuilderController@index');

Route::get('frmbuilder/{id}/{cid}','FormBuilderController@show');
Route::get('frmbuilder/edit/{id}/{cid}','FormBuilderController@edit');
Route::put('frmbuilder/update/{id}/{cid}','FormBuilderController@update');
Route::delete('frmbuilder/delete/{id}/{cid}','FormBuilderController@destroy');

//storage
Route::resource('stg','FileStorageController');

//..................Pages
Route::get('{id}/pages','PageController@show');