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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/home/create', 'ArticleController@create')->middleware('ufc');			// create a new article whilte user is logged in
Route::post('/home/create', 'ArticleController@store'); 		// post a new article
Route::get('/home/publication', 'ArticleController@myPublication');

Route::post('/home/delete/{id}','ArticleController@deletePublication');

Route::get('/home/edit/{id}', 'ArticleController@editArticle');
Route::post('/home/edit/{id}', 'ArticleController@saveEditArticle');

Route::get('/', 'UserController@welcome');						//home page contains all article links
Route::get('/guest/{title}', 'UserController@showArticle'); 	// single article without having to login
Route::get('/home','UserController@home'); 						// contain all articles list with login
Route::get('/home/{title}','UserController@article'); 			// single article with details
Route::get('/login', 'UserController@index'); 					// login page
Route::get('/register', 'UserController@create'); 				// register user
Route::get('/logout','UserController@logout'); 					// logout page
 


Route::post('/home/{title}','UserController@comment');			// post a comment onto an existing article.
Route::post('/login', 'UserController@login'); 					// loign
Route::post('/register', 'UserController@store'); 				// register a new user








