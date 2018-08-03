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
//Categories and Articles
Route::get('/blog/category/{slug?}', 'BlogController@category')->name('category');
Route::get('/blog/article/{slug?}', 'BlogController@article')->name('article');

//Administrator
Route::group(['prefix'=>'admin', 'namespace'=>'Admin', 'middleware'=>'roles', 'roles'=>['Админ']], function(){
    Route::get('/', 'DashboardController@dashboard')->name('admin.index');
    Route::resource('/category', 'CategoryController', ['as'=>'admin']);
    Route::resource('/article', 'ArticleController', ['as'=>'admin']);
    Route::group(['prefix' => 'user_managment', 'namespace' => 'UserManagment'], function (){
        Route::resource('/User', 'UserController', ['as'=>'admin.user_managment']);
    });
});

//Users
Route::get('/profile', 'ProfileController@profile')->middleware('auth');
Route::post('/addProfile', 'ProfileController@addProfile')->middleware('auth');

//Soft
Route::get('/', function () {
    return view('blog.home');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('refresh_captcha', 'HomeController@refreshCaptcha')->name('refresh_captcha');