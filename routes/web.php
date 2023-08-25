<?php

use App\Http\Controllers\randrPasswordController;
use App\Http\Controllers\signinController;
use App\Http\Controllers\signupController;
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

Route::get('/', function () {
    return view('welcome');
});
Route::get('/sign-up', [signupController::class, 'showSignupPage'])->name('signup');
Route::get('sign-in', [signinController::class, 'showSigninPage'])->name('signin');
Route::get('/forgot-password', [randrPasswordController::class, 'showForgotPasswordPage'])->name('forgot-password');
