<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        return view('back.dashboard', [
            "title" => "PKBM-Langgeng Ikhlas",
            "icon" => "Assets/img/icon.png"
        ]);
    }
    public function orangtua()
    {
        return view('back.form-dataorangtua', [
            "title" => "PKBM-Langgeng Ikhlas",
            "icon" => "Assets/img/icon.png"
        ]);
    }
    public function siswa()
    {
        return view('back.form-datasiswa', [
            "title" => "PKBM-Langgeng Ikhlas",
            "icon" => "Assets/img/icon.png",
        ]);
    }
    public function berkas()
    {
        return view('back.form-berkas', [
            "title" => "PKBM-Langgeng Ikhlas",
            "icon" => "Assets/img/icon.png"
        ]);
    }
    public function pendaftaran()
    {
        return view('back.form_pendaftaran', [
            "title" => "PKBM-Langgeng Ikhlas",
            "icon" => "Assets/img/icon.png"
        ]);
    }
    public function validasi()
    {
        return view('back.validasi', [
            "title" => "PKBM-Langgeng Ikhlas",
            "icon" => "Assets/img/icon.png"
        ]);
    }
}
