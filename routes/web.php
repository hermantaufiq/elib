<?php

use Illuminate\Support\Facades\Auth;
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

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();


Route::middleware('auth')->prefix('/buku')->group(function(){
    Route::redirect('/', '/dashboard'); // alihkan ke home jika dipanggil domain.com/buku
    Route::resource('/kategori',App\Http\Controllers\KategoriController::class);
    Route::resource('/pengarang',App\Http\Controllers\PengarangController::class);
    Route::resource('/rak', App\Http\Controllers\RakController::class);
    Route::resource('/penerbit', App\Http\Controllers\PenerbitController::class);
    Route::resource('/daftar',  App\Http\Controllers\BukuController::class);
});

Route::middleware('auth')->get('/pengguna', [App\Http\Controllers\PenggunaController::class, 'index']);
Route::middleware('auth')->get('/pinjam', [App\Http\Controllers\PinjamController::class, 'index']);
Route::middleware('auth')->get('/dashboard', [App\Http\Controllers\DashboardController::class, 'index'])->name('home');;
Route::middleware('auth')->get('/denda', [App\Http\Controllers\DendaController::class, 'index']);
Route::middleware('auth')->get('/laporan',[App\Http\Controllers\LaporanController::class, 'index']);
Route::middleware('auth')->get('/pengaturan',[App\Http\Controllers\PengaturanController::class, 'index']);
Route::middleware('auth')->get('/dikembalikan',[App\Http\Controllers\DikembalikanController::class, 'index']);
 