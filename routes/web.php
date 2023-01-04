<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DosenController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\KaprodiController;
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

Route::get('/', [HomeController::class, 'index']);
Route::get('/home/about/{id}', [HomeController::class, 'about']);

Route::get('/dosen', [DosenController::class, 'index'])->name('dosen');
Route::get('/dosen/detail/{id_dosen}', [DosenController::class, 'detail']);
Route::get('/dosen/add', [DosenController::class, 'add']);
Route::post('/dosen/insert', [DosenController::class, 'insert']);
Route::get('/dosen/edit/{id_dosen}', [DosenController::class, 'edit']);
Route::post('/dosen/update/{id_dosen}', [DosenController::class, 'update']);
Route::get('/dosen/delete/{id_dosen}', [DosenController::class, 'delete']);

Route::get('/mahasiswa', [MahasiswaController::class, 'index']);
Route::get('/mahasiswa/detail/{id_mahasiswa}', [MahasiswaController::class, 'detail']);
Route::get('/mahasiswa/add', [MahasiswaController::class, 'add']);
Route::post('/mahasiswa/insert', [MahasiswaController::class, 'insert']);
Route::get('/mahasiswa/edit/{id_mahasiswa}', [MahasiswaController::class, 'edit']);
Route::post('/mahasiswa/update/{id_mahasiswa}', [MahasiswaController::class, 'update']);
Route::get('/mahasiswa/delete/{id_mahasiswa}', [MahasiswaController::class, 'delete']);

Route::get('/kaprodi', [KaprodiController::class, 'index']);
Route::get('/kaprodi/detail/{id_kaprodi}', [KaprodiController::class, 'detail']);
Route::get('/kaprodi/add', [KaprodiController::class, 'add']);
Route::post('/kaprodi/insert', [KaprodiController::class, 'insert']);
Route::get('/kaprodi/edit/{id_kaprodi}', [KaprodiController::class, 'edit']);
Route::post('/kaprodi/update/{id_kaprodi}', [KaprodiController::class, 'update']);
Route::get('/kaprodi/delete/{id_kaprodi}', [KaprodiController::class, 'delete']);


