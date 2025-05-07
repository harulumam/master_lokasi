<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\List_Lokasi\ListLokasiController;
use App\Http\Controllers\Petugas_Gudang\PetugasGudangController;
use App\Http\Controllers\History_Lokasi\HistoryLokasiController;
use App\Http\Controllers\Login\LoginController;

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

// @include_once('admin_web.php');

Route::middleware(['auth', 'addUserDataToView'])->group(function () {
    Route::get('/', function () {
        return redirect()->route('dashboard');
    })->name('/');

    Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');

    // master lokasi - office
    Route::get('/office', [DashboardController::class, 'showOffice'])->name('office');
    Route::get('/office/{id}', [DashboardController::class, 'viewoffice'])->name('viewOffice');
    Route::get('/office/detail/{id}', [DashboardController::class, 'showDetailOffice'])->name('detailOffice');
    Route::get('/office/ruangan/{id}', [DashboardController::class, 'showRuanganOffice'])->name('ruanganOffice');
    Route::get('/office/history/{id}', [DashboardController::class, 'showHistoryOffice'])->name('historyOffice');

    // edit office
    Route::get('/office/{id}/edit', [DashboardController::class, 'editoffice'])->name('editoffice');
    Route::get('/office/detail/{id}/edit', [DashboardController::class, 'editDetailOffice'])->name('editDetailOffice');
    Route::get('/office/ruangan/{id}/edit', [DashboardController::class, 'editRuanganOffice'])->name('editRuanganOffice');

    // master lokasi - fa
    Route::get('/fa', [DashboardController::class, 'showFiberAcademy'])->name('fa');
    Route::get('/fa/{id}', [DashboardController::class, 'viewFa'])->name('viewFa');
    Route::get('/fa/detail/{id}', [DashboardController::class, 'showDetailFa'])->name('detailFa');
    Route::get('/fa/ruangan/{id}', [DashboardController::class, 'showRuanganFa'])->name('ruanganFa');
    Route::get('/fa/history/{id}', [DashboardController::class, 'showHistoryFa'])->name('historyFa');

    // edit fa
    Route::get('/fa/{id}/edit', [DashboardController::class, 'editFa'])->name('editFa');
    Route::get('/fa/detail/{id}/edit', [DashboardController::class, 'editDetailFa'])->name('editDetailFa');
    Route::get('/fa/ruangan/{id}/edit', [DashboardController::class, 'editRuanganFa'])->name('editRuanganFa');

    // master lokasi - gudang
    Route::get('/gudang', [DashboardController::class, 'showGudang'])->name('gudang');
    Route::get('/gudang/{id}', [DashboardController::class, 'viewGudang'])->name('viewGudang');
    Route::get('/gudang/detail/{id}', [DashboardController::class, 'showDetailGudang'])->name('detailGudang');
    Route::get('/gudang/ruangan/{id}', [DashboardController::class, 'showRuanganGudang'])->name('ruanganGudang');
    Route::get('/gudang/gudangRMT/{id}', [DashboardController::class, 'showGudangRMT'])->name('gudangRMT');
    Route::get('/gudang/history/{id}', [DashboardController::class, 'showHistoryGudang'])->name('historyGudang');

    Route::get('/gudang/{id}/edit', [DashboardController::class, 'editGudang'])->name('editGudang');
    Route::get('/gudang/detail/{id}/edit', [DashboardController::class, 'editDetailGudang'])->name('editDetailGudang');
    Route::get('/gudang/ruangan/{id}/edit', [DashboardController::class, 'editRuanganGudang'])->name('editRuanganGudang');
    Route::get('/gudang/gudangRMT/{id}/edit', [DashboardController::class, 'editGudangRMT'])->name('editGudangRMT');

    // List lokasi
    Route::get('/list-lokasi', [ListLokasiController::class, 'listLokasi'])->name('listLokasi');

    // create
    Route::get('/create/lokasi', [ListLokasiController::class, 'createLokasi'])->name('listLokasi.create');
    Route::post('/detail/form_lokasi', [ListLokasiController::class, 'formLokasi'])->name('formLokasi');
    Route::post('/detail/form_fa', [ListLokasiController::class, 'formFa'])->name('formFa');
    Route::post('/detail/fa_ruangan', [ListLokasiController::class, 'formFaRuangan'])->name('formFaRuangan');
    Route::post('/detail/form_office', [ListLokasiController::class, 'formOffice'])->name('formOffice');
    Route::post('/detail/office_ruangan', [ListLokasiController::class, 'formOfficeRuangan'])->name('formOfficeRuangan');
    Route::post('/detail/form_gudang', [ListLokasiController::class, 'formGudang'])->name('formGudang');
    Route::post('/detail/gudang_ruangan', [ListLokasiController::class, 'formGudangRuangan'])->name('formGudangRuangan');
    Route::post('/detail/gudang_RMT', [ListLokasiController::class, 'formGudangRMT'])->name('formGudangRMT');

    Route::get('/petugas-gudang', [PetugasGudangController::class, 'petugasGudang'])->name('petugasGudang');
    Route::get('/history-lokasi', [HistoryLokasiController::class, 'historyLokasi'])->name('historyLokasi');

    // get data by id
    Route::get('/witel/{id}', [ListLokasiController::class, 'getWitelByRegional'])->name('getWitel');
    Route::get('/get-tipe-alker/{id}', [ListLokasiController::class, 'getTipeAlker'])->name('getTipeAlker');
    Route::get('/get-jenis-alker/{id}', [ListLokasiController::class, 'getJenisAlker'])->name('getJenisAlker');
    Route::get('/get-kode-gudang', [ListLokasiController::class, 'getKodeGudang'])->name('getKodeGudang');
    Route::get('/get-pic-reg', [ListLokasiController::class, 'getPicReg'])->name('getPicReg');
    Route::post('/create', [ListLokasiController::class, 'create'])->name('create');
});

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// Route::view('sample-page', 'admin.pages.sample-page')->name('sample-page');
// Route::view('default-layout', 'multiple.default-layout')->name('default-layout');
// Route::view('compact-layout', 'multiple.compact-layout')->name('compact-layout');
// Route::view('modern-layout', 'multiple.modern-layout')->name('modern-layout');
