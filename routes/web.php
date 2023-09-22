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
    //Auth Controller
Route::get('/logout', [AuthController::class, 'logout']);
    //presensi Controller
Route::get('/absen', [PresensiController::class, 'showCekin']);
Route::get('/home', [PresensiController::class, 'show'])->middleware('userAkses:user');
Route::get('/data', [PresensiController::class, 'data']);
Route::get('/profil', [PresensiController::class, 'profile']);

    //Admin Controller
Route::get('/profil-admin', [AdminController::class, 'profile']);
Route::get('/data-presensi', [AdminController::class, 'presensi']);
Route::get('/home-admin', [AdminController::class, 'showAdmin'])->middleware('userAkses:admin');

});
Route::post('/presensi/store', [PresensiController::class, 'create']);
Route::post('/showmap', [PresensiController::class, 'showmap']);

    // export excel
Route::get('/presensi/export', [AdminController::class, 'export_excel']);
Route::get('/pegawai', [AdminController::class, 'dataPegawai']);
Route::get('/hapus/{id}', [AdminController::class, 'delete']);
// Route::get('/home', [AdminController::class, 'home']);

Route::get('/search', [AdminController::class, 'search']);


Route::post('/user/update/{id}', [AuthController::class, 'update']);
Route::post('/admin/update/{id}', [AuthController::class, 'updatePegawai']);
