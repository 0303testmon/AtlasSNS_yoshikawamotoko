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

// Route::get('/', function () {
//     return view('welcome');
// });
// Route::get('/home', 'HomeController@index')->name('home');
// Route::get('/login', 'Auth\LoginController@login')->name('login');
//Auth::routes();


//ログアウト中のページ
Route::get('/login', 'Auth\LoginController@login')->name('login');
Route::post('/login', 'Auth\LoginController@login');
Route::get('/logout', 'Auth\LoginController@logout');

Route::get('/register', 'Auth\RegisterController@register');
Route::post('/register', 'Auth\RegisterController@register');

Route::get('/added', 'Auth\RegisterController@added');
Route::post('/added', 'Auth\RegisterController@added');

//ログイン中のページ
Route::get('/top','PostsController@index');

Route::get('/profile','UsersController@profile');

Route::get('/search','UsersController@index');

Route::get('/follow-list','PostsController@index');
Route::get('/follower-list','PostsController@index');

//新規ユーザー登録ページ
Route::post('/register', 'Auth\RegisterController@register');

//ログインページ
// Route::post('/login', 'HomeController@index');


//ログイン制限 authで制限が付けられるlaravel特有の機能
  Route::group(['middleware' => 'auth'], function() {

   Route::get('/top','PostsController@index');
   Route::get('/profile','UsersController@profile');
   Route::get('/search','UsersController@index');
   Route::get('/follow-list','PostsController@index');
   Route::get('/follower-list','PostsController@index');

});

//フォロー、フォロワー表示
Route::get('/follow-list','FollowsController@follows');
Route::get('/follower-list','FollowsController@followers');


//検索ページ
Route::get('/search','UsersController@search');

//投稿機能
Route::get('/top','PostsController@postCreate');
