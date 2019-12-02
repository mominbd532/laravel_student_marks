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

//Student Option
Route::get('/student/create', 'StudentController@create')->name('student.create');
Route::post('/student/store', 'StudentController@store')->name('student.store');
Route::get('/student/index', 'StudentController@index')->name('student.index');
Route::get('/student/{id}/edit', 'StudentController@edit')->name('student.edit');
Route::post('/student/{id}/update', 'StudentController@update')->name('student.update');
Route::get('/student/{id}/destroy', 'StudentController@destroy')->name('student.destroy');

//Subject Option

Route::get('/subject/create', 'SubjectController@create')->name('subject.create');
Route::post('/subject/store', 'SubjectController@store')->name('subject.store');
Route::get('/subject/index', 'SubjectController@index')->name('subject.index');
Route::get('/subject/{id}/edit', 'SubjectController@edit')->name('subject.edit');
Route::post('/subject/{id}/update', 'SubjectController@update')->name('subject.update');
Route::get('/subject/{id}/destroy', 'SubjectController@destroy')->name('subject.destroy');

//Result

Route::get('/result/{id}/create','MarkController@create')->name('mark.create');
Route::post('/result/store','MarkController@store')->name('mark.store');
Route::get('/result/{id}/show','MarkController@show')->name('mark.show');