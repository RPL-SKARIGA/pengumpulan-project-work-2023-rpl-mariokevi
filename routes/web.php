<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\PasienController;
use App\Http\Controllers\UserController;
use App\Models\Dokter;
use Illuminate\Support\Facades\Route;

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
    $jumlah_dr = Dokter::count();
    return view('/admin/indexadmin', compact('jumlah_dr'));
})->middleware('auth');


Route::get('/datadokter', [PasienController::class, 'index'])->name('dokter')->middleware('auth');
Route::get('/tambahdata', [PasienController::class, 'tambahdata'])->name('tambahdata')->middleware('auth');
Route::post('/insertdata', [PasienController::class, 'insertdata'])->name('insertdata');
Route::get('/tampilkandata/{id}', [PasienController::class, 'tampilkandata'])->name('tampilkandata');
Route::post('/updatedata/{id}', [PasienController::class, 'updatedata'])->name('updatedata');
Route::get('/delete/{id}', [PasienController::class, 'delete'])->name('delete');
Route::get('/filterByPoli', [PasienController::class, 'filterByPoli'])->name('filterByPoli');


//poli
Route::get('/datapoli', [PasienController::class, 'datapoli'])->name('datapoli')->middleware('auth');
Route::get('/tambahpoli', [PasienController::class, 'tambahpoli'])->name('tambahpoli')->middleware('auth');
Route::post('/insert_poli', [PasienController::class, 'insert_poli'])->name('insert_poli');
Route::get('/tampilpoli/{id_poli}', [PasienController::class, 'tampilpoli'])->name('tampilpoli');
Route::post('/updatepoli/{id_poli}', [PasienController::class, 'updatepoli'])->name('updatepoli');
Route::get('/delete_poli/{id_poli}', [PasienController::class, 'delete_poli'])->name('delete_poli');

//jadwal dokter
Route::get('/datajadwal', [PasienController::class, 'jadwal'])->name('jadwal')->middleware('auth');
Route::get('/jadwal_dr', [PasienController::class, 'jadwal_dr'])->name('jadwal_dr')->middleware('auth');
Route::get('/jadwal', [PasienController::class, 'dr'])->name('dr');
Route::post('/tambahjadwal', [PasienController::class, 'tambahjadwal'])->name('tambahjawal');
Route::get('/tampildata/{id}', [PasienController::class, 'tampildata'])->name('tampildata');
Route::post('/updatejadwal/{id}', [PasienController::class, 'updatejadwal'])->name('updatejadwal');
Route::get('/deletejadwal/{id_jadwal}', [PasienController::class, 'deleteJadwal'])->name('deleteJadwal');
Route::get('/datapasien', [PasienController::class, 'pasien'])->name('pasien')->middleware('auth');
Route::get('/tampilpasien/{id_pasien}', [PasienController::class, 'tampilpasien'])->name('tampilpasien');
Route::post('/updatepasien/{id_pasien}', [PasienController::class, 'updatepasien'])->name('updatepasien');
Route::get('/get_doctor_schedule/{id}', [PasienController::class, 'getDoctorSchedule']);


//user
Route::get('/formpasien',[PasienController::class, 'formpasien'])->name('formpasien');
Route::post('/insert_form',[PasienController::class, 'insert_form'])->name('insert_form');
Route::get('/delete_pasien/{id_pasien}', [PasienController::class, 'delete_pasien'])->name('delete_pasien');
Route::get('/caripasien',[PasienController::class, 'caripasien'])->name('caripasien');
// routes/web.php
Route::get('/formpasien/dokter/{poli}', [PasienController::class, 'bypoli'])->name('bypoli');
Route::post('/proses_daftar', [PasienController::class, 'prosesDaftar']);

//login
Route::get('/login', [LoginController::class, 'login'])->name('login');
Route::post('/loginproses', [LoginController::class, 'loginproses'])->name('loginproses');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');


Route::get('/register', [LoginController::class, 'register'])->name('register');
Route::post('/registeruser', [LoginController::class, 'registeruser'])->name('registeruser');



//user route
Route::get('/home', [UserController::class, 'home'])->name('home');




Route::get('/homeadmin', function () {

    return view('user/homeadmin', ["title" => "home"]);
});

Route::get('pasien', function () {
    return view('user/pasien', ["title" => "pasien"]);
});

Route::get('dokter', function () {
    return view('user/dokter', ["title" => "dokter"]);
});

Route::get('formbpjs', function () {
    return view('user/formbpjs', ["title" => "Form bpjs"]);
});

Route::get('formasuransi', function () {
    return view('user/formasuransi', ["title" => "Form Asuransi"]);
});
