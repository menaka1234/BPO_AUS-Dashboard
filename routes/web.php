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
        $threads= App\Tread::paginate(15);
        return view('welcome',compact('threads'));
    return view('welcome');
});

Route::resource('/thread', 'treadcontroller');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
