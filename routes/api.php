<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

//Route::middleware('auth:api')->get('/user', function (Request $request) {
//    return $request->user();
//});
//Authentication APIs
Route::post('login', 'Api\UserController@login');
Route::post('register', 'Api\UserController@register');
Route::group(['middleware' => 'auth:api'], function(){
    Route::post('details', 'Api\UserController@details');
});

//Facilities
Route::get('/get_facilities','Api\BackendApiController@get_facilities');

//Services
Route::get('/get_services','Api\BackendApiController@get_services');

//Doctors
Route::get('/get_doctors_json', 'Api\BackendApiController@get_doctors');

//Hospitals
Route::get('/get_hospitals', 'App\Http\Controllers\Api\BackendApiController@get_hospitals');

Route::post('/process_appointments', 'Api\BackendApiController@process_appointments');

//Hospitals
Route::post('get_appointments', 'Api\BackendApiController@get_appointments');


