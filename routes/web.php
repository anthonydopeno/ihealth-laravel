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

header('Access-Control-Allow-Origin: *');
header('Context-Type: application/json');
header("Accept", 'application/json');
header('Content-Type', 'application/json');

//Route::get('/display','testing@displaydata');

/*Route::get('/form',function(){
	return view('form');
});*/

//Route::post('/insert','testing@insert')->name('form');

Route::post('/dinsert','control@dinsert')->name('form');

Route::post('/sort','control@sort')->name('form');

Route::get('/sget','control@sget');

Route::get('/sdel','control@sdel');

//Route::post('/ddetails','control@ddetails');

Route::get('/ddetails/{duid}','control@ddetails');

Route::post('/pinsert','control@pinsert')->name('form');

Route::get('/pdetails/{puid}','control@pdetails');

Route::get('/clogin','control@dcompare');

Route::post('/dlist','control@dlist');

Route::get('/d/{duid}','control@ddetails');

Route::post('/plist','control@plist');

Route::post('/enroll','control@enroll')->name('form');

Route::get('/dmembers','control@dmembers');

Route::get('/btmd','control@btmd');

Route::post('/delete','control@delete')->name('form');

Route::post('/notification','control@notification')->name('form');

Route::get('/nget','control@nget');

Route::get('/mget','control@mget');

Route::post('/ndelete','control@ndelete')->name('form');

Route::post('/inconsultation','control@inconsultation')->name('form');

Route::post('/cget','control@cget');

Route::post('/dget','control@dget');

Route::get('/display','control@displaydata');

Route::post('/insert','control@insert')->name('form');

Route::get('/medicine/{id}/edit', 'control@update');

Route::post('/medicine/{id}/update','control@saveupdate')->name('form');

Route::get('/medicine/{id}/delete','control@meddelete');

