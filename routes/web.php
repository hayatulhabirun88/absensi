<?php

use App\Http\Controllers\Mobile\EkstrakulikulerMobileController;
use App\Http\Controllers\Mobile\InformasiMobileController;
use App\Http\Controllers\Mobile\JadwalMobileController;
use App\Http\Controllers\Mobile\PendaftarMobileController;
use App\Http\Controllers\Mobile\PresensiMobileController;
use App\Http\Controllers\Mobile\RegistrasiMobileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LombaController;
use App\Http\Controllers\JadwalController;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\PembinaController;
use App\Http\Controllers\DatakostController;
use App\Http\Controllers\PenggunaController;
use App\Http\Controllers\PresensiController;
use App\Http\Controllers\PendaftarController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\RegistrasiController;
use App\Http\Controllers\EskulKategoriController;
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

// KATEGORI EKSTRAKULIKULER
Route::get('/eskul/kategori', [EskulKategoriController::class, 'index'])->name('eskul.kategori.index');
Route::get('/eskul/kategori/create', [EskulKategoriController::class, 'create'])->name('eskul.kategori.create');
Route::post('/eskul/kategori/', [EskulKategoriController::class, 'store'])->name('eskul.kategori.store');
Route::get('/eskul/kategori/{id}/edit', [EskulKategoriController::class, 'edit'])->name('eskul.kategori.edit');
Route::get('/eskul/kategori/search', [EskulKategoriController::class, 'search'])->name('eskul.kategori.search');
Route::put('/eskul/kategori/{id}', [EskulKategoriController::class, 'update'])->name('eskul.kategori.update');
Route::delete('/eskul/kategori/{id}', [EskulKategoriController::class, 'destroy'])->name('eskul.kategoridestroy');

// PENDAFTAR EKSTRAKULIKULER
Route::get('/eskul/pendaftar', [PendaftarController::class, 'index'])->name('eskul.pendaftar.index');
Route::get('/eskul/pendaftar/create', [PendaftarController::class, 'create'])->name('eskul.pendaftar.create');
Route::post('/eskul/pendaftar/', [PendaftarController::class, 'store'])->name('eskul.pendaftar.store');
Route::get('/eskul/pendaftar/{id}/edit', [PendaftarController::class, 'edit'])->name('eskul.pendaftar.edit');
Route::get('/eskul/pendaftar/search', [PendaftarController::class, 'search'])->name('eskul.pendaftar.search');
Route::put('/eskul/pendaftar/{id}', [PendaftarController::class, 'update'])->name('eskul.pendaftar.update');
Route::delete('/eskul/pendaftar/{id}', [PendaftarController::class, 'destroy'])->name('eskul.pendaftardestroy');

// LOMBA EKSTRAKULIKULER
Route::get('/eskul/lomba', [LombaController::class, 'index'])->name('eskul.lomba.index');
Route::get('/eskul/lomba/create', [LombaController::class, 'create'])->name('eskul.lomba.create');
Route::post('/eskul/lomba/', [LombaController::class, 'store'])->name('eskul.lomba.store');
Route::get('/eskul/lomba/{id}/edit', [LombaController::class, 'edit'])->name('eskul.lomba.edit');
Route::get('/eskul/lomba/search', [LombaController::class, 'search'])->name('eskul.lomba.search');
Route::put('/eskul/lomba/{id}', [LombaController::class, 'update'])->name('eskul.lomba.update');
Route::delete('/eskul/lomba/{id}', [LombaController::class, 'destroy'])->name('eskul.lombadestroy');

// PEMBINA
Route::get('/pembina', [PembinaController::class, 'index'])->name('pembina.index');
Route::get('/pembina/create', [PembinaController::class, 'create'])->name('pembina.create');
Route::post('/pembina/', [PembinaController::class, 'store'])->name('pembina.store');
Route::get('/pembina/{id}/edit', [PembinaController::class, 'edit'])->name('pembina.edit');
Route::get('/pembina/search', [PembinaController::class, 'search'])->name('pembina.search');
Route::put('/pembina/{id}', [PembinaController::class, 'update'])->name('pembina.update');
Route::delete('/pembina/{id}', [PembinaController::class, 'destroy'])->name('pembinadestroy');


// JADWAL EKSTRAKULIKULER
Route::get('/eskul/jadwal', [JadwalController::class, 'index'])->name('eskul.jadwal.index');
Route::get('/eskul/jadwal/create', [JadwalController::class, 'create'])->name('eskul.jadwal.create');
Route::post('/eskul/jadwal/', [JadwalController::class, 'store'])->name('eskul.jadwal.store');
Route::get('/eskul/jadwal/{id}/edit', [JadwalController::class, 'edit'])->name('eskul.jadwal.edit');
Route::get('/eskul/jadwal/search', [JadwalController::class, 'search'])->name('eskul.jadwal.search');
Route::put('/eskul/jadwal/{id}', [JadwalController::class, 'update'])->name('eskul.jadwal.update');
Route::delete('/eskul/jadwal/{id}', [JadwalController::class, 'destroy'])->name('eskul.jadwaldestroy');

