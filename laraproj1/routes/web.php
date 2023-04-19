<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/welcome', function () {
    return view('welcome');
});

Route::get('/', function () {
	return 'Hello World';
});

Route::get('/getuser', function () {
	return 'Hello World';
});
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserProfileController;

Route::get('/user/{id}', [UserController::class, 'show']);
Route::get('/user/login/{username}/{passward}', [UserController::class, 'login']);
Route::get('/user/register/{username}/{passward}/{email}', [UserController::class, 'register']);
Route::get('/user/profile/{username}', [UserProfileController::class, 'show']);
Route::get('/user/profile/update/{username}', [UserProfileController::class, 'update']);





