<?php

use App\Http\Controllers\JenisController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\WarnaController;

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
    return view('welcome');
});

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('/');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('/home');

// Route::get('/data', [ProdukController::class, 'data']);
// Route::get('/add', [ProdukController::class, 'create'])->name('create');
// Route::post('/store', [ProdukController::class, 'store'])->name('store');
// Route::get('/detail/{id}', [ProdukController::class, 'show'])->name('detail');
// Route::get('/edit/{id}', [ProdukController::class, 'edit'])->name('edit');
// Route::put('/edit/{id}', [ProdukController::class, 'update'])->name('update');
// Route::delete('/detail/{id}', [ProdukController::class, 'destroy'])->name('destroy');

// Route::get('/data-jenis', [JenisController::class, 'index']);
// Route::get('/add-jenis', [JenisController::class, 'createJenis'])->name('createJenis');
// Route::post('/store-jenis', [JenisController::class, 'storeJenis'])->name('storeJenis');
// Route::get('/detail-jenis/{id}', [JenisController::class, 'showJenis'])->name('detailjenis');
// Route::get('/edit-jenis/{id}', [JenisController::class, 'editJenis'])->name('editJenis');
// Route::put('/edit-jenis/{id}', [JenisController::class, 'updateJenis'])->name('updateJenis');
// Route::delete('/detail-jenis/{id}', [JenisController::class, 'destroyJenis'])->name('destroyJenis');

// Route::get('/data-warna', [WarnaController::class, 'index']);
// Route::get('/add-warna', [WarnaController::class, 'createWarna'])->name('createWarna');
// Route::post('/store-warna', [WarnaController::class, 'storeWarna'])->name('storeWarna');
// Route::get('/detail-warna/{id}', [WarnaController::class, 'showWarna'])->name('detailWarna');
// Route::get('/edit-warna/{id}', [WarnaController::class, 'editWarna'])->name('editWarna');
// Route::put('/edit-warna/{id}', [WarnaController::class, 'updateWarna'])->name('updateWarna');
// Route::delete('/detail-warna/{id}', [WarnaController::class, 'destroyWarna'])->name('destroyWarna');

//Start Produk
Route::resource('produk',ProdukController::class);
Route::get('produk-detail/create-warna/{id}', [\App\Http\Controllers\ProdukDetailController::class, 'create'])->name('produk-detail.create-warna');
Route::resource('produk-detail',\App\Http\Controllers\ProdukDetailController::class);

//Start Master
Route::resource('jenis',JenisController::class);
Route::resource('warna',WarnaController::class);
