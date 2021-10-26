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
Route::get('/', function () {
    return view('lims.login.login');
});

Route::get('/lims/dangnhap','DangNhapController@getDanhsach');
Route::post('/lims/dangnhap','DangNhapController@postDangNhap');
Route::get('/lims/dangxuat','DangNhapController@dangxuat');



Route::get('/lims/dangnhap', function () {
    return view('lims.login.login');
});

Route::group(['prefix'=>'lims','middleware'=>'limsLogin'],function (){
    Route::group(['prefix'=>'nhanmau'],function(){
        Route::get('danhsach/{id}','NhanMauController@getDanhsach');
        Route::get('sua/{id}','NhanMauController@getSua');
        Route::post('sua/{id}','NhanMauController@postSua');

        Route::get('them','NhanMauController@getThem');
        Route::post('them','NhanMauController@postThem');

        Route::get('xoa/{id}','NhanMauController@getXoa');
    });
    Route::group(['prefix'=>'testnhanh'],function(){
        Route::get('danhsach','TestNhanhController@getDanhsach');

        Route::get('sua/{id}','TestNhanhController@getSua');
        Route::post('sua/{id}','TestNhanhController@postSua');

        Route::get('xoa/{id}','TestNhanhController@getXoa');

        Route::get('print/{id}','TestNhanhController@getPrint');

        Route::get('bill/{id}','TestNhanhController@exportBillPDF');
    });
    Route::group(['prefix'=>'pcr'],function(){
        Route::get('danhsach','PcrController@getDanhsach');

        Route::get('sua/{id}','PcrController@getSua');
        Route::post('sua/{id}','PcrController@postSua');

        Route::get('xoa/{id}','PcrController@getXoa');

        Route::get('print/{id}','PcrController@getPrint');
    });
    Route::group(['prefix'=>'ajax'], function (){
        Route::get('print/{id}','AjaxController@getPrint');
        Route::get('search/{sdt}','AjaxController@getThongtin');
        Route::get('fromD2D/{d1}/{d2}','AjaxController@searchD2D');
        Route::get('code',function (){
            echo '<img src="' . DNS1D::getBarcodePNG('4', 'C39+',3,33) . '" alt="barcode"   />';
        });
    });
});


Route::group(['prefix'=>'admin','middleware'=>'limsLogin'], function (){
    Route::group(['prefix'=>'user'], function (){
        Route::get('danhsach','UserController@getDanhsach');

        Route::get('them','UserController@getThem');
        Route::post('them','UserController@postThem');\

        Route::get('sua/{id}','UserController@getSua');
        Route::post('sua/{id}','UserController@postSua');

        Route::get('xoa/{id}','TinTucController@getXoa');
    });
});

Auth::routes();

