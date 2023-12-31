<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;


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

//auth pages access
Route::get('/login',[LoginController::class,'Login'])->name('login.page');
Route::get('/register',[RegisterController::class,'Register'])->name('register.page');

//auth code
Route::post('/login',[LoginController::class,'LoginNew']);
Route::post('/register',[RegisterController::class,'NewMember']);
Route::get('/logout',[LoginController::class,'Logout']);

//admin panel
Route::get('/adminpanel',[AdminController::class,'Admin'])->name('admin.page');
