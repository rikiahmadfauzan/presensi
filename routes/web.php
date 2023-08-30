<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\PresensiController;
use App\Http\Controllers\AdminController;
use Illuminate\Routing\Controllers\Middleware;
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
Route::get('/register', [AuthController::class, 'showReg']);

});
Route::post('/proseslogin', [AuthController::class, 'proseslogin']);
Route::post('/create/register', [AuthController::class, 'create']);
    // Admin
// Route::get('/layouts', [AdminController::class, 'layouts']);


// route::post('/createPegawai', [PresensiController::class, 'createPegawai']);

Route::middleware(['auth'])->group(function (){
Route::get('/absen', [PresensiController::class, 'showCekin']);
Route::get('/home', [PresensiController::class, 'show'])->middleware('userAkses:user');
Route::get('/data', [PresensiController::class, 'data']);
Route::get('/profil', [PresensiController::class, 'profile']);
Route::get('/data-presensi', [AdminController::class, 'presensi']);
Route::get('/logout', [AuthController::class, 'logout']);
Route::get('/admin', [AdminController::class, 'showAdmin'])->middleware('userAkses:admin');

});
    // export excel
Route::post('/presensi/store', [PresensiController::class, 'create']);
Route::get('/presensi/export', [PresensiController::class, 'export_excel']);

Route::post('/admin/create', [AdminController::class, 'create']);

