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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/profile', 'HomeController@profile')->name('profile');

Auth::routes();

Route::view('log', 'auth.login')->name('switchlogin');

Route::get('/home', 'HomeController@index')->name('home');

Route::post('user_profile', 'HomeController@uploade_image')->name('uploade_image');

Route::post('post_upload', 'Post\PostController@store')->name('store');

Route::post('post-comment', 'Post\CommentController@comment_store')->name('comment_store');

Route::post('/like-post', 'HomeController@likePost')->name('post.like');

Route::post('/like-post', 'HomeController@likePost')->name('post.like');

Route::post('follow', 'HomeController@followUser')->name('user.follow');
