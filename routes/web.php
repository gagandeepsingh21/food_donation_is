<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\UserController;

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


Auth::routes();

Route::prefix('user')->name('user.')->group(function(){

    Route::middleware(['guest','PreventBackHistory'])->group(function(){
        Route::view('/login', 'user.login')->name('userLogin');
        Route::view('/register', 'user.register')->name('userRegister');
        Route::post('/check',[UserController::class,'check'])->name('check');
        Route::post('/create',[UserController::class,'create'])->name('create');
        Route::view('/adduser',[UserController::class,'create'])->name('adduser');
    });

    Route::middleware(['auth','PreventBackHistory'])->group(function(){
        Route::view('/dashboard','user.dashboard')->name('dashboard');
        Route::post('/logout', [UserController::class,'logout'])->name('logout');
    });

});
