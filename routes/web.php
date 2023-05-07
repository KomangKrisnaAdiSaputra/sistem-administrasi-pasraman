<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/about', [App\Http\Controllers\Masyarakat\MasyarakatController::class, 'about'])->name('masyarakat.about');
Route::get('/faq', [App\Http\Controllers\Masyarakat\MasyarakatController::class, 'faq'])->name('masyarakat.faq');
Route::get('/gallery', [App\Http\Controllers\Masyarakat\MasyarakatController::class, 'gallery'])->name('masyarakat.gallery');
Route::get('/contact', [App\Http\Controllers\Masyarakat\MasyarakatController::class, 'contact'])->name('masyarakat.contact');
Route::resource('/', App\Http\Controllers\Masyarakat\MasyarakatController::class, ['names' => 'masyarakat']);
Route::post('testimoni/masyarakatcreate', [App\Http\Controllers\Admin\TestimoniController::class, 'testimonimasyarakat'])->name('testimoni-masyarakat-create');


Route::get('login/logout', [App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');
// Route::get('login/zzzz', [App\Http\Controllers\Auth\LoginController::class, 'create']);
Route::resource('login', App\Http\Controllers\Auth\LoginController::class, ['names' => 'login']);

Route::group(['middleware' => 'auth'], function () {
    //DASHBOARD   
    Route::get('dashboard/chart', [App\Http\Controllers\Admin\DashboardController::class, 'chartTransaksi'])->name('chart');
    Route::resource('dashboard', App\Http\Controllers\Admin\DashboardController::class, ['names' => 'dashboard']);

    // TRANSAKSI
    // DATA TRANSAKSI
    Route::get('transaksi/tabel-transaksi/{tanggal}', [App\Http\Controllers\Admin\TransaksiController::class, 'tabelTransaksi']);
    Route::get('transaksi/daftar-upacara', [App\Http\Controllers\Admin\TransaksiController::class, 'daftarUpacara'])->name('daftar-upacara');
    Route::get('transaksi/daftar-banten', [App\Http\Controllers\Admin\TransaksiController::class, 'daftarBanten'])->name('daftar-banten');
    Route::get('transaksi/daftar-ulam', [App\Http\Controllers\Admin\TransaksiController::class, 'daftarUlam'])->name('daftar-ulam');
    Route::get('transaksi/ganti-status/{id}/{status}/{qtyy}', [App\Http\Controllers\Admin\TransaksiController::class, 'gantiStatus']);
    Route::get('transaksi/ganti-status-2/{status}', [App\Http\Controllers\Admin\TransaksiController::class, 'ganti_status'])->name('ganti-status');
    Route::get('transaksi/data-transaksi-upacara/{id}', [App\Http\Controllers\Admin\TransaksiController::class, 'daftarTransaksiUpacara'])->name('daftar-transaksi-upacara');
    Route::get('transaksi/data-transaksi-banten/{id}', [App\Http\Controllers\Admin\TransaksiController::class, 'daftarTransaksiBanten'])->name('daftar-transaksi-banten');
    Route::get('transaksi/data-transaksi-ulam/{id}', [App\Http\Controllers\Admin\TransaksiController::class, 'daftarTransaksiUlam'])->name('daftar-transaksi-ulam');
    Route::get('transaksi/data-transaksi-edit/{status}/{id}', [App\Http\Controllers\Admin\TransaksiController::class, 'daftarTransaksiEdit'])->name('daftar-transaksi-edit');
    Route::get('transaksi/ubah-data-transaksi/{status}/{id}/{id_transaksi}/{value}', [App\Http\Controllers\Admin\TransaksiController::class, 'ubahDataTransaksi'])->name('ubah-data-transaksi');
    Route::get('transaksi/hapus-data-transaksi/{status}/{id}', [App\Http\Controllers\Admin\TransaksiController::class, 'hapusDataTransaksi'])->name('hapus-data-transaksi');
    Route::get('transaksi/data-transaksi', [App\Http\Controllers\Admin\TransaksiController::class, 'index'])->name('index-transaksi');

    // DATA PEMESANAN
    Route::get('transaksi/tabel-pemesanan', [App\Http\Controllers\Admin\TransaksiController::class, 'tabelPemesanan'])->name('tabel-pemesanan');
    Route::post('transaksi/filter-pemesanan', [App\Http\Controllers\Admin\TransaksiController::class, 'filter'])->name('filter-pemesanan');
    Route::get('transaksi/show-detail-pemesanan/{id}', [App\Http\Controllers\Admin\TransaksiController::class, 'showDetailPemesanan'])->name('show-pemesanan');
    Route::get('transaksi/cek-data-status/{status}', [App\Http\Controllers\Admin\TransaksiController::class, 'cekDataStatus'])->name('cek-data-status');
    Route::get('transaksi/data-pemesanan', [App\Http\Controllers\Admin\TransaksiController::class, 'indexPemesanan'])->name('index-pemesanan');

    Route::get('transaksi/print/{status}', [App\Http\Controllers\Admin\TransaksiController::class, 'print'])->name('print-transaksi');
    Route::resource('transaksi', App\Http\Controllers\Admin\TransaksiController::class, ['names' => 'transaksi']);

    // LAPORAN
    // Route::get('laporan/tabel-laporan', [App\Http\Controllers\Admin\LaporanController::class, 'tabelLaporan'])->name('tabel-laporan');
    // Route::post('laporan/filter', [App\Http\Controllers\Admin\LaporanController::class, 'filter'])->name('filter-laporan');
    // // Route::get('laporan/print/{id}', [App\Http\Controllers\Admin\LaporanController::class, 'print'])->name('print');
    // Route::get('laporan/print/{status}', [App\Http\Controllers\Admin\LaporanController::class, 'print'])->name('print');
    // Route::resource('laporan', App\Http\Controllers\Admin\LaporanController::class, ['names' => 'laporan']);

    // UPACARA
    Route::get('upacara/status/{id}/{status}', [App\Http\Controllers\Admin\UpacaraController::class, 'status']);
    Route::get('upacara/data-jenis-upacara', [App\Http\Controllers\Admin\UpacaraController::class, 'dataJenisUpacara'])->name('data-jenis-upacara');
    Route::get('upacara/data-upacara', [App\Http\Controllers\Admin\UpacaraController::class, 'dataUpacara'])->name('data-upacara');
    Route::get('upacara/data-banten', [App\Http\Controllers\Admin\UpacaraController::class, 'dataBanten'])->name('data-banten');
    Route::get('upacara/data-ulam', [App\Http\Controllers\Admin\UpacaraController::class, 'dataUlam'])->name('data-ulam');
    Route::get('upacara/data-jenis-upacara-tidak-aktif', [App\Http\Controllers\Admin\UpacaraController::class, 'dataJenisUpacaraTidakAktif'])->name('data-jenis-upacara-tidak-aktif');
    Route::get('upacara/data-upacara-tidak-aktif', [App\Http\Controllers\Admin\UpacaraController::class, 'dataUpacaraTidakAktif'])->name('data-upacara-tidak-aktif');
    Route::get('upacara/data-banten-tidak-aktif', [App\Http\Controllers\Admin\UpacaraController::class, 'dataBantenTidakAktif'])->name('data-banten-tidak-aktif');
    Route::get('upacara/data-ulam-tidak-aktif', [App\Http\Controllers\Admin\UpacaraController::class, 'dataUlamTidakAktif'])->name('data-ulam-tidak-aktif');
    Route::resource('upacara', App\Http\Controllers\Admin\UpacaraController::class, ['names' => 'upacara']);

    // TESTIMONI
    Route::get('testimoni/tabel-testimoni', [App\Http\Controllers\Admin\TestimoniController::class, 'tabelTestimoni'])->name('tabel-testimoni');
    Route::get('testimoni/tabel-testimoni-tidak-aktif', [App\Http\Controllers\Admin\TestimoniController::class, 'tabelTestimoniTidakAktif'])->name('tabel-testimoni-tidak-aktif');
    Route::get('testimoni/status/{id}', [App\Http\Controllers\Admin\TestimoniController::class, 'status']);
    Route::get('testimoni/masyarakatcreate', [App\Http\Controllers\Admin\TestimoniController::class, 'masyarakatcreate']);
    Route::resource('testimoni', App\Http\Controllers\Admin\TestimoniController::class, ['names' => 'testimoni']);

    // GALERI
    Route::get('galeri/hapus-data-galeri/{id}', [App\Http\Controllers\Admin\GaleriController::class, 'destroy'])->name('galery-hapus-data');
    Route::resource('galeri', App\Http\Controllers\Admin\GaleriController::class, ['names' => 'galeri']);

    // FAQ
    Route::get('data-faq/tabel-faq', [App\Http\Controllers\Admin\FaqController::class, 'tabelFaq'])->name('tabel-faq');
    Route::get('data-faq/tabel-faq-tidak-aktif', [App\Http\Controllers\Admin\FaqController::class, 'tabelFaqTidakAktif'])->name('tabel-faq-tidak-aktif');
    Route::get('data-faq/status/{id}', [App\Http\Controllers\Admin\FaqController::class, 'status']);
    Route::get('data-faq/hapus-data-faq/{id}', [App\Http\Controllers\Admin\FaqController::class, 'destroy'])->name('hapus-data');
    Route::resource('data-faq', App\Http\Controllers\Admin\FaqController::class, ['names' => 'faq']);


    Route::resource('profile', App\Http\Controllers\Admin\ProfileController::class, ['names' => 'profile']);
});
