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


Route::group(['prefix' => 'dashboard'], function (){
    Route::get('/',DashboardController::class)->name('dashboard');
    Route::group(['prefix' => 'datamaster'], function (){
        Route::resource('pegawai', PegawaiController::class, ['names' => 'dashboard.datamaster.pegawai']);
        Route::resource('pimpinan', PimpinanController::class, ['names' => 'dashboard.datamaster.pimpinan']);
        Route::resource('sbm', SbmController::class, ['names' => 'dashboard.datamaster.sbm']);
        Route::get('sbms/records',[SbmController::class, 'datatable'])->name('dashboard.sbms.records');
        Route::get('nomor-surat',[NomorSuratController::class, 'index'])->name('dashboard.datamaster.nomor_surat.index');
        Route::get('nomor-surat/edit/{id}',[NomorSuratController::class, 'edit'])->name('dashboard.datamaster.nomor_surat.edit');
        Route::post('nomor-surat/update/{id}',[NomorSuratController::class, 'update'])->name('dashboard.datamaster.nomor_surat.update');


    });
    Route::resource('surat', SuratController::class, ['names' => 'dashboard.surat']);
    Route::get('surats/cetak-pdf/{slug}',[SuratController::class, 'cetak_pdf'])->name('dashboard.surat.cetakPdf');

    Route::resource('rincian-biaya', RincianBiayaController::class, ['names' => 'dashboard.rincian.biaya']);
    Route::get('rincian-biayas/records',[RincianBiayaController::class, 'datatable'])->name('dashboard.rincianBiaya.getRecords');
    Route::get('surats/records',[SuratController::class, 'datatable'])->name('dashboard.surat.getRecords');
    Route::post('rincian-biaya-array/delete',[RincianBiayaController::class, 'destroyRincianArray'])->name('dashboard.rincianBiaya.arrayDelete');
    Route::post('rincian-surat-array/delete',[SuratController::class, 'destroySuratArray'])->name('dashboard.surat.arrayDelete');
});

Route::get('cetak/lampiran1', function(){
    return view('cetak.lampiran1');
})->name('cetak.lampiran1');

Route::get('cetak/lampiran1-nb', function(){
    return view('cetak.lampiran1-nb');
})->name('cetak.lampiran1-nb');

Route::get('cetak/lampiran2', function(){
    return view('cetak.lampiran2');
})->name('cetak.lampiran2');

Route::get('cetak/rincian-biaya', function(){
    return view('cetak.rincian-biaya');
})->name('cetak.rincian-biaya');

Route::get('login/', function(){
    return view('login.index');
})->name('login');

