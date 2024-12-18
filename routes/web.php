<?php

use App\Models\JobApplication;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\auth\LoginController;
use App\Http\Controllers\page\FrontController;
use App\Http\Controllers\auth\RegisterController;
use App\Http\Controllers\admin\DashboardController;
use App\Http\Controllers\admin\data\LamaranController;
use App\Http\Controllers\admin\manajer\ManajerController;
use App\Http\Controllers\admin\stock\StockController;
use App\Http\Controllers\admin\vacancy\VacancyController;
use \App\Http\Controllers\manajer\data\PegawaiController as DataPegawaiController;
use App\Http\Controllers\pegawai\absen\PegawaiController;

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

    //lamaran
    Route::get('/lamaran', [LamaranController::class, 'index'])->name('lamaran.index');
    Route::get('/lamaran/detail/{id}', [LamaranController::class, 'detail'])->name('lamaran.detail');
    Route::get('/cv/view/{id}', function ($id) {
        $application = JobApplication::with('lamaran')->findOrFail($id);
        $cvPath = $application->lamaran->cv;
        $filePath = storage_path("app/public/{$cvPath}");
        if (file_exists($filePath)) {
            return response()->file($filePath);
        }
        return abort(404, 'CV tidak ditemukan.');
    })->name('cv.view');
    Route::post('/lamaran/update/{id}', [LamaranController::class, 'update'])->name('lamaran.update');

    //stock
    Route::get('/monitor/stock', [StockController::class, 'index'])->name('stock.index');

    //Vacancy
    Route::get('/vacancy', [VacancyController::class, 'index'])->name('vacancy.index');
    Route::get('/vacancy/add', [VacancyController::class, 'add'])->name('vacancy.add');
    Route::post('/vacancy/store', [VacancyController::class, 'store'])->name('vacancy.store');
    Route::post('/vacancy/edit/{id}', [VacancyController::class, 'update'])->name('vacancy.update');
    Route::post('/vacancy/delete/{id}', [VacancyController::class, 'destroy'])->name('vacancy.delete');
});

Route::middleware(['auth', 'manajer'])->group(function () {
    Route::get('/manajer', [\App\Http\Controllers\manajer\dashboard\DashboardController::class, 'index'])->name('manajer');
    Route::get('/list/pegawai', [DataPegawaiController::class, 'index'])->name('data');
    Route::post('create/pegawai', [DataPegawaiController::class, 'store'])->name('create.pegawai');
    Route::get('/stock', [\App\Http\Controllers\manajer\stock\StockController::class, 'index'])->name('stock');
});

Route::middleware(['auth:pegawai'])->group(function () {
    Route::get('/pegawai', [PegawaiController::class, 'index'])->name('pegawai.dashboard');
    Route::post('/absen/masuk', [PegawaiController::class, 'absenMasuk'])->name('absen.masuk');
    Route::post('/absen/keluar', [PegawaiController::class, 'absenPulang'])->name('absen.keluar');
});


Route::get('/', [FrontController::class, 'index'])->name('home');
Route::get('/about', [FrontController::class, 'about'])->name('about');

//career
Route::get('/career', [FrontController::class, 'career'])->name('career');
Route::get('/career/detail/{id}', [FrontController::class, 'detail'])->name('career.detail');
Route::get('/career/detail/{id}/apply', [FrontController::class, 'applyForm'])->name('career.apply');
Route::post('/career/{id}/send', [FrontController::class, 'store'])->name('career.upload');
