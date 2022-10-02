<?php

use Illuminate\Support\Facades\Route;

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

Route::group( ['middleware' => [ 'guest']], function(){

    Auth::routes();

    Route::get('/', function () {
        return view('auth.login');
    });

});


Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath','auth' ]
    ], function(){



    Route::get('/dashboard', 'HomeController@index')->name('dashboard');

    Route::group(['namespace'=>'Grades'],function (){
        Route::resource('Grades', 'GradeController');

    });

});








