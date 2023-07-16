<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\AdminController;
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


// Front
Route::get('/', function () {
    $beranda = [
        [
            "keterangan" => "Kegiatan Belajar Mengajar",
            "img" => "gambar1.jpg",
            "active" => "active",
        ],
        [
            "keterangan" => "Kegiatan Ujian",
            "img" => "gambar2.jpg",
            "active" => "",

        ],
    ];
    $agenda_post = [
        [
            "active" => "active",
            "title" => "Penerimaan Siswa Didik Baru",
            "author" => "Aan Andika",
            "bagian" => "#tab-pane-1",
            
        ],
        [
            "active" => "",
            "title" => "Hasil Seleksi",
            "author" => "Aan Andika",
            "bagian" => "#tab-pane-2",
        ],
        [
            "active" => "",
            "title" => "Hasil Belajar",
            "author" => "Aan Andika",
            "bagian" => "#tab-pane-3",
        ],
    ];
    return view('front/home', [
        "title" => "PKBM-Langgeng Ikhlas",
        "icon" => "Assets/img/icon.png",
        "logo" => "Assets/img/logo-navbar.png",
        "posts" => $agenda_post,
        "hero" => $beranda,
    ]);
});
// Route::get('/PPDB', function () {
    
//     return view('front/ppdb',[
//         "title" => "PPDB-Langgeng Ikhlas",
//         "icon" => "Assets/img/icon.png",
//     ]);
// });
// Back

// Route::get('/login', function () {
//     return view('back/login', [
//         "title" => "PKBM-Langgeng Ikhlas",
//         "icon" => "Assets/img/icon.png"
//     ]);
// });
// login
Route::get('/login', [LoginController::class, 'login'])->name('login');
Route::post('actionlogin', [LoginController::class, 'actionlogin'])->name('actionlogin');
Route::get('dashboard', [AdminController::class, 'index'])->name('home')->middleware('auth');
Route::get('actionlogout', [LoginController::class, 'actionlogout'])->name('actionlogout')->middleware('auth');

// Register
Route::get('/daftar', [RegisterController::class, 'register'])->name('register');
Route::post('/register/action', [RegisterController::class, 'actionregister'])->name('actionregister');
Route::post('/daftar_guru/action', [RegisterController::class, 'actionregisterGuru'])->name('actionregisterGuru');
// Mail
Route::get('register/verify/{verify_key}', [RegisterController::class, 'verify'])->name('verify');

// Admin
Route::get('data_siswa', [AdminController::class, 'siswa'])->name('siswa')->middleware('auth');
Route::get('profile', [AdminController::class, 'profile'])->name('profile')->middleware('auth');
Route::get('data_orangtua', [AdminController::class, 'orangtua'])->name('orangtua')->middleware('auth');
Route::get('data_pendukung', [AdminController::class, 'berkas'])->name('berkas')->middleware('auth');
Route::get('validasi', [AdminController::class, 'validasi'])->name('validasi')->middleware('auth');
Route::get('pendaftaran', [AdminController::class, 'pendaftaran'])->name('pendaftaran')->middleware('auth');
Route::get('daftar_guru', [AdminController::class, 'daftar_guru'])->name('daftar_guru')->middleware('auth');


// Route::get('/Forgot', function () {
//     return view('back/forgot',[
//         "title" => "PKBM-Langgeng Ikhlas",
//         "icon" => "Assets/img/icon.png"
//     ]);
// });
// Route::get('/Create-Account ', function () {
//     return view('back/register',[
//         "title" => "PKBM-Langgeng Ikhlas",
//         "icon" => "Assets/img/icon.png"
//     ]);
// });


// Rute untuk tampilan login
// Route::get('/login', 'AuthController@showloginForm')->name('login');
// Rute untuk mengirimkan data login
// Route::post('/login', 'AuthController@login')->name('login.submit');
// Rute untuk logout
// Route::post('/logout', 'AuthController@logout')->name('logout');


// Route::get('/dashboard', function () {
//     return view('back/dashboard',[
//         "title" => "-Langgeng Ikhlas",
//         "icon" => "Assets/img/icon.png"
//     ]);
// });
// Route::post('/dashboard', function () {
//     return view('back/dashboard',[
//         "title" => "-Langgeng Ikhlas",
//         "icon" => "Assets/img/icon.png"
//     ]);
// });
