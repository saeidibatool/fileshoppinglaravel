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



//=====================Start Frontend Controllers==================
Route::get('/', 'IndexController@index');
Auth::routes();


Route::group(['middleware'=>['auth','UserLevel']],function(){
  Route::get('/home', 'HomeController@index')->name('home');
});
Route::resource('cat', 'CategoryController');
Route::resource('pro', 'ProductController');
Route::resource('commen','CommentController');
Route::resource('contact','ContactController');


//Ajax Routes Start
Route::group([], function(){
    Route::resource('/basket', 'BasketController')->middleware('auth');
//  Route::get('/product', 'BasketController@store')->middleware('auth');
    Route::resource('/favorite', 'FavoriteController')->middleware('auth');
    Route::resource('/factor', 'FactorController')->middleware('auth');
    Route::get('/download/{id}', 'DownloadController@download');
});



//=====================End Frontend Controllers====================

//==================Start Backend Controllers======================
Route::group(['namespace'=>'admin','middleware'=>['auth','UserLevel'],'prefix'=>'/admin'],function(){
  Route::resource('/product', 'ProductController');
  Route::resource('/role', 'RoleController');
  Route::resource('/user', 'UserController');
  Route::resource('/permission', 'PermissionController');
  Route::resource('/category', 'CategoryController');
  Route::resource('/producer', 'ProducerController');
  Route::resource('/slider', 'SliderController');
  Route::resource('/filter', 'FilterController');
  Route::resource('/sliderparent', 'SliderparentController');
});

Route::get('/userpanel', 'admin\UserController@userPanel')->name('userpanel');
Route::get('/useredit', 'admin\UserController@userEdit')->name('useredit');


//==================End Backend Controllers========================


//==================Ajax Routes End==========================
