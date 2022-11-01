<?php

use App\Http\Controllers\Auth\Farmers\LoginController;
use App\Http\Controllers\Auth\Farmers\RegistrationController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
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

//* get routes

Route::get('/', function () {
    return view('welcome');
});

Route::get('/signin', function () {
    return view('auth.signin');
});
Route::get('/signup', [RegistrationController::class, 'showRegistrationForm']);
Route::get('/dashboard', function () {
    return view('dashboards.farmers');
})->name('farmers.dashboard')->middleware('validUser');
//logout
Route::get('/logout', function () {
    Auth::logout();
    return redirect('/signin');
});
//* post routes
Route::post('register', [RegistrationController::class, 'register']);
Route::post('login', [LoginController::class, 'login']);
