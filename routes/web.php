<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Dashboard\SbmController;
use App\Http\Controllers\Dashboard\SuratController;
use App\Http\Controllers\Dashboard\PegawaiController;
use App\Http\Controllers\Dashboard\PimpinanController;
use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\Dashboard\NomorSuratController;
use App\Http\Controllers\Dashboard\RincianBiayaController;

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


Route::group(['prefix' => 'dashboard', 'middleware' => ['auth','cekrole: 1']], function (){
    Route::get('/',DashboardController::class)->name('dashboard');
    Route::group(['prefix' => 'datamaster'], function (){
        Route::resource('pegawai', PegawaiController::class, ['names' => 'dashboard.datamaster.pegawai']);
        Route::resource('pimpinan', PimpinanController::class, ['names' => 'dashboard.datamaster.pimpinan']);
        Route::get('nomor-surat',[NomorSuratController::class, 'index'])->name('dashboard.datamaster.nomor_surat.index');
        Route::get('nomor-surat/edit/{id}',[NomorSuratController::class, 'edit'])->name('dashboard.datamaster.nomor_surat.edit');
        Route::post('nomor-surat/update/{id}',[NomorSuratController::class, 'update'])->name('dashboard.datamaster.nomor_surat.update');


    });
    Route::resource('surat', SuratController::class, ['names' => 'dashboard.surat']);
    Route::get('surats/cetak-pdf/{slug}',[SuratController::class, 'cetak_pdf'])->name('dashboard.surat.cetakPdf');
    Route::resource('rincian-biaya', RincianBiayaController::class, ['names' => 'dashboard.rincian.biaya']);
    Route::get('rincian-biayas/records',[RincianBiayaController::class, 'datatable'])->name('dashboard.rincianBiaya.getRecords');
    Route::get('surats/records',[SuratController::class, 'datatable'])->name('dashboard.surat.getRecords');
    Route::post('rincian/find/pegawai',[RincianBiayaController::class, 'find_pegawai'])->name('dashboard.rincian.get.pegawai');
    Route::post('rincian-biaya-array/delete',[RincianBiayaController::class, 'destroyRincianArray'])->name('dashboard.rincianBiaya.arrayDelete');
    Route::post('rincian-surat-array/delete',[SuratController::class, 'destroySuratArray'])->name('dashboard.surat.arrayDelete');
});



require __DIR__.'/auth.php';
