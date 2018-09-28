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

/*Route::get('/', function () {
    return view('welcome');
});*/


Route::get('/', 'PagesController@index');
Route::get('/about', 'PagesController@about');
Route::get('/services', 'PagesController@services');
Route::resource('posts', 'PostsController');
Route::resource('sells', 'SellsController');
Route::resource('globals', 'GlobalsController');

/*Route::get('/about', function () {
    //return view('welcome');
    return view('pages.about');
});*/

/*Route::get('/users/{id}', function($id){
    return 'This is user ' .$id;
});*/
Auth::routes();

Route::get('/dashboard', 'DashboardController@index');
