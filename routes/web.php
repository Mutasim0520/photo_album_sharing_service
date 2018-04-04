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



Auth::routes();


Route::group(['middleware'=>'auth'],function (){
    Route::get('/profile','AlbumController@showProfile')->name('user.profile');
    Route::get('/add/album','AlbumController@showAlbumAddForm')->name('user.show.album.add.form');
    Route::post('/add/album','AlbumController@storeAlbum')->name('user.store.album');
});

Route::get('/','IndexController@showIndex')->name('user.index');
Route::get('/show/album/credential/form','AlbumController@showAlbumCredentialsForm')->name('user.album.credential');
Route::get('/album/{perma_link}','AlbumController@showIndivisualAlbum');
Route::get('/{perma_link}','AlbumController@showAlbumCredentialsForm');
Route::post('/validate/album/credentials','AlbumController@validateAlbumCredentials')->name('user.album.credentials.validate');
Route::post('/store/comment','AlbumController@storeComment');
Route::post('/store/rate','AlbumController@storeRate');
Route::get('/check/email','IndexController@checkEmail');