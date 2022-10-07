<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\User\ContactController;
use App\Http\Controllers\User\PostDonationController;
use App\Http\Controllers\User\Controller;
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
        Route::view('/contact', 'user.contact')->name('userContact');
        Route::post('/check',[UserController::class,'check'])->name('check');
        Route::post('/create',[UserController::class,'create'])->name('create');
        Route::post('/send',[ContactController::class,'send'])->name('send');

        
    });

    Route::middleware(['auth:web','PreventBackHistory'])->group(function(){
        Route::view('/dashboard','user.dashboard')->name('dashboard');
        Route::post('/logout', [UserController::class, 'logout'])->name('logout');
        Route::view('/reports', 'user.reports')->name('reports');
        Route::view('/adduser','user.adduser')->name('adduser');
        Route::post('/addadmin',[UserController::class,'addadmin'])->name('addadmin');
        Route::get('/userdetails', [UserController::class, 'showdetails'])->name('userdetails');
        Route::get('/unapprovedposts', [PostDonationController::class, 'unverified'])->name('unapprovedposts');
        Route::get('/approvedposts', [PostDonationController::class, 'apporovedposts'])->name('approvedposts');
        Route::view('/postdonation', 'user.postdonation')->name('postdonation');
        Route::post('/upload', [PostDonationController::class, 'upload'])->name('upload');
        Route::get('/unverifiedposts',[PostDonationController::class, 'approve'])->name('unverifiedposts');
        Route::get('/approved/{id}',[PostDonationController::class, 'changestatus']);
        Route::get('/disapprove/{id}',[PostDonationController::class, 'disapprove']);
        Route::get('/verifiedpost',[PostDonationController::class,'approveddetails'])->name('verifiedpost');
        Route::get('/viewcontacts', [ContactController::class, 'showdetails'])->name('viewcontacts');
        

    });

});
