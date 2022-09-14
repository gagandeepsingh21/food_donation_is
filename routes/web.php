<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\UserController;
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

Route::get('/', function () {
    return view('welcome');
});


Auth::routes();

Route::prefix('user')->name('user.')->group(function(){

    Route::middleware(['guest:web','PreventBackHistory'])->group(function(){
        Route::view('/login', 'user.login')->name('userLogin');
        Route::view('/register', 'user.register')->name('userRegister');
        Route::post('/check',[UserController::class,'check'])->name('check');
        Route::post('/create',[UserController::class,'create'])->name('create');
        
    });

    Route::middleware(['auth:web','PreventBackHistory'])->group(function(){
        Route::view('/dashboard','user.dashboard')->name('dashboard');
        Route::post('/logout', [UserController::class,'logout'])->name('logout');
        Route::view('/reports', 'user.reports')->name('reports');
        Route::view('/adduser','user.adduser')->name('adduser');
        Route::view('/userdetails', 'user.userdetails')->name('userdetails');
        Route::view('/postdonation', 'user.postdonation')->name('postdonation');
        

    });

});
