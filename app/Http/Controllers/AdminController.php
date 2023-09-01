<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;
use App\Models\pendaftaran;
use App\Models\User;
use App\Models\ModelsDataOrangtua;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class AdminController extends Controller
{
    public function index()
    {
        return view('back.dashboard')
        ->with('title', 'PKBM-Langgeng Ikhlas')
        ->with('icon', 'Assets/img/icon.png');
    }


    public function orangtua(){
    $id_user = Auth::user()->id_user;
    // // dd($id_user);
    $orangtua = ModelsDataOrangtua::where('id_user',$id_user)->get();
    // // dd($pendaftaran);
    foreach ($orangtua as $user) {
        return view('back.form-dataorangtua')
            ->with('users', $user)
            ->with('title', 'PKBM-Langgeng Ikhlas')
            ->with('icon', 'Assets/img/icon.png');
    }
}

    


    // public function siswa()
    // {

      
    //     $pendaftaran = pendaftaran::select('*')
    //     ->get();
    //     dd($pendaftaran);
    //     return view('back.form-datasiswa', [
    //         'data_siswa' => $pendaftaran,
    //         "title" => "PKBM-Langgeng Ikhlas",
    //         "icon" => "Assets/img/icon.png",
    //     ]);
    // }
    public function berkas()
    {
        return view('back.form-berkas')
        ->with('title', 'PKBM-Langgeng Ikhlas')
        ->with('icon', 'Assets/img/icon.png');
    }
   
    public function validasi()
    {
        // $data_siswa = User::where('role','siswa')
        //     ->join('tbl_file', 'users.id_user', '=', 'tbl_file.id_user')
        //     ->get();
        $data_siswa = User::select('*')
            ->join('tbl_file', 'users.id_user', '=', 'tbl_file.id_user')
            ->get();  
        // dd($siswa);
            return view('back.validasi')
            ->with('title', 'PKBM-Langgeng Ikhlas')
            ->with('siswa', $data_siswa)
            ->with('icon', 'Assets/img/icon.png');
        
    }
    public function daftar_guru()
    {
        return view('back.form_daftarguru')
        ->with('title', 'PKBM-Langgeng Ikhlas')
        ->with('icon', 'Assets/img/icon.png');
    }
    public function profil_sekolah()
    {
        return view('back.form_profile-sekolah')
        ->with('title', 'PKBM-Langgeng Ikhlas')
        ->with('icon', 'Assets/img/icon.png');
    }
}