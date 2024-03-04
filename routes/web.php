<?php

use Illuminate\Support\Facades\Route;
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
    Route::get('surats/records',[SuratController::class, 'datatable'])->name('dashboard.surat.getRecords');
});
