<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Mail;
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
use App\Http\Controllers\EmailVerifyController;

Route::get('/user/{id}', [UserController::class, 'show']);
Route::get('/user/login/{username?}/{passward?}', [UserController::class, 'login'])->name('1login');
Route::get('/user/register/{username}/{passward}/{email}', [UserController::class, 'register']);
Route::get('/user/profile/{username}', [UserProfileController::class, 'show']);
Route::get('/user/profile/update/{username}', [UserProfileController::class, 'update']);
// Route::get('/vue/login/', [UserProfileController::class, 'update'])->name('login');

Route::get('send-mail', function () {
    $details = [
        'title' => 'Email NewUserVeriFication',
    'body' => 'This is NewUserVeriFication, you code is',
    'code'=> '123213'
  ];
    Mail::to('xqh1997@qq.com')->send(new \App\Mail\NewUserVeriFication($details));
   
    dd("Email is Sent.");
});

Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');
// use Illuminate\Foundation\Auth\EmailVerificationRequest;
// use Illuminate\Support\Facades\Auth;


Route::get('/email/verify/{id}/{hash}', [EmailVerifyController::class, '__invoke'])
    ->middleware(['signed', 'throttle:6,1'])
->name('verification.verify');


// Route::get('/forgot-password', function () {
//     return view('auth.forgot-password');
// })->middleware('guest')->name('password.request');
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;

Route::post('/forgot-password', function (Request $request) {
    $request->validate(['email' => 'required|email']);

    $status = Password::sendResetLink(
        $request->only('email')
    );

    return $status === Password::RESET_LINK_SENT
                ? back()->with(['status' => __($status)])
                : back()->withErrors(['email' => __($status)]);
})->middleware('guest')->name('password.email');

