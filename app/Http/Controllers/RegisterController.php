<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use App\Mail\MailSend;
use Illuminate\Support\Facades\Session;

class RegisterController extends Controller

{
    public function register()
    {
        return view('back.register', [
            "title" => "PKBM-Langgeng Ikhlas",
            "icon" => "Assets/img/icon.png"
        ]);
    }
    
    public function actionregister(Request $request)
    {
        $str = Str::random(100);
        
        $user = User::create([
            'fname' => $request->fname,
            'mname' => $request->mname,
            'lname' => $request->lname,
            'email' => $request->email,
            'no_hp' => $request->no_hp,
            'password' => Hash::make($request->password),
            'role' => $request->role,
            'status' => $request->status,
            'jenis_kelamin' => $request->jenis_kelamin,
            'verify_key' => $str
        ]);
       
        $details = [
            'fname' => $request->fname,
            'mname' => $request->mname,
            'lname' => $request->lname,
            'email' => $request->email,
            'no_hp' => $request->no_hp,
            'jenis_kelamin' => $request->jenis_kelamin,
            'datetime' => date('Y-m-d H:i:s'),
            'url' => request()->getHttpHost().'/register/verify/'.$str
        ];

        Mail::to($request->email)->send(new MailSend($details));

        Session::flash('message', 'Link verifikasi telah dikrim ke Email Anda. Silahkan Cek Email Anda untuk Mengaktifkan Akun');
        return redirect('daftar');
    }
    public function actionregisterGuru(Request $request)
    {
        $str = Str::random(100);
        
        $user = User::create([
            'id_user' => $request->id_user,
            'fname' => $request->fname,
            'mname' => $request->mname,
            'lname' => $request->lname,
            'email' => $request->email,
            'no_hp' => $request->no_hp,
            'password' => Hash::make($request->password),
            'status' => $request->status,
            'role' => $request->role,
            'jenis_kelamin' => $request->jenis_kelamin,
            'verify_key' => $str
        ]);
     

        $details = [
            'fname' => $request->fname,
            'mname' => $request->mname,
            'lname' => $request->lname,
            'email' => $request->email,
            'no_hp' => $request->no_hp,
            'jenis_kelamin' => $request->jenis_kelamin,
            'datetime' => date('Y-m-d H:i:s'),
            'url' => request()->getHttpHost().'/register/verify/'.$str
        ];

        Mail::to($request->email)->send(new MailSend($details));

        Session::flash('message', 'Link verifikasi telah dikrim ke Email. Silahkan Cek Email untuk Mengaktifkan Akun');
        return redirect('daftar_guru');
    }
    public function verify($verify_key,Request $request)
    {
            $keyCheck = User::select('verify_key')
                        ->where('verify_key', $verify_key)
                        ->exists();
            
            if ($keyCheck) {
                $user = User::where('verify_key', $verify_key)
                ->update([
                    'active' => 1
                ]);

                
                return "Verifikasi Berhasil. Akun Anda sudah aktif.";
            }else{
                return "Key tidak valid!";
            }
    }
}