// JADWAL EKSTRAKULIKULER
Route::get('/eskul/gallery', [GalleryController::class, 'index'])->name('eskul.gallery.index');
Route::get('/eskul/gallery/create', [GalleryController::class, 'create'])->name('eskul.gallery.create');
Route::post('/eskul/gallery/', [GalleryController::class, 'store'])->name('eskul.gallery.store');
Route::get('/eskul/gallery/{id}', [GalleryController::class, 'show'])->name('eskul.gallery.show');
Route::get('/eskul/gallery/{id}/edit', [GalleryController::class, 'edit'])->name('eskul.gallery.edit');
Route::get('/eskul/gallery/search', [GalleryController::class, 'search'])->name('eskul.gallery.search');
Route::put('/eskul/gallery/{id}', [GalleryController::class, 'update'])->name('eskul.gallery.update');
Route::delete('/eskul/gallery/{id}', [GalleryController::class, 'destroy'])->name('eskul.gallerydestroy');

// JADWAL EKSTRAKULIKULER
Route::get('/presensi', [PresensiController::class, 'index'])->name('presensi.index');
Route::post('/presensi', [PresensiController::class, 'store'])->name('presensi.store');
Route::put('/presensi/{id}', [PresensiController::class, 'update'])->name('presensi.update');
Route::delete('/presensi/{id}', [PresensiController::class, 'destroy'])->name('presensidestroy');
Route::post('/presensi/ajax-update-presensi', [PresensiController::class, 'ajax_presensi'])->name('presensi.ajax');
Route::get('/presensi/laporan', [PresensiController::class, 'laporan'])->name('presensi.laporan');
Route::get('/presensi/filter-laporan', [PresensiController::class, 'filter_laporan'])->name('presensi.filter_laporan');
Route::get('/presensi/laporan/all', [PresensiController::class, 'laporan_all'])->name('presensi.laporan_all');

// PENGGUNA
Route::get('/pengguna', [PenggunaController::class, 'index'])->name('pengguna');
Route::get('/pengguna/create', [PenggunaController::class, 'create'])->name('create.pengguna');
Route::post('/pengguna', [PenggunaController::class, 'store'])->name('store.pengguna');
Route::get('/pengguna/{level}', [PenggunaController::class, 'search'])->name('cari.pengguna');
Route::get('/pengguna/{id}/edit', [PenggunaController::class, 'edit'])->name('edit.pengguna');
Route::put('/pengguna/{id}', [PenggunaController::class, 'update'])->name('update.pengguna');
Route::delete('/pengguna/{id}', [PenggunaController::class, 'destroy'])->name('destroy.pengguna');

//PROFIL
Route::get('/profil', [ProfilController::class, 'index'])->name('profil');
Route::put('/profil/{id}', [ProfilController::class, 'update'])->name('profil.update');


//  MOBILE LOGIN
Route::get('/mobile/login', [LoginMobileController::class, 'index'])->name('mobile.login');
Route::post('/mobile/login', [LoginMobileController::class, 'proses'])->name('mobile.proses.login');
Route::get('/mobile/logout', [HomeMobileController::class, 'logout'])->name('mobile.logout');

//  MOBILE REGISTRASI
Route::get('/mobile/registrasi', [RegistrasiMobileController::class, 'index'])->name('mobile.registrasi');
Route::get('/mobile/registrasi_siswa', [RegistrasiMobileController::class, 'siswa'])->name('mobile.registrasi.siswa');
Route::get('/mobile/registrasi_orangtua', [RegistrasiMobileController::class, 'orang_tua'])->name('mobile.registrasi.orangtua');
Route::post('/mobile/proses_registrasi_siswa', [RegistrasiMobileController::class, 'proses_registrasi_siswa'])->name('mobile.registrasi.proses.siswa');
Route::post('/mobile/proses_registrasi_orang_tua', [RegistrasiMobileController::class, 'proses_registrasi_orang_tua'])->name('mobile.registrasi.proses.orangtua');

//  MOBILE AFTER LOGIN
Route::get('/mobile/dashboard', [HomeMobileController::class, 'index'])->name('mobile.dashboard');
Route::get('/mobile/setting', [HomeMobileController::class, 'setting'])->name('mobile.setting');
Route::post('/mobile/setting_proses_siswa', [HomeMobileController::class, 'proses_siswa'])->name('mobile.setting.proses.siswa');
Route::post('/mobile/setting_proses_orangtua', [HomeMobileController::class, 'proses_orangtua'])->name('mobile.setting.proses.orangtua');
Route::get('/mobile/jadwal', [JadwalMobileController::class, 'index'])->name('mobile.jadwal');
Route::get('/mobile/presensi', [PresensiMobileController::class, 'index'])->name('mobile.presensi');
Route::get('/mobile/informasi', [InformasiMobileController::class, 'index'])->name('mobile.informasi');
Route::get('/mobile/ekskul', [EkstrakulikulerMobileController::class, 'index'])->name('mobile.ekskul');
Route::get('/mobile/dataeskul', [PendaftarMobileController::class, 'index'])->name('mobile.dataeskul');