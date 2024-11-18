<?php

use App\Http\Controllers\page\FrontController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\auth\LoginController;
use App\Http\Controllers\auth\RegisterController;
use App\Http\Controllers\admin\DashboardController;
use App\Http\Controllers\admin\manajer\ManajerController;
use App\Http\Controllers\admin\vacancy\VacancyController;
use \App\Http\Controllers\manajer\data\PegawaiController as DataPegawaiController;

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


Route::get('/cek', function () {
    return view('manajer.dashboard.index');
});


Route::middleware('auth')->group(function () {
    Route::post('/logout', [LoginController::class, 'logout']);
});

Route::middleware('guest')->group(function () {
    Route::get('/login', [LoginController::class, 'index'])->name('login');
    Route::post('/login/akun', [LoginController::class, 'login']);
    Route::get('/register', [RegisterController::class, 'index']);
    Route::post('/register/akun', [RegisterController::class, 'store']);
});


Route::middleware('admin')->group(function () {
    Route::get('/admin', [DashboardController::class, 'index'])->name('admin');
    //manajer
    Route::get('/manajer/data', [ManajerController::class, 'index'])->name('manajer.index');
    Route::post('/manajer/create', [ManajerController::class, 'store'])->name('tambah');
    Route::get('/manajer/detail', [ManajerController::class, 'look'])->name('edit');
    Route::post('/delete/{id}', [ManajerController::class, 'destroy'])->name('hapus');



    //Vacancy
    Route::get('/vacancy', [VacancyController::class, 'index'])->name('vacancy.index');
    Route::get('/vacancy/add', [VacancyController::class, 'add'])->name('vacancy.add');
    Route::post('/vacancy/store', [VacancyController::class, 'store'])->name('vacancy.store');


});

Route::middleware(['auth', 'manajer'])->group(function () {
    Route::get('/manajer', [\App\Http\Controllers\manajer\dashboard\DashboardController::class, 'index'])->name('manajer');
    Route::get('/list/pegawai', [DataPegawaiController::class, 'index'])->name('data');
});


Route::get('/', [FrontController::class, 'index'])->name('home');
//career
Route::get('/career', [FrontController::class, 'career'])->name('career');
Route::get('/career/detail', [FrontController::class, 'detail'])->name('career.detail');


