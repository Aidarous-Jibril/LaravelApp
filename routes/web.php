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
/*
Route::get('/', function () {
    return view('pages/index');
});
*/

//controll nameAndview
Route::get('/', 'pagescontroller@index'); //route goes to controller whch then returns whcih view to load, index 
Route::get('/about', 'pagescontroller@about');
Route::get('/services', 'pagescontroller@services');

//this creates all methods, such as index, show, create-store, edit->update, delete->destroy,
Route::resource('posts', 'PostsController');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//Comment router
Route::post('/comment/store', 'CommentsController@store');
