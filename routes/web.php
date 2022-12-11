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
    return redirect()->route('home');
});

Auth::routes();

Route::get('/home', function() {
    return view('home');
})->name('home')->middleware('auth');


Route::resource('kriteria', 'KriteriaController')->middleware('auth');
Route::resource('kriteria/{kriteria}/pilihan', 'PilihanKriteriaController')->middleware('auth');

Route::resource('alternatif', 'AlternatifController')->middleware('auth');
Route::get('/alternatif/{id}/isi', 'AlternatifController@isi')->name('alternatif.isi')->middleware('auth');
Route::post('/alternatif/{id}/isi', 'AlternatifController@saveIsi')->name('alternatif.save_isi')->middleware('auth');

Route::resource('penilaian', 'PenilaianController')->middleware('auth');
