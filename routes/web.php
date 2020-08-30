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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes(['verify' => true]);

/*Route::get('user/{id}', function ($id){
    return 'User '.$id;
});
*/

Route::get('/home', 'HomeController@index')->name('home');
//Route::get('{any}', 'HomeController@index')->where('any', '.*');
Route::get('/contacts/index', 'ContactController@index');
Route::get('/contacts/create', 'ContactController@create')->name('create');
Route::get('/contacts/edit/{id}', 'ContactController@edit')->name('edit');
Route::get('/contacts/delete/{id}', 'ContactController@destroy')->name('delete');
Route::post('/contacts/detele/{id}', 'ContactController@destroy');
Route::post('/contacts/index', 'ContactController@store');

//Route::resource('contacts', 'ContactController');
//Route for normal user
//Route::group(['middleware' => ['auth']], function () {
//    Route::get('/home', 'HomeController@index');
    //Route::get('/home', 'CompanyController@index');
//});
//Route for admin
//Route::group(['prefix' => 'admin'], function(){
//    Route::group(['middleware' => ['admin']], function(){
        //Route::get('/admin/index', 'admin\AdminController@index');
        //Route::get('/admin/index', 'UserController@index');
//        Route::get('/contacts/index', 'ContactController@index');
//    });
//});

//Route for admin CRUD
//Route::resource('admin','UserController');
//Route::get('/admin', 'UserController@index');
//Route::get('/admin/edit/{id}', 'UserController@edit')->name('edit');
//Route::get('/admin/delete/{id}', 'UserController@delete')->name('delete');
//Route::post('/admin/update/{id}', 'UserController@update')->name('update');
//Route::post('/admin/store', 'UserController@store')->name('store');

//Route for update info
//Route::get('/home', 'CompanyController@store');
//Route::post('profile', 'CompanyController@store')->name('fileUpload');



//Route for Chat Room

Route::get('chat', 'ChatController@chat');
Route::post('/send/{session}', 'ChatController@send');
Route::post('saveToSession', 'ChatController@saveToSession');
Route::post('getOldMessages', 'ChatController@getOldMessages');
Route::post('deleteSession', 'ChatController@deleteSession');
Route::get('check', function(){
    return session('chat');
});

Route::post('/session/create', 'SessionController@create');
Route::post('/session/{session}/chats', 'ChatController@chats');
Route::post('/session/{session}/read', 'ChatController@read');
Route::post('/session/{session}/clear', 'ChatController@clear');
Route::post('/session/{session}/block', 'BlockController@block');
Route::post('/session/{session}/unblock', 'BlockController@unblock');

