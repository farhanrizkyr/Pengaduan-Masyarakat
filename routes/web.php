<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\LoginAdminController;
use App\Http\Controllers\Admin\PengaturanAdminController;
use App\Http\Controllers\Admin\RegisterAdminController;
use App\Http\Controllers\Petugas\HomePetugasController;
use App\Http\Controllers\Petugas\ListPengaduanMasyarakatController;
use App\Http\Controllers\Petugas\LoginPetugasController;
use App\Http\Controllers\Petugas\PengaturanprofilPetugasController;
use App\Http\Controllers\Petugas\RegisterPetugasController;
use App\Http\Controllers\User\HomeUserController;
use App\Http\Controllers\User\LoginController;
use App\Http\Controllers\User\PengaduanController;
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
Route::post('apps-user/proses-edit-profile/{id}',[PengaturanUserController::class,'proses_edit']);


Route::get('apps-user/list-laporan-pengaduan/',[PengaduanController::class,'index']);
Route::get('apps-user/buat-laporan-pengaduan/',[PengaduanController::class,'create']);
Route::post('apps-user/proses-pengajuan-masyarakat/',[PengaduanController::class,'store']);
Route::delete('apps-user/delete-laporan/{id}',[PengaduanController::class,'destroy']);
Route::get('apps-user/edit-pengaduan/{id}',[PengaduanController::class,'edit']);
Route::post('apps-user/update-pengajuan-masyarakat/{id}',[PengaduanController::class,'update']);
Route::get('apps-user/history-pengaduan/',[PengaduanController::class,'history']);
Route::put('apps-user/ajukan-laporan-kembali/{id}',[PengaduanController::class,'ajukan']);
Route::delete('apps-user/histoty-delete/{id}',[PengaduanController::class,'history_delete']);

Route::get('apps-petugas/petugas/dashboard',[HomePetugasController::class,'index']);

Route::get('apps-petugas/list-laporan-pengaduan-masyarakat',[ListPengaduanMasyarakatController::class,'index']);
Route::get('apps-petugas/jawab-pengaduan/{id}',[ListPengaduanMasyarakatController::class,'edit']);
Route::post('apps-petugas/proses-jawab-pengaduan/{id}',[ListPengaduanMasyarakatController::class,'store']);
Route::get('apps-petugas/history-pengaduan-masyarakat',[ListPengaduanMasyarakatController::class,'history']);

Route::get('apps-petugas/login',[LoginPetugasController::class,'login_petugas'])->name('petugas.login');
Route::post('apps-petugas/login',[LoginPetugasController::class,'proses_login_petugas'])->name('proses-login-petugas');
Route::get('apps-petugas/logout',[LoginPetugasController::class,'keluar_petugas'])->name('logout-petugas');

Route::get('apps-petugas/profile',[PengaturanprofilPetugasController::class,'index']);
Route::post('apps-petugas/update-avatar/{id}',[PengaturanprofilPetugasController::class,'avatar']);
Route::get('apps-petugas/edit-profile',[PengaturanprofilPetugasController::class,'edit']);
Route::post('proses-edit-profile-petugas/{id}',[PengaturanprofilPetugasController::class,'update']);


Route::get('admin/login',[LoginAdminController::class,'loginadmin'])->name('admin.login');
Route::post('admin/login',[LoginAdminController::class,'post_log'])->name('proses-login-admin');
Route::get('admin/logout',[LoginAdminController::class,'keluar_admin'])->name('logout-admin');

Route::get('/admin/admin-profile',[PengaturanAdminController::class,'index']);
Route::get('admin/admin-edit-profile',[PengaturanAdminController::class,'edit']);
Route::post('proses-edit-profile-admin/{id}',[PengaturanAdminController::class,'update']);