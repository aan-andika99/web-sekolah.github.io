<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\FileController;
use App\Http\Controllers\PendaftaranController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PasswordController;


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


Route::controller(PendaftaranController::class)->group(function(){
    Route::get('berkas-siswa','berkasSiswa')->name('berkasSiswa')->middleware('auth');
    Route::post('/dashboard/action','actioncreatdata')->name('actioncreatdata');
    Route::get('/data_siswa', 'user_siswa')->name('user_siswa');
    Route::get('/data_ppdb','admin_siswa')->name('admin_siswa');
    Route::post('updatesiswa','actionubahdatasiswa')->name('actionubahdatasiswa')->middleware('auth');
    Route::post('updatependidikan','actionubahdatapendidikan')->name('actionubahdatapendidikan')->middleware('auth');
    Route::post('updatepenunjang','updatepenunjang')->name('updatepenunjang')->middleware('auth');
    Route::post('dataOrangtuaWali','dataOrangtuaWali')->name('dataOrangtuaWali')->middleware('auth');
    Route::post('dataOrangtuaAyah','dataOrangtuaAyah')->name('dataOrangtuaAyah')->middleware('auth');
    Route::post('dataOrangtuaIbu','dataOrangtuaIbu')->name('dataOrangtuaIbu')->middleware('auth');
});

Route::controller(FileController::class)->group(function(){
    Route::post('berkas-siswa/uploadijazah', 'uploadijazah')->name('uploadijazah')->middleware('auth');
    Route::post('berkas-siswa/uploadakta', 'uploadakta')->name('uploadakta')->middleware('auth');
    Route::post('berkas-siswa/uploadkk', 'uploadkk')->name('uploadkk')->middleware('auth');
    Route::get('berkas-siswa/akta/{filename}', 'downloadakta')->name('downloadakta')->middleware('auth');
    Route::get('berkas-siswa/kartukeluarga{filename}', 'downloadkk')->name('downloadkk')->middleware('auth');
    Route::get('berkas-siswa/ijazah{filename}', 'download')->name('download')->middleware('auth');
    // Route::get('berkas-siswa/download/{filename}', [PendaftaranController::class, 'download'])->name('download');
    Route::get('berkas-download', 'download')->name('download')->middleware('auth');
    Route::get('berkas-delete', 'deleteFile')->name('deleteFile')->middleware('auth');
    Route::get('berkas-delete', 'deleteFileIjazah')->name('deleteFileIjazah')->middleware('auth');
    // Route::post('profile/setting/uploadfoto', [FileController::class, 'updatefoto'])->name('updatefoto')->middleware('auth');
    
});

Route::controller(LoginController::class)->group(function(){
    Route::get('/login','login')->name('login');
    // Route::get('resetpassword', [LoginController::class, 'resetpassword'])->name('resetpassword');
    Route::post('actionlogin','actionlogin')->name('actionlogin');
    Route::get('actionlogout','actionlogout')->name('actionlogout')->middleware('auth');
    
});

Route::controller(PasswordController::class)->group(function(){
    Route::get('/forgot-password','forgot')->name('forgot');
    Route::get('/forgot-password','forgot')->name('forgot');
    Route::post('/forgot-password/reset','resetpassword')->name('resetpassword');
    Route::get('forgot-password/verify/{verify_key}','verify')->name('verify');
    Route::post('forgot-password/recovery/','recovery')->name('recovery');
});

Route::controller(UserController::class)->group(function(){
    Route::get('profile/setting', 'setting')->name('setting')->middleware('auth');
    Route::post('profile/setting/ubah-foto-profile', 'updatefoto')->name('updatefoto')->middleware('auth');
    Route::get('profile/ubah/{id_user}', 'ubahuser')->name('ubahuser')->middleware('auth');
    Route::post('updateuser', 'updateuser')->name('updateuser')->middleware('auth');
    Route::get('profile/security', 'security')->name('security')->middleware('auth');    
});

Route::controller(RegisterController::class)->group(function(){
    Route::get('/daftar', 'register')->name('register');
    Route::post('/register/action', 'actionregister')->name('actionregister');
    Route::post('/daftar_guru/action', 'actionregisterGuru')->name('actionregisterGuru');
    Route::get('register/verify/{verify_key}', 'verify')->name('verify');
    
});
Route::controller(AdminController::class)->group(function(){
    Route::get('dashboard', 'index')->name('home')->middleware('auth');
    Route::get('data_orangtua', 'orangtua')->name('orangtua')->middleware('auth');
    // Route::get('data_pendukung', [AdminController::class, 'berkas'])->name('berkas')->middleware('auth');
    Route::get('validasi', 'validasi')->name('validasi')->middleware('auth');
    Route::get('daftar_guru', 'daftar_guru')->name('daftar_guru')->middleware('auth');
    Route::get('profil-sekolah', 'profil_sekolah')->name('profil_sekolah')->middleware('auth');    
});

