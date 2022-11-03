<?php

use App\Http\Controllers\Farmers\ProfileController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\Farmers\RegistrationController;
use App\Http\Controllers\TestController;
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

Route::middleware(['guest'])->group(function () {
    Route::get('/signup', [RegistrationController::class, 'showRegistrationForm']);
    Route::post('/register', [RegistrationController::class, 'register'])->name('register');
    Route::get('/signin', [LoginController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [LoginController::class, 'login']);
});

Route::middleware(['auth'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'showProfile'])->name('farmers.dashboard');
    Route::get('/profile/edit', [ProfileController::class, 'showProfileEdit'])->name('farmers.editProfile');
    Route::post('/updateProfile', [ProfileController::class, 'updateProfile'])->name('updateProfile');
});
//logout
Route::get('/logout', function () {
    Auth::logout();
    return redirect('/signin');
});

//test routes
Route::get('/test', [TestController::class, 'index']);
Route::post('/test', [TestController::class, 'test']);
