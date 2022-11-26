<?php

use App\Http\Controllers\Api\Auth\LoginController;
use App\Http\Controllers\Api\ProductController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\Auth\RegistrationController;
use App\Http\Controllers\Api\Farmers\ProfileController;
use App\Http\Controllers\Api\MailController;
use App\Http\Controllers\Api\SubscriptionController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/register', [RegistrationController::class, 'Registration']);
Route::post('/login', [LoginController::class, 'Login']);

// ! Farmers Routes start from here
// *"allProducts" route is for getting all products from the database
Route::get('/allProducts', [ProductController::class, 'allproducts']);
Route::post('/searchProducts', [ProductController::class, 'searchProducts']);
Route::middleware('auth:sanctum')->group(function () {
    Route::get('/farmersProfileData', [ProfileController::class, 'farmersProfileData']);
    Route::patch('/updateProfile', [ProfileController::class, 'updateProfile']);
    // *Mail routes start from here
    Route::post('/sendMail', [MailController::class, 'send']);
    Route::get('/mail/{id}', [MailController::class, 'mails']);
    Route::get('/mails/search', [MailController::class, 'searchMails']);
    Route::delete('/mails/delete/{id}', [MailController::class, 'deleteMail']);
    // *Mail routes end here
    // *subscribe routes start from here
    Route::get('/subscriptions', [SubscriptionController::class, 'getAllSubcriptionPlan']);
    Route::post('/subscribe/{id}', [SubscriptionController::class, 'subscribe']);
    // *subscribe routes end here

});
