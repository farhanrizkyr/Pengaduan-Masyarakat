<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\RegisterAdminController;
use App\Http\Controllers\Petugas\RegisterPetugasController;
use App\Http\Controllers\User\HomeUserController;
use App\Http\Controllers\User\LoginController;
use App\Http\Controllers\User\PengaturanUserController;
use App\Http\Controllers\User\RegisterUserController;

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

Route::get('/admin/dashboard',[HomeController::class, 'index']);
Route::get('/admin/register-admin/',[RegisterAdminController::class, 'index']);
Route::post('/admin/proses-register/',[RegisterAdminController::class, 'create']);
Route::delete('admin/admin-delete/{id}',[RegisterAdminController::class,'destroy']);

Route::get('admin/petugas',[RegisterPetugasController::class,'index']);
Route::post('admin/register-petugas',[RegisterPetugasController::class,'create']);
Route::delete('/admin/delete-petugas/{id}',[RegisterPetugasController::class,'destroy']);
Route::post('/admin/edit-petugas/{id}',[RegisterPetugasController::class,'update']);
Route::get('/apps-user/dashboard',[HomeUserController::class,'index']);


Route::get('apps-user/login/',[LoginController::class,'index'])->name('login');
Route::get('apps-user/logout/',[LoginController::class,'logout'])->name('logout');
Route::post('apps-user/login/',[LoginController::class,'action'])->name('proses-login');

Route::get('apps-user/register/',[RegisterUserController::class,'index']);
Route::post('apps-user/register/',[RegisterUserController::class,'post_register'])->name('proses-register');

Route::get('apps-user/profile',[PengaturanUserController::class,'index']);
Route::post('apps-user/update-avatar/{id}',[PengaturanUserController::class,'update']);
Route::get('apps-user/edit-profile',[PengaturanUserController::class,'edit']);