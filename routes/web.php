<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CalegController;
use App\Http\Controllers\PartaiController;
use App\Http\Controllers\RelawanController;
use App\Http\Controllers\Auth\LoginController;

use App\Http\Controllers\MasyarakatController;
use App\Http\Controllers\SupervisorController;
use App\Http\Controllers\Auth\RegisterController;

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

// Route::resource('user', UserController::class);

Route::get('/caleg',[LoginController::class,'showCalegLoginForm'])->name('caleg.login-view');
Route::get('/register',[RegisterController::class,'showUserLoginForm'])->name('register');

Route::get('/caleg/register',[RegisterController::class,'showCalegRegisterForm'])->name('caleg.register-view');
Route::post('/caleg/login',[LoginController::class,'calegLogin'])->name('caleg.login');
Route::post('/caleg/register',[RegisterController::class,'createCaleg'])->name('caleg.register');


Route::get('/admin',[LoginController::class,'showAdminLoginForm'])->name('admin.login-view');
Route::get('/register',[RegisterController::class,'showUserLoginForm'])->name('register');

Route::get('/admin/register',[RegisterController::class,'showAdminRegisterForm'])->name('admin.register-view');
Route::post('/admin/login',[LoginController::class,'adminLogin'])->name('admin.login');
Route::post('/admin/register',[RegisterController::class,'createAdmin'])->name('admin.register');

Route::get('dashboard',[AdminController::class,'index'])->name('admin.dashboard')->middleware('auth:admin');
Route::get('chart',[AdminController::class,'chart'])->name('admin.chart')->middleware('auth:admin');
Route::get('admin/caleg',[AdminController::class,'caleg'])->name('caleg')->middleware('auth:admin');
Route::get('admin/supervisor',[AdminController::class,'supervisor'])->name('supervisor')->middleware('auth:admin');
Route::get('admin/relawan',[AdminController::class,'relawan'])->name('relawan')->middleware('auth:admin');
Route::resource('pengguna', AdminController::class)->middleware('auth:admin');
Route::resource('masyarakat', MasyarakatController::class)->middleware('auth:admin');
Route::resource('partai', PartaiController::class)->middleware('auth:admin');
Route::put('/update/{id}', [AdminController::class, 'update'])->middleware('auth:admin');

Route::post('/create/caleg', [AdminController::class, 'create_caleg'])->name('create.caleg')->middleware('auth:admin');
Route::post('/create/supervisor', [AdminController::class, 'create_supervisor'])->name('create.supervisor')->middleware('auth:admin');
Route::post('/create/relawan', [AdminController::class, 'create_relawan'])->name('create.relawan')->middleware('auth:admin');
// Route::group(['prefix'=>'admin', 'middleware'=>['Admin','auth']], function(){
    
//     Route::get('profile',[AdminController::class,'profile'])->name('admin.profile');
//     Route::get('settings',[AdminController::class,'settings'])->name('admin.settings');
// });


Route::group(['prefix'=>'caleg', 'middleware'=>['isCaleg','auth']], function(){
    Route::get('dashboard',[CalegController::class,'index'])->name('caleg.dashboard');
});

Route::group(['prefix'=>'relawan', 'middleware'=>['isRelawan','auth']], function(){
    Route::get('dashboard',[RelawanController::class,'index'])->name('relawan.dashboard');
});

Route::group(['prefix'=>'supervisor', 'middleware'=>['isSupervisor','auth']], function(){
    Route::get('dashboard',[SupervisorController::class,'index'])->name('supervisor.dashboard');
}); 