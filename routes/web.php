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

Route::get('/', 'SiteController@main')->name('main');

Route::resource('/jobs', 'JobController');

Auth::routes();


Route::group([ 'prefix' => 'employeers', 'name' => 'employeers.', 'middleware' => 'auth:employeer' ], function (){
    //Employeer
    Route::get('/dashboard', 'EmployeerController@index')->name('employ.dash');
    Route::get('/view_profile', 'EmployeerController@view_profile')->name('employ.view_profile');
    Route::get('/edit_profile', 'HomeController@edit_profile')->name('employ.edit_profile');
    Route::get('/applicants/{job_id}', 'ApplicationController@show_applicants')->name('job.show_applicants');

});

Route::group([ 'prefix' => 'admin', 'name' => 'admin.', 'namespace' => 'Admin', 'middleware' => 'auth:admin'], function (){
    Route::get('/', 'DashboardController@index')->name('admin.dash');
    //Category Controller
    Route::resource('categories', 'CategoryController')->except(['show']);
    //Skills Crud
    Route::resource('skills', 'SkillsController')->except(['show']);
});

Route::group([ 'name' => 'users.', 'prefix' => 'users' , 'middleware' => 'auth:user'], function () {
    //Job Seeker- User
    Route::get('/user_dashboard', 'HomeController@index')->name('home');
    Route::get('/view_profile', 'HomeController@view_profile')->name('user.view_profile');
    Route::get('/edit_profile', 'HomeController@edit_profile')->name('user.edit_profile');
    Route::get('/public_profile/{user_id}', 'HomeController@public_profile')->name('user.public_profile');

    //User Personal Information
    Route::resource('/personalinfo', 'PersonalinfoController');
    //Education Controller
    Route::resource('/education', 'EducationController');
    //Apply for job
    Route::get('/apply/{job_id}', 'ApplicationController@create')->name('job.apply');

});


///New Multiauth

// Employer
Route::get('/login/employeer', 'Auth\LoginController@showEmployeerLoginForm')->name('employer.login.show');
Route::post('/login/employeer', 'Auth\LoginController@employeerLogin')->name('employer.login');
Route::get('/register/employeer', 'Auth\RegisterController@showEmployeerRegisterForm')->name('employer.register.show');
Route::post('/register/employeer', 'Auth\RegisterController@createEmployeer')->name('employer.register');

// User
Route::get('/login/user', 'Auth\LoginController@showUserLoginForm')->name('user.login.show');
Route::post('/login/user', 'Auth\LoginController@userLogin')->name('user.login');
Route::get('/register/user', 'Auth\RegisterController@showUserRegisterForm')->name('user.register.show');
Route::post('/register/user', 'Auth\RegisterController@createUser')->name('user.register');

// Admin
Route::get('/login/admin', 'Auth\LoginController@showAdminLoginForm')->name('admin.login.show');
Route::post('/login/admin', 'Auth\LoginController@adminLogin')->name('admin.login');

// After login show dashboards
//Route::view('/home', 'home')->middleware(['auth:user', 'auth:employeer']);
//Route::view('/employeer', 'employeer')->middleware(['auth:employeer']);
//Route::view('/user', 'user')->middleware(['auth:user']);



