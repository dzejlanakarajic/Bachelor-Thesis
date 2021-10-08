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

Route::get('/', 'HomepageController@index')->name('welcome');

Auth::routes();

Route::prefix('manage')->middleware('role:administrator|coordinator|professor')->group(function(){
    Route::get('/', 'HomeController@index')->name('home');
    Route::resource('users', 'UserController');
    Route::resource('topics','TopicController');
    Route::resource('categories', 'CategoryController', ['except' => ['create']]);
    Route::resource('tasks','TaskController');
    Route::resource('deadlines','DeadlineController');
    Route::resource('permissions', 'PermissionController', ['except' => 'destroy']);
    Route::resource('roles', 'RoleController', ['except' => 'destroy']);
});

Route::get('/home', 'HomeController@index')->name('home');
Route::post('/sendFeedback', 'HomepageController@sendFeedback')->name('sendFeedback');
Route::get('/feedbacks', 'HomeController@getFeedbacks')->name('feedbacks');
Route::get('/topics', 'HomepageController@all')->name('topics');
Route::get('/topics/{topic}', ['as' => 'topic.single', 'uses' => 'HomepageController@single']);
Route::get('/topics/category/{category}', ['as' => 'category', 'uses' => 'HomepageController@category']);

Route::group(['prefix' => 'messages'], function () {
    Route::get('/', ['as' => 'messages', 'uses' => 'MessagesController@index']);
    Route::get('create', ['as' => 'messages.create', 'uses' => 'MessagesController@create']);
    Route::post('/', ['as' => 'messages.store', 'uses' => 'MessagesController@store']);
    Route::get('{id}', ['as' => 'messages.show', 'uses' => 'MessagesController@show']);
    Route::put('{id}', ['as' => 'messages.update', 'uses' => 'MessagesController@update']);
});

Route::middleware('role:student')->group(function() {
    Route::resource('applyThesis', 'ApplyController');
});

Route::get('/email', 'HomeController@email')->name('sendEmail');