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

Route::get('/', [
    'uses'=>'PageController@getIndex'
]);

Route::get('404',[
    'as'=>'404',
    'uses'=>'PageController@get404'
]);

Route::get('profile',[
    'as'=>'profile',
    'uses'=>'PageController@getProfile'
]);

Route::post('changepass',[
    'as'=>'changepass',
    'uses'=>'PageController@postChangePass'
]);

Route::post('changePersonalData',[
    'as'=>'changePersonalData',
    'uses'=>'PageController@postchangePersonalData'
]);

Route::get('about',[
    'as'=>'about',
    'uses'=>'PageController@getAbout'
]);

Route::get('lich-su',[
    'as'=>'lich-su',
    'uses'=>'PageController@getLichSu'
]);

Route::get('chi-tiet-lich-su',[
    'as'=>'chi-tiet-lich-su',
    'uses'=>'PageController@getChiTietLichSu'
]);

Route::get('phim-da-xem',[
    'as'=>'phim-da-xem',
    'uses'=>'PageController@getPhimDaXem'
]);

Route::get('phim-dang-chieu',[
    'as'=>'phim-dang-chieu',
    'uses'=>'PageController@phimDangChieu'
]);

Route::get('phim-sap-chieu',[
    'as'=>'phim-sap-chieu',
    'uses'=>'PageController@phimSapChieu'
]);

Route::get('he-thong-rap',[
    'as'=>'he-thong-rap',
    'uses'=>'PageController@heThongRap'
]);

Route::get('dang-ky',[
    'as'=>'dang-ky',
    'uses'=>'PageController@getDangKy'
]);

Route::post('dang-ky',[
    'as'=>'dang-ky',
    'uses'=>'PageController@postSignup'
]);

Route::post('dang-nhap',[
    'as'=>'dang-nhap',
    'uses'=>'PageController@postSignin'
]);

Route::get('faq',[
    'as'=>'faq',
    'uses'=>'PageController@getFAQ'
]);

Route::get('chi-tiet',[
    'as'=>'chi-tiet',
    'uses'=>'PageController@getChitiet'
]);

Route::get('contact',[
    'as'=>'contact',
    'uses'=>'PageController@contact'
]);

Route::get('index',[
    'as'=>'trang-chu',
    'uses'=>'PageController@getIndex'
]);
 
Route::get('dang-xuat',[
    'as'=>'dang-xuat',
    'uses'=>'PageController@getDangxuat'
]);

<<<<<<< HEAD
=======
Route::get('mua-ve',[
    'as'=>'mua-ve',
    'uses'=>'PageController@getMuaVe'
]);

Route::get('chon-phim/{id}',[
    'as'=>'chon-phim',
    'uses'=>'PageController@getChonPhim'
]);

Route::get('chon-rap/{idPhim}',[
    'as'=>'chon-rap',
    'uses'=>'PageController@getChonRap'
]);

Route::get('chon-suat-chieu/{idPhim}/{idRap}',[
    'as'=>'chon-suat-chieu',
    'uses'=>'PageController@getChonSuatChieu'
]);

>>>>>>> a4131c660893e4b8b60470692bd366901e5e415b
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
