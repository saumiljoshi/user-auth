<?php

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Middleware\Usercheck;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UsersController;

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

Route::get('/', function () {
    return view('welcome');
});




Route::post('/register',[HomeController::class,'create'])->name('register')->middleware('guest');
Route::get('/register', [HomeController::class,'view']);
Route::get('/login',[HomeController::class, 'login']);
Route::post('/login',[HomeController::class,'check'])->name('check');
Route::prefix('admin')->middleware('auth')->group(function () {
    Route::resource('users', UsersController::class);
    Route::get('/dashboard',[HomeController::class,'dashboard'])->name('dashboard');
    Route::get('/profile',[HomeController::class,'profile']);
    Route::get('/logout',[HomeController::class, 'logout'])->name('logout');
    //Route::get('/edit',[CrudController::class,'edit']);
    //Route::post('/edit',[CrudController::class, 'update'])->name('update');
   // Route::post('/register',[HomeController::class,'create'])->name('register');

});

