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
    // $menus = Menu::All();
    $menus = DB::table('menu');
    $makanans = $menus->where('jenis','=','makanan')->get();
    $menus = DB::table('menu');
    $minumans = $menus->where('jenis','=','minuman')->get();
    $user = new User();
    return view('index',compact('menus','user','makanans','minumans'));
});

Auth::routes();

Route::group(['prefix'=>'home'],function(){
    Route::get('/', 'HomeController@index')->name('home');
    Route::group(['prefix'=>'menus'],function(){
        Route::get('/add',['as'=>'tambah_menu','uses'=>'MenuController@create']);
        Route::post('/add',['as'=>'simpan_menu','uses'=>'MenuController@store']);

        Route::get('/edit/{id}',['as'=>'edit_menu','uses'=>'MenuController@edit']);
        Route::post('/edit/{id}',['as'=>'update_menu','uses'=>'MenuController@update']);
        
        Route::get('/delete/{id}',['as'=>'delete_menu','uses'=>'MenuController@destroy']);
    });

    Route::group(['prefix'=>'pesanan'],function(){
        Route::get('/',['as'=>'pesanan','uses'=>'TransaksiController@index']);
        Route::get('/selesai/{id}',['as'=>'pemesanan_selesai','uses'=>'TransaksiController@selesai']);
    });

    Route::group(['prefix'=>'kuliah'],function(){
        Route::get('/',['as'=>'kuliah','uses'=>'BayarkuliahController@index']);
    });
});

Route::group(['prefix'=>'transaksi'],function(){
   Route::get('/pesan/{id}',['as'=>'pemesanan','uses'=>'TransaksiController@create']);
   Route::post('/pesan',['as'=>'simpan_transaksi','uses'=>'TransaksiController@store']);
   Route::get('/pesanan/{id}',['as'=>'detail_pesanan','uses'=>'TransaksiController@pesanan']);
});

// Route::get('/search/{keyword}',function($keyword){
//     $keyword = explode(" ",$keyword);
//     foreach($keyword as $key){
//         $data[$key] = Menu::where('nama_menu','LIKE','%'.$key.'%')
//         ->orWhere('deskripsi_menu','LIKE','%'.$key.'%')
//         ->get();
//     }
//     // foreach($data as $key){
//     //     foreach($key as $item){
//     //         echo $item->nama_menu.'<br>';
//     //     }
//     // }
//     // JSON
//     return $data;
// })->name('search');

Route::get('/search',['as'=>'search','uses'=>'PencarianController@search']);