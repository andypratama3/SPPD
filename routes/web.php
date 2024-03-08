<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Dashboard\RincianBiayaController;
use App\Http\Controllers\Dashboard\SuratController;
use App\Http\Controllers\Dashboard\PegawaiController;
use App\Http\Controllers\Dashboard\PimpinanController;
use App\Http\Controllers\Dashboard\DashboardController;

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
    Route::resource('pegawai', PegawaiController::class, ['names' => 'dashboard.pegawai']);
    Route::resource('pimpinan', PimpinanController::class, ['names' => 'dashboard.pimpinan']);
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

Route::get('cetak/lampiran2', function(){
    return view('cetak.lampiran2');
})->name('cetak.lampiran2');

Route::get('cetak/rincian-biaya', function(){
    return view('cetak.rincian-biaya');
})->name('cetak.rincian-biaya');

