<?php

use App\Http\Controllers\LaporanController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GuruController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LombaController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\JadwalController;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\DatakostController;
use App\Http\Controllers\PenggunaController;
use App\Http\Controllers\PresensiController;
use App\Http\Controllers\MataPelajaranController;
use App\Http\Controllers\Mobile\HomeMobileController;
use App\Http\Controllers\Mobile\LoginMobileController;

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
    if (auth()->user()) {
        return redirect('dashboard');
    }
    return redirect('login');
});

Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'proses'])->name('proses.login');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/dashboard', [HomeController::class, 'index'])->name('dashboard');

Route::resource('siswa', SiswaController::class);
Route::get('import-data-view', [SiswaController::class, 'import_data_view'])->name('import_data_view');
Route::post('import-data', [SiswaController::class, 'import_data'])->name('import_data');
Route::resource('mata-pelajaran', MataPelajaranController::class);
Route::resource('kelas', KelasController::class);
Route::resource('guru', GuruController::class);
Route::resource('presensi', PresensiController::class);
Route::post('simpan/sesi', [PresensiController::class, 'simpan_sesi'])->name('presensi.simpan_sesi');
Route::post('/presensi/ajax-update-presensi', [PresensiController::class, 'ajax_update_presensi'])->name('presensi.ajax.update');
Route::get('/presensi-laporan', [PresensiController::class, 'laporan'])->name('presensi.laporan');
Route::get('/presensi-filter-laporan', [PresensiController::class, 'filterLaporan'])->name('presensi.filterLaporan');
Route::get('/presensi-export-laporan', [PresensiController::class, 'exportLaporan'])->name('presensi.exportLaporan');



