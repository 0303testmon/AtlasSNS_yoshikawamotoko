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
Route::get('/follow-list','FollowsController@followList')->middleware('auth');
Route::get('/follower-list','FollowsController@followerList')->middleware('auth');


//検索ページ
Route::get('/search','UsersController@search');

//投稿登録機能
Route::post('/postcreate','PostsController@postCreate');

// 投稿更新機能
Route::post('/post/update','PostsController@postUpdate');

// 投稿削除機能 削除はget送信
Route::get('/post/{id}/delete','PostsController@postDelete');

//プロフィール編集機能
Route::post('/profile/update','UsersController@updateProfile');

//フォロー解除
Route::get('/unfollow/{userId}/','FollowsController@unfollow')->name('unfollow');

//フォローする
Route::get('/follow/{userId}/','FollowsController@follow')->name('follow');

//相手ユーザーのプロフィール表示
Route::get('/otherprofile/{id}','UsersController@otherprofile')->name('otherprofile');
