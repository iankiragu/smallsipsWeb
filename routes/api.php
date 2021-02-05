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
Route::post('login', 'API\UserController@login');
Route::post('register', 'API\UserController@register');
Route::group(['middleware' => 'auth:api'], function(){
    Route::post('details', 'API\UserController@details');
});

//Facilities
Route::get('/get_facilities','Api\BackendApiController@get_facilities');

//Services
Route::get('/get_services','Api\BackendApiController@get_services');

//Doctors
Route::get('/get_doctors_json', 'Api\BackendApiController@get_doctors');

//Hospitals
Route::get('/get_hospitals', 'API\BackendApiController@get_hospitals');

Route::post('/process_appointments', 'API\BackendApiController@process_appointments');

//Hospitals
Route::post('get_appointments', 'API\BackendApiController@get_appointments');


