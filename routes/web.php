<?php

use App\Http\Controllers\Farmers\ProfileController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\Farmers\RegistrationController;
use App\Http\Controllers\MailController;
use App\Http\Controllers\Auth\Admins\RegistrationController as adminRegister;
use App\Http\Controllers\Auth\Admins\AdminProfileController;
use App\Http\Controllers\Auth\Admins\planCreateCotroller;
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
    Route::get('mail', [MailController::class, 'index'])->name('mail');
    Route::post('send/mail', [MailController::class, 'send'])->name('send.mail');
    Route::get('/view/mail/{id}', [MailController::class, 'view'])->name('view.mail');
});
//admins route
Route::get('admin/signup', [adminRegister::class, 'showRegistrationForm']);
Route::post('admin/register', [adminRegister::class, 'register'])->name('admin.register');
Route::get('admin/profile', function () {
    return view('dashboards.admin');
})->name('admins.dashboard');




Route::get('plan_create', [planCreateCotroller::class, 'plancreate'])->middleware('adminupdatecheck');
Route::post('/plan_submit', [planCreateCotroller::class, 'plansubmit']);



Route::get('/adminupdate', [AdminProfileController::class, 'adminprofile']);
Route::post('/startupdate', [AdminProfileController::class, 'goupdate']);

Route::get('/backdashboard', function () {
    return redirect('/welcome');
});


//logout
Route::get('/logout', function () {
    Auth::logout();
    return redirect('/signin');
});

//test routes
Route::get('/test', [TestController::class, 'index']);
Route::post('/test', [TestController::class, 'test']);
