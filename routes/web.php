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
//Website
Route::get('/', 'WebsiteController@index')->name('website.home');
Route::get('/home', 'WebsiteController@index')->name('website.home');
Route::get('/maps', 'WebsiteController@maps')->name('website.maps');
Route::get('/hospitals/{town?}', 'WebsiteController@hospitals')->name('website.hospitals');
Route::get('/doctors', 'WebsiteController@doctors')->name('website.doctors');
Route::get('/contact', 'WebsiteController@contact')->name('website.contact');
Route::get('/healthadvisor', 'WebsiteController@healthadvisor')->name('website.healthadvisor');
Route::get('/your_blood_pressure', 'WebsiteController@your_blood_pressure')->name('website.your_blood_pressure');
Route::get('/bmi_calculator', 'WebsiteController@bmi_calculator')->name('website.bmi_calculator');
Route::get('/weight_loss_guide', 'WebsiteController@weight_loss_guide')->name('website.weight_loss_guide');
Route::get('/eatwell_plate', 'WebsiteController@eatwell_plate')->name('website.eatwell_plate');
Route::get('/depression_self_assessment', 'WebsiteController@depression_self_assessment')->name('website.depression_self_assessment');
Route::get('/live_well', 'WebsiteController@live_well')->name('website.live_well');


Route::post('/process_contact','WebsiteController@process_contact')->name('website.process.contact');

//Appointments
Route::get('/appointment','WebsiteController@appointments')->name('website.appointments')->middleware('verified');;
Route::get('/get_doctors_json/{id}','WebsiteController@get_doctors_json')->name('website.get.doctors.json')->middleware('verified');;
Route::get('/get_hospitals_json/{id}','WebsiteController@get_hospitals_json')->name('website.get.hospitals.json')->middleware('verified');;
Route::post('/process_appointment','WebsiteController@process_appointments')->name('website.process.appointments')->middleware('verified');;
Route::get('/my_appointments/', 'WebsiteController@my_appointments')->name('website.my.appointments')->middleware('verified');


//Payments
Route::get('/payment/{id}','WebsiteController@mpesapayments')->name('website.mpesa.payments');
Route::post('/payment/send_mpesa_stk_push','Websitecontroller@stk_push')->name('website.send_stk_push');
Route::post('/payment/process_mpesa', 'Payment@mpesa_stkpush_callback')->name('payment.process.mpesa');
Route::post('/payment/confirm_payment', 'WebsiteController@confirm_payment')->name('website.confirm.payment');

Route::get('/stk-push','WebsiteController@mpesa_stk_push')->name('stk');

//Authentication
Auth::routes(['verify'=>true]);
Route::get('/personnel-register', 'PersonnelRegisterController@showRegistrationForm')->name('backend.register.user');
Route::post('/p-register', 'PersonnelRegisterController@register')->name('backend.register');

//Backend
Route::get('/dashboard', 'BackendController@dashboard')->name('backend.dashboard')->middleware('verified');
// Doctors
Route::get('/manage_doctors', 'BackendController@manage_doctors')->name('backend.manage.doctors')->middleware('verified');
Route::post('/verify_doctor', 'BackendController@verify_doctor')->name('backend.verify.doctor')->middleware('verified');
//Facilities
Route::post('/add_facilities','BackendController@add_facilities')->name('add.facilities')->middleware('verified');
Route::get('/get_facilities','BackendController@get_facilities')->name('backend.get.facilities')->middleware('verified');
//Services
Route::get('/get_services','BackendController@get_services')->name('backend.get.services')->middleware('verified');
Route::post('/add_services','BackendController@add_services')->name('add.services')->middleware('verified');
//Hospitals
Route::post('/migrate_hospitals','BackendController@migrate_hospitals')->name('backend.migrate.hospitals')->middleware('verified');
Route::get('/manage_hospitals','BackendController@manage_hospitals')->name('backend.manage.hospitals')->middleware('verified');
Route::get('/get_doctors_json','BackendController@get_doctors_json')->name('backend.get.doctors')->middleware('verified');
Route::post('/migrate_towns','BackendController@migrate_towns')->name('backend.migrate.towns')->middleware('verified');
Route::post('/map_towns','BackendController@map_towns')->name('backend.map.towns')->middleware('verified');

//Appointments
Route::get('/doctor/appointments', 'BackendController@appointments')->name('backend.doctor.appointments')->middleware('verified');
Route::get('/get_appointments','BackendController@get_appointments')->name('backend.get.appointments')->middleware('verified');
//Calls
Route::get('/make_call', 'BackendController@make_call')->name('backend.make_call');
Route::get('/answer_call', 'BackendController@answer_call')->name('backend.answer_call');
Route::get('/sendsms', 'BackendController@sendsms')->name('backend.sendsms');
