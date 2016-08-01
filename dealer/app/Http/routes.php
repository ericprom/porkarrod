<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

//Auth Route
Route::auth();
Route::get('password/email', 'Auth\PasswordController@getEmail');
Route::post('password/email', 'Auth\PasswordController@postEmail');
Route::get('password/reset/{token}', 'Auth\PasswordController@getReset');
Route::post('password/reset', 'Auth\PasswordController@postReset');

//Menu Route
Route::get('/account/dashboard', 'Account\AccountController@dashboard')->middleware(['auth']);
Route::get('/account/profile', 'Account\AccountController@profile')->middleware(['auth']);
Route::get('/account/partners', 'Account\AccountController@partner')->middleware(['auth']);
Route::get('/account/shop', 'Account\AccountController@shop')->middleware(['auth']);

//Car Route
Route::get('/listing', 'Car\CarController@listing')->middleware(['auth']);
Route::get('/listing/edit/{id}', 'Car\CarController@editing')->middleware(['auth']);
Route::get('/car/{id}', 'Car\CarController@detail');

/////////////////////////////API V1/////////////////////////////////////////
Route::post('/api/v1/brands', 'Api\v1\BrandController@brands');

Route::post('/api/v1/account/profile', 'Api\v1\AccountController@profile');
Route::post('/api/v1/account/partners', 'Api\v1\AccountController@partners');
Route::post('/api/v1/avatar/upload', 'Api\v1\DropzoneController@uploadAvatar');
Route::get('/api/v1/avatar/select', 'Api\v1\DropzoneController@selectAvatar');

Route::post('/api/v1/car/import', 'Api\v1\CarController@import');
Route::post('/api/v1/car/select', 'Api\v1\CarController@select');
Route::post('/api/v1/car/upload', 'Api\v1\DropzoneController@uploadFiles');
Route::post('/api/v1/car/delete', 'Api\v1\DropzoneController@deleteImage');
Route::get('/api/v1/car/select', 'Api\v1\DropzoneController@selectFiles');
Route::post('/api/v1/car/sale', 'Api\v1\CarController@sale');
