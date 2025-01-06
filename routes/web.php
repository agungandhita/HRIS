<?php

use App\Models\JobApplication;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\auth\LoginController;
use App\Http\Controllers\page\FrontController;
use App\Http\Controllers\auth\RegisterController;
use App\Http\Controllers\admin\DashboardController;
use App\Http\Controllers\admin\stock\StockController;
use App\Http\Controllers\admin\data\LamaranController;
use App\Http\Controllers\admin\data\KaryawanController;
use App\Http\Controllers\manajer\data\IncomesController;
use App\Http\Controllers\admin\manajer\ManajerController;
use App\Http\Controllers\admin\vacancy\VacancyController;
use App\Http\Controllers\pegawai\absen\PegawaiController;
use App\Http\Controllers\manajer\approve\ApproveController;
use App\Http\Controllers\notification\NotificationController;
use App\Http\Controllers\admin\penggajian\PenggajianController;
use App\Http\Controllers\pegawai\pengajuan\PengajuanController;
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

    //cabang
    Route::get('/cabang/data', [ManajerController::class, 'index'])->name('cabang.index');
    Route::post('/cabang/create', [ManajerController::class, 'store'])->name('tambah.cabang');
    Route::get('/cabang/detail', [ManajerController::class, 'look'])->name('edit');
    Route::post('/cabang/delete/{id}', [ManajerController::class, 'destroy'])->name('hapus.cabang');

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


    //Vacancy
    Route::get('/vacancy', [VacancyController::class, 'index'])->name('vacancy.index');
    Route::get('/vacancy/add', [VacancyController::class, 'add'])->name('vacancy.add');
    Route::post('/vacancy/store', [VacancyController::class, 'store'])->name('vacancy.store');
    Route::post('/vacancy/edit/{id}', [VacancyController::class, 'update'])->name('vacancy.update');
    Route::post('/vacancy/delete/{id}', [VacancyController::class, 'destroy'])->name('vacancy.delete');

    //penggajian
    Route::get('/penggajian', [PenggajianController::class, 'index'])->name('penggajian.index');
    Route::post('/proses', [PenggajianController::class, 'prosesGaji'])->name('penggajian.proses');
    Route::post('/konfirmasi/{id}', [PenggajianController::class, 'konfirmasiPembayaran'])->name('penggajian.konfirmasi');
    Route::get('/admin/penggajian/riwayat', [PenggajianController::class, 'riwayat'])->name('penggajian.riwayat');
    Route::get('penggajian/slip/{id}/download', [PenggajianController::class, 'downloadSlipGaji'])
        ->name('admin.penggajian.download-slip');
    Route::get('penggajian/export-csv', [PenggajianController::class, 'exportExcel'])->name('admin.penggajian.export-csv');

    //karyawan
    Route::get('/karyawan', [KaryawanController::class, 'index'])->name('karyawan.index');
});

Route::middleware(['auth', 'manajer'])->group(function () {
    Route::get('/manajer', [\App\Http\Controllers\manajer\dashboard\DashboardController::class, 'index'])->name('manajer');
    //pegawai
    Route::get('/list/pegawai', [DataPegawaiController::class, 'index'])->name('data');
    Route::post('create/pegawai', [DataPegawaiController::class, 'store'])->name('create.pegawai');
    Route::post('/delete/{id}', [DataPegawaiController::class, 'destroy'])->name('delete.pegawai');

    // incomes
    // Route::get('/incomes',[IncomesController::class, 'index'])->name('income.index');
    //pengajuan
    Route::get('/list/pengajuan', [ApproveController::class, 'index'])->name('list.pengajuan');
    Route::post('/approve/{id}', [ApproveController::class, 'approve'])->name('approve.pengajuan');
    Route::post('/reject/{id}', [ApproveController::class, 'reject'])->name('reject.pengajuan');

    Route::get('/stock', [\App\Http\Controllers\manajer\stock\StockController::class, 'index'])->name('stock');
});

Route::middleware(['auth:pegawai'])->group(function () {
    Route::get('/pegawai', [PegawaiController::class, 'index'])->name('pegawai.dashboard');
    Route::post('/absen/masuk', [PegawaiController::class, 'absenMasuk'])->name('absen.masuk');
    Route::post('/absen/keluar', [PegawaiController::class, 'absenPulang'])->name('absen.keluar');
    Route::get('/check-absent', [PegawaiController::class, 'checkAbsent']);

    ///pengajuan
    Route::get('/form', [PengajuanController::class, 'index'])->name('absen.form');
    Route::post('/form/store', [PengajuanController::class, 'store'])->name('absen.store');
});




Route::get('/', [FrontController::class, 'index'])->name('home');
Route::get('/about', [FrontController::class, 'about'])->name('about');

//career
Route::get('/career', [FrontController::class, 'career'])->name('career');
Route::get('/career/detail/{id}', [FrontController::class, 'detail'])->name('career.detail');
Route::get('/career/detail/{id}/apply', [FrontController::class, 'applyForm'])->name('career.apply');
Route::post('/career/{id}/send', [FrontController::class, 'store'])->name('career.upload');
