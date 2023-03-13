<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SPPController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\PetugasController;
use App\Http\Controllers\PembayaranController;
use App\Http\Controllers\SiswaLoginController;

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

Route::get('/', [LoginController::class, 'index'])->name('loginform');
Route::post('/login', [LoginController::class, 'login'])->name('login');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

Route::group(['middleware' => ['PreventBack']], function(){
    Route::get('/dashboard', [HomeController::class, 'index'])->name('dashboard');
    Route::group(['middleware' => ['auth', 'cekLevel:admin']], function(){

        Route::get('entri/{id}', [PembayaranController::class, 'input']);
        Route::post('/pay', [PembayaranController::class, 'pay']);
        Route::resource('kelas', KelasController::class);
        Route::resource('petugas', PetugasController::class);
        Route::resource('siswa', SiswaController::class);
        Route::resource('spp', SPPController::class);
        Route::resource('pembayaran', PembayaranController::class);
    });
    Route::group(['middleware' => ['auth', 'cekLevel:petugas']], function(){

        Route::resource('nama_kelas', KelasController::class);
        Route::resource('nama_siswa', SiswaController::class);
        Route::resource('bayar', PembayaranController::class);
    });
    Route::group(['middleware' => ['auth', 'cekLevel:siswa']], function(){
        Route::get('/history', [SiswaLoginController::class, 'index'])->name('history');
    });
});

