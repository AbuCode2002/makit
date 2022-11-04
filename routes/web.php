<?php

use Illuminate\Support\Facades\Route;

//use App\Post;

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

Route::get('/', 'PostController@index')->name('post.index');

Route::get('/posts/create', 'PostController@create')->name('post.create');
Route::post('/posts/create', 'PostController@store')->name('post.store');

Route::post('/posts/{post}', 'PostController@comment')->name('post.comment');


Route::get('/posts/{post}', 'PostController@show')->name('post.show');
Route::get('/posts/{post}/edit', 'PostController@edit')->name('post.edit');
Route::get('/posts/{post}/editComment', 'CommentController@edit')->name('comment.edit');

Route::patch('/posts/{post}', 'PostController@update')->name('post.update');
Route::patch('/posts/{post}/comment', 'CommentController@update')->name('comment.update');

Route::delete('/posts/{post}', 'PostController@destroy')->name('post.destroy');

Route::get('/posts/update', 'PostController@update');
Route::get('/posts/delete', 'PostController@delete');
Route::get('/posts/first_or_create', 'PostController@firstOrCreate');
Route::get('/posts/update_or_create', 'PostController@updateOrCreate');

Route::get('/main', 'MainController@index')->name('main.index');
Route::get('/contact', 'ContactController@index')->name('contact.index');
Route::get('/about', 'AboutController@index')->name('about.index');
