<?php

use App\Http\Controllers\Api\Auth\LoginController;
use App\Http\Controllers\Api\ProductController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\Auth\RegistrationController;
use App\Http\Controllers\Api\Farmers\ProfileController;

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

//Farmers Routes start from here
Route::post('/register', [RegistrationController::class, 'Registration']);
Route::post('/login', [LoginController::class, 'Login']);

// *"allProducts" route is for getting all products from the database
Route::get('/allProducts', [ProductController::class, 'allproducts']);

// *"farmersProfileData" route is for getting farmers profile data
Route::post('/farmersProfileData', [ProfileController::class, 'farmersProfileData'])->middleware('auth:sanctum');
