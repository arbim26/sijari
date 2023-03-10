<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CalegController;
use App\Http\Controllers\RelawanController;
use App\Http\Controllers\SupervisorController;

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
    return view('login');
})->middleware('auth');

Auth::routes();
 
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');



Route::group(['prefix'=>'admin', 'middleware'=>['isAdmin','auth']], function(){
    Route::get('dashboard',[AdminController::class,'index'])->name('admin.dashboard');
    Route::get('profile',[AdminController::class,'profile'])->name('admin.profile');
    Route::get('settings',[AdminController::class,'settings'])->name('admin.settings');
});

Route::group(['prefix'=>'user', 'middleware'=>['isUser','auth']], function(){
    Route::get('dashboard',[UserController::class,'index'])->name('user.dashboard');
    Route::get('profile',[UserController::class,'profile'])->name('user.profile');
    Route::get('settings',[UserController::class,'settings'])->name('user.settings');
});

Route::group(['prefix'=>'caleg', 'middleware'=>['isCaleg','auth']], function(){
    Route::get('dashboard',[CalegController::class,'index'])->name('caleg.dashboard');
});

Route::group(['prefix'=>'relawan', 'middleware'=>['isRelawan','auth']], function(){
    Route::get('dashboard',[RelawanController::class,'index'])->name('relawan.dashboard');
});

Route::group(['prefix'=>'supervisor', 'middleware'=>['isSupervisor','auth']], function(){
    Route::get('dashboard',[SupervisorController::class,'index'])->name('supervisor.dashboard');
}); 