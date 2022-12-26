<?php

use App\Models\admin;
use App\Models\dosen;
use App\Models\matkul;
use App\Models\jurusan;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KhsController;
use App\Http\Controllers\KrsController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\DosenController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RuangController;
use App\Http\Controllers\MatkulController;
use App\Http\Controllers\JurusanController;
use App\Http\Controllers\JadwaldosenController;
use App\Http\Controllers\JadwalmahasiswaController;

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
    return view('siakad.login');
});
Route::get('/welcome', function () {
    $admin = admin::count();
    $dosen = dosen::count();
    $jurusan = jurusan::count();
    $matkul = matkul::count();


    return view('welcome', compact('admin', 'dosen','jurusan','matkul'));
});

// mahasiswa
Route::get('/admin', [AdminController::class, 'index'])->name('admin');
Route::get('/tambahdataadmin', [AdminController::class, 'tambahdataadmin'])->name('tambahdataadmin');

Route::post('/insertdataadmin', [AdminController::class, 'insertdataadmin'])->name('insertdataadmin');

Route::get('/tampildataadmin/{id}', [AdminController::class, 'tampildataadmin'])->name('tampildataadmin');
Route::post('/updatedataadmin/{id}', [AdminController::class, 'updatedataadmin'])->name('updatedataadmin');

Route::get('/deleteadmin/{id}', [AdminController::class, 'deleteadmin'])->name('deleteadmin');

// dosen
Route::group(['middleware' => ['auth', 'hakakses:admin']], function () {
    Route::get('/dosen', [DosenController::class, 'dosen'])->name('dosen');
});

Route::get('/tambahdatadosen', [DosenController::class, 'tambahdatadosen'])->name('tambahdatadosen');

Route::post('/insertdatadosen', [DosenController::class, 'insertdatadosen'])->name('insertdatadosen');

Route::get('/tampildatadosen/{id}', [DosenController::class, 'tampildatadosen'])->name('tampildatadosen');
Route::post('/updatedatadosen/{id}', [DosenController::class, 'updatedatadosen'])->name('updatedatadosen');

Route::get('/deletedosen/{id}', [DosenController::class, 'deletedosen'])->name('deletedosen');

//matkul
Route::get('/matkul', [MatkulController::class, 'matkul'])->name('matkul');
Route::get('/tambahdatamatkul', [MatkulController::class, 'tambahdatamatkul'])->name('tambahdatamatkul');

Route::post('/insertdatamatkul', [MatkulController::class, 'insertdatamatkul'])->name('insertdatamatkul');

Route::get('/tampildatamatkul/{id}', [MatkulController::class, 'tampildatamatkul'])->name('tampildatamatkul');
Route::post('/updatedatamatkul/{id}', [MatkulController::class, 'updatedatamatkul'])->name('updatedatamatkul');

Route::get('/deletematkol/{id}', [MatkulController::class, 'deletematkol'])->name('deletematkol');

//jurusan
Route::get('/jurusan', [JurusanController::class, 'jurusan'])->name('jurusan');

Route::get('/tambahdatajurusan', [JurusanController::class, 'tambahdatajurusan'])->name('tambahdatajurusan');
Route::post('/insertdatajurusan', [JurusanController::class, 'insertdatajurusan'])->name('insertdatajurusan');

Route::get('/tampildatajurusan/{id}', [JurusanController::class, 'tampildatajurusan'])->name('tampildatajurusan');
Route::post('/updatedatajurusan/{id}', [JurusanController::class, 'updatedatajurusan'])->name(('updatedatajurusan'));

Route::get('/deletejurusan/{id}', [JurusanController::class, 'deletejurusan'])->name('deletejurusan');
//Krs
Route::get('/krs', [KrsController::class, 'krs'])->name('krs');
Route::get('/tambahdatakrs', [KrsController::class, 'tambahdatakrs'])->name('tambahdatakrs');

Route::post('/insertdatakrs', [KrsController::class, 'insertdatakrs'])->name('insertdatakrs');

