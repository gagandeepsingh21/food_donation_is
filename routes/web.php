<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\User\ContactController;
use App\Http\Controllers\User\PostDonationController;
use App\Http\Controllers\User\DonationsMadeController;
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
        Route::get('/reports', [DonationsMadeController::class,'report1'])->name('reports');
        Route::get('/report1a', [DonationsMadeController::class,'report2'])->name('report1a');
        Route::get('/report2a', [DonationsMadeController::class,'report3'])->name('report2a');
        Route::get('/report', [DonationsMadeController::class,'reportorg'])->name('report');
        Route::view('/adduser','user.adduser')->name('adduser');
        Route::post('/addadmin',[UserController::class,'addadmin'])->name('addadmin');
        Route::get('/blocked/{id}',[UserController::class,'blocked']);
        Route::get('/userdetails', [UserController::class, 'showdetails'])->name('userdetails');
        Route::get('/unapprovedposts', [PostDonationController::class, 'unverified'])->name('unapprovedposts');
        Route::get('/approvedposts', [PostDonationController::class, 'apporovedposts'])->name('approvedposts');
        Route::get('/vdonationposts', [PostDonationController::class, 'vposts'])->name('vdonationposts');
        Route::view('/postdonation', 'user.postdonation')->name('postdonation');
        Route::post('/upload', [PostDonationController::class, 'upload'])->name('upload');
        Route::get('/unverifiedposts',[PostDonationController::class, 'approve'])->name('unverifiedposts');
        Route::get('/approved/{id}',[PostDonationController::class, 'changestatus']);
        Route::get('/disapprove/{id}',[PostDonationController::class, 'disapprove']);
        Route::get('/vverifiedpost/{id}',[PostDonationController::class, 'vverifiedpost'])->name('vverifiedpost');
        Route::get('/vunverifiedposts/{id}',[PostDonationController::class, 'vunverifiedpost'])->name('vunverifiedpost');
        Route::get('/vapprovedpost/{id}',[PostDonationController::class, 'vapprovedpost'])->name('vapprovedpost');
        Route::get('/vdisapprovedpost/{id}',[PostDonationController::class, 'vdisapprovedpost'])->name('vdisapprovedpost');
        Route::get('/vapost/{id}',[PostDonationController::class, 'vapost'])->name('vapost');
        Route::get('/verifiedpost',[PostDonationController::class,'approveddetails'])->name('verifiedpost');
        Route::get('/viewcontacts', [ContactController::class, 'showdetails'])->name('viewcontacts');
        Route::get('/deleteapprpost/{id}',[PostDonationController::class,'deleteapprpost'])->name('deleteapprpost');
        Route::get('/paedit/{id}',[PostDonationController::class,'upost'])->name('paedit');
        Route::put('/update-post/{id}',[PostDonationController::class,'updatepost'])->name('update-post');
        Route::view('/makedonation','user.makedonation')->name('makedonation');
        Route::post('/postdonation',[DonationsMadeController::class,'mdonation'])->name('postdonation');
        Route::get('/vdonationmade',[DonationsMadeController::class,'index'])->name('vdonationmade');
        Route::get('/mdonation/{id}', [DonationsMadeController::class,'getdetails'])->name('mdonation');
        Route::put('/updatedetails/{id}',[UserController::class,'updatedetails'])->name('updatedetails');
        Route::get('/vdmade',[DonationsMadeController::class,'vdmade'])->name('vdmade');
        Route::get('/received/{id}',[DonationsMadeController::class,'received']);
        Route::get('/deactivate/{id}',[PostDonationController::class,'deactivate']);
        Route::view('/blog','user.blog')->name('blog');
        Route::post('/cblog',[PostDonationController::class,'cblog'])->name('cblog');
        Route::get('/vblog',[PostDonationController::class,'vblog'])->name('vblog');

    });

});
