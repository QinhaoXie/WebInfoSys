<?php

use App\Http\Controllers\CourseController;
use App\Http\Controllers\UploadFile;
use App\Models\User;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;
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
Route::get('/pdf', function () {
  require('../app/fpdf/fpdf.php');

  $pdf = new FPDF();
  $pdf->AddPage();
  $pdf->SetFont('Arial','B',16);
  $pdf->Cell(40,10,'Recept!');

  $pdf->Cell(40,10,'Hello World!');
  $pdf->Cell(40,10,'Thank you for purchasing our course!');
  $pdf->Output('D', 'report.pdf');;
  return 'Hello World';
});

Route::get('/test', function (Request $request) {
  $user = new User();
  // if (Auth::attempt($credentials)) 
  dd($user->login('xqh123','sss')->isEmpty());
});
Route::get('/getuser', function () {
	return 'Hello World';
});
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserProfileController;
use App\Http\Controllers\EmailVerifyController;
use App\Models\Course;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

Route::get('/user/{id}', [UserController::class, 'show']);
// Route::get('/user/login/{username?}/{passward?}', [UserController::class, 'login'])->name('1login');
Route::post('/user/login', [UserController::class, 'login'])->name('loginreq');
Route::get('/userlogout', [UserController::class, 'logout'])->name('logoutreq');
Route::get('/user/register/{username}/{passward}/{email}/{bestfriend}/{favoritetoy}/', [UserController::class, 'register']);
Route::get('/user/update/{username}/{passward}/{email}/{bestfriend}/{favoritetoy}/', [UserController::class, 'update']);
Route::get('/user/profile/{email}', [UserProfileController::class, 'show']);
Route::post('/user/profile/update/', [UserProfileController::class, 'update']);
Route::post('/file/upload/', [UploadFile::class, 'upload']);
Route::post('/file/image/', [UploadFile::class, 'image']);
// Route::get('/vue/login/', [UserProfileController::class, 'update'])->name('login');

Route::get('/course/index/{coursename}/{offset}/', [CourseController::class, 'index']);
Route::get('/course/index/autocomp/{coursename}', [CourseController::class, 'autocomp']);
Route::get('/course/create/{coursename}/{teacher}/{course_description}/{lecture_number}/{coursebooks}'
  , [CourseController::class, 'create']);
Route::get('/shopping/index', [CourseController::class, 'index']);








//APIs
//
//

Route::get('/dash/coursecount', function () {
  # code...
  return  DB::table('courses')
    ->select("count(id)")
    ->groupByRaw("id")
    ->get();
});






Route::post('/email/verification-notification', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();

    return back()->with('message', 'Verification link sent!');
})->middleware(['auth', 'throttle:6,1'])->name('verification.send');







Route::get('send-mail', function () {
    $details = [
        'title' => 'Email NewUserVeriFication',
    'body' => 'This is NewUserVeriFication, you code is',
    'code'=> '123213'
  ];
    Mail::to('xqh520@gmail.com')->send(new \App\Mail\NewUserVeriFication($details));
   
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


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