Route::get('/tampildatakrs/{id}', [KrsController::class, 'tampildatakrs'])->name('tampildatakrs');
Route::post('/updatedatakrs/{id}', [KrsController::class, 'updatedatakrs'])->name('updatedatakrs');

Route::get('/deletekrs/{id}', [KrsController::class, 'deletekrs'])->name('deletekrs');

//khs

Route::get('/khs', [KhsController::class, 'khs'])->name('khs');
Route::get('/tambahdatakhs', [KhsController::class, 'tambahdatakhs'])->name('tambahdatakhs');

Route::post('/insertdatakhs', [KhsController::class, 'insertdatakhs'])->name('insertdatakhs');

Route::get('/tampildatakhs/{id}', [KhsController::class, 'tampildatakhs'])->name('tampildatakhs');
Route::post('/updatedatakhs/{id}', [KhsController::class, 'updatedatakhs'])->name('updatedatakhs');

Route::get('/deletekhs/{id}', [KhsController::class, 'deletekhs'])->name('deletekhs');

//ruang
Route::get('/ruang', [RuangController::class, 'ruang'])->name('ruang');
Route::get('/tambahdataruang', [RuangController::class, 'tambahdataruang'])->name('tambahdataruang');

Route::get('/tampildataruang/{id}', [RuangController::class, 'tampildataruang'])->name('tampildataruang');
Route::post('/updatedataruang/{id}', [RuangController::class, 'updatedataruang'])->name('updatedataruang');

Route::post('/insertdataruang', [RuangController::class, 'insertdataruang'])->name('insertdataruang');

Route::get('/deleteruang/{id}', [RuangController::class, 'deleteruang'])->name('deleteruang');

//jadwaldosen
Route::get('/jadwaldosen', [JadwaldosenController::class, 'jadwaldosen'])->name('jadwaldosen');
Route::get('/tambahdatajadwaldosen', [JadwaldosenController::class, 'tambahdatajadwaldosen'])->name('tambahdatajadwaldosen');

Route::post('/insertdatajadwaldosen', [JadwaldosenController::class, 'insertdatajadwaldosen'])->name('insertdatajadwaldosen');

Route::get('/tampildatajadwaldosen/{id}', [JadwaldosenController::class, 'tampildatajadwaldosen'])->name('tampildatajadwaldosen');
Route::post('/updatedatajadwaldosen/{id}', [JadwaldosenController::class, 'updatedatajadwaldosen'])->name('updatedatajadwaldosen');

Route::get('/deletejadwaldosen/{id}', [JadwaldosenController::class, 'deletejadwaldosen'])->name('deletejadwaldosen');

//jadwalmahasiswa
Route::get('/jadwalmahasiswa', [JadwalmahasiswaController::class, 'jadwalmahasiswa'])->name('jadwalmahasiswa');
Route::get('/tambahdatajadwalmahasiswa', [JadwalmahasiswaController::class, 'tambahdatajadwalmahasiswa'])->name('tambahdatajadwalmahasiswa');

Route::post('/insertdatajadwalmahasiswa', [JadwaldosenController::class, 'insertdatajadwalmahasiswa'])->name('insertdatajadwalmahasiswa');

Route::get('/editjadwalmhs/{id}', [JadwalmahasiswaController::class, 'editjadwalmhs'])->name('editjadwalmhs');
Route::post('/updatedatajadwalmahasiswa/{id}', [JadwalmahasiswaController::class, 'updatedatajadwalmahasiswa'])->name('updatedatajadwalmahasiswa');

Route::get('/deletejadwalmahasiswa/{id}', [JadwalmahasiswaController::class, 'deletejadwalmahasiswa'])->name('deletejadwalmahasiswa');

//login
Route::get('/login', [LoginController::class, 'login'])->name('login');
Route::get('/loginproses', [LoginController::class, 'loginproses'])->name('loginproses');
Route::get('/register', [LoginController::class, 'register'])->name('register');
Route::post('/registeruser', [LoginController::class, 'registeruser'])->name('registeruser');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
