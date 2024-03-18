<?php

use App\Http\Controllers\ExportController;
use Illuminate\Support\Facades\Route;


use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SLogDosenController;
use App\Http\Controllers\LogDosenController;
use App\Http\Controllers\PerbaikanController;

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

Route::prefix('/')->group(function () {
    Route::get('/', function () {
        return view('landing');
    });
    Route::resource('/kuliah', \App\Http\Controllers\LogPerkuliahanController::class);
    Route::get('/kuliah/export/excel', [\App\Http\Controllers\LogPerkuliahanController::class, 'export_excel']);
    Route::resource('/Lkegiatan', \App\Http\Controllers\LogKegiatanController::class);
    Route::post('/Lkegiatan/storePIC', [\App\Http\Controllers\LogKegiatanController::class, 'storePIC'])->name('Lkegiatan.storePIC');
});


Route::prefix('superadmin')->middleware('checkRole:superadmin')->group(function () {
    Route::get('/dashboard', [\App\Http\Controllers\SLogDosenController::class, 'dashboard'])->name('superadmin.dashboard');
    Route::get('/kuliah/export/excel', [\App\Http\Controllers\SLogDosenController::class, 'export_excel'])->name('kuliah.export.excel');
    Route::get('/kuliah/export/excelDosenMingguan', [\App\Http\Controllers\SLogDosenController::class, 'excelDosenMingguan'])->name('kuliah.export.excelDosenMingguan');
    // Route::get('/kuliah/export/excelKuliahMingguan', [\App\Http\Controllers\SLogDosenController::class, 'excelKuliahMingguan'])->name('kuliah.export.excelKuliahMingguan');
    // Route::get('/kuliah/export/excelKuliahBulanan', [\App\Http\Controllers\SLogDosenController::class, 'excelKuliahBulanan'])->name('kuliah.export.excelKuliahBulanan');
    Route::get('/kuliah/export/excelKuliahMingguan', [ExportController::class, 'exportExcel'])->name('kuliah.export.excelKuliahMingguan');
    Route::get('/kuliah/export/excelKuliahBulanan', [ExportController::class, 'exportExcelKuliahBulan'])->name('kuliah.export.excelKuliahBulanan');
    Route::get('/kuliah/export/excelDosenMingguan', [ExportController::class, 'exportExcelDosenMinggu'])->name('kuliah.export.excelDosenMingguan');
    Route::get('/kuliah/export/excelDosenBulanan', [ExportController::class, 'exportExcelDosenBulan'])->name('kuliah.export.excel');
    Route::get('/kuliah/export/excelKegiatanMingguan', [ExportController::class, 'exportExcelKegiatanMinggu'])->name('kuliah.export.excelKegiatanMingguan');
    Route::get('/kuliah/export/excelKegiatanBulanan', [ExportController::class, 'exportExcelKegiatanBulan'])->name('kuliah.export.excelKegiatanBulanan');
    Route::get('/kuliah/export/excelKegiatanPICMingguan', [ExportController::class, 'exportExcelKegiatanPICMinggu'])->name('kuliah.export.excelKegiatanPICMingguan');
    Route::get('/kuliah/export/excelKegiatanPICBulanan', [ExportController::class, 'exportExcelKegiatanPICBulan'])->name('kuliah.export.excelKegiatanPICBulanan');
    Route::resource('/kegiatan', \App\Http\Controllers\LogKegiatanController::class);
    Route::resource('/matkul', \App\Http\Controllers\MatkulController::class);
    Route::get('/historyMatkul', [\App\Http\Controllers\MatkulController::class, 'historyMatkul'])->name('historyMatkul');
    Route::resource('/labpc', \App\Http\Controllers\LabController::class);
    Route::resource('/pc', \App\Http\Controllers\PcController::class);
    Route::resource('/kuliahDosen', \App\Http\Controllers\SLogDosenController::class);
    Route::delete('/kuliahDosenMhs/{id}', [SLogDosenController::class, 'destroyMhs'])->name('kuliahDosenMhs.destroyMhs');
    Route::get('/kuliah', [\App\Http\Controllers\SLogDosenController::class, 'kuliah'])->name('kuliahDosen.kuliah');
    Route::resource('/user', UserController::class);
    Route::resource('/perbaikan', \App\Http\Controllers\PerbaikanController::class);
    Route::get('/historyPerbaikan', [\App\Http\Controllers\PerbaikanController::class, 'historyPerbaikan'])->name('historyPerbaikan');
});


Route::middleware('checkRole:dosen,ail')->group(function () {
    Route::resource('/admin', \App\Http\Controllers\LogDosenController::class);
});

Route::get('/get-kelas-list/{labId}', [\App\Http\Controllers\LogDosenController::class, 'getMatkulList']);
Route::get('/get-matkul-list/{labId}/{kelasId}', [\App\Http\Controllers\LogDosenController::class, 'getMatkulList']);
Route::get('/get-matkul-info/{idLab}/{idMatkul}', [\App\Http\Controllers\LogDosenController::class, 'getMatkulInfo']);
Route::get('/get-kelas-data', [\App\Http\Controllers\LogPerkuliahanController::class, 'getKelasData']);
Route::get('/get-matkul-list1/{labId}', [\App\Http\Controllers\LogDosenController::class, 'getMatkulList1']);

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
