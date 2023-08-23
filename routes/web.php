<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\PresensiContoller;
use Illuminate\Support\Facades\Route;
use PHPUnit\TextUI\Configuration\Group;

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

Route::middleware(['guest'])->group(function (){
    Route::get('/login', [AuthController::class, 'show'])->name('login');
});
Route::get('/logout', [AuthController::class, 'logout']);
Route::post('/proseslogin', [AuthController::class, 'proseslogin']);
    // pegawai

// route::post('/createPegawai', [PresensiContoller::class, 'createPegawai']);

Route::middleware(['auth'])->group(function (){
    Route::get('/cekin', [PresensiContoller::class, 'showCekin']);
    Route::get('/cekout', [PresensiContoller::class, 'showCekout']);
    Route::get('/home', [PresensiContoller::class, 'show']);
});
Route::post('/presensi/store', [PresensiContoller::class, 'store']);


