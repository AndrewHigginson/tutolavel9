<?php

use App\Http\Controllers\CreateController;
use App\Http\Controllers\FormValidationController;
// call the controller
use App\Http\Controllers\SubmitController;
// call the submit form controller
use App\Http\Controllers\SubmitFormController;
use App\Http\Controllers\TestController;
// call the form validation
use App\Http\Controllers\view;
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

Route::view('/', 'welcome');
Route::view('about', 'pages.about');
Route::view('contact', 'pages.contact');

Route::get('test', [TestController::class, 'test']);

Route::get('createcontroller/{user}', [CreateController::class, 'index']);

// view lesson
// Route::view('view', 'view');
// Route::get('/view/{name}', function ($name) {
//     //echo $name;
//     return view('view', ['name'=> $name]);
// });
// view route
Route::get('view/{name}', [view::class, 'loadView']);

// Laravel 9 tutorial: Submit form
//Route::view('login', 'login');
Route::post('submit', [SubmitFormController::class, 'index']);

// exercice du submit
Route::view('loginpage', 'LoginBis');
Route::post('submitbis', [SubmitController::class, 'getData']);

// form validation
Route::post('formavalid', [FormValidationController::class, 'index']);
Route::view('formvalid', 'formValidation');

// what is middleware
Route::view('groupemiddleware', 'pages.groupemiddleware');
Route::view('noaccess', 'noaccess');

// group middleware
Route::group(['middleware' => ['protectedPage']], function(){
    Route::view('login', 'login');
});