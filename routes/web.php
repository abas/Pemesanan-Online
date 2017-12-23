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

use App\Menu;
use App\User;

Route::get('/', function(){
    $menus = Menu::All();
    $user = new User();
    return view('index',compact('menus','user'));
});

Auth::routes();

Route::group(['prefix'=>'home'],function(){
    Route::get('/', 'HomeController@index')->name('home');
    Route::group(['prefix'=>'menus'],function(){
        Route::get('/add',['as'=>'tambah_menu','uses'=>'MenuController@create']);
        Route::post('/add',['as'=>'simpan_menu','uses'=>'MenuController@store']);
    });
});