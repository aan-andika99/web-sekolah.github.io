<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Session;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use App\Mail\MailSend;

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
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => $request->role,
            'jenis_kelamin' => $request->jenis_kelamin,
            'verify_key' => $str
        ]);

        $details = [
            'name' => $request->name,
            'role' => $request->role,
            'website' => 'www.ayongoding.com',
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
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => $request->role,
            'jenis_kelamin' => $request->jenis_kelamin,
            'verify_key' => $str
        ]);

        $details = [
            'name' => $request->name,
            'role' => $request->role,
            'website' => 'www.ayongoding.com',
            'datetime' => date('Y-m-d H:i:s'),
            'url' => request()->getHttpHost().'/register/verify/'.$str
        ];

        Mail::to($request->email)->send(new MailSend($details));

        Session::flash('message', 'Link verifikasi telah dikrim ke Email. Silahkan Cek Email untuk Mengaktifkan Akun');
        return redirect('daftar_guru');
    }
    public function verify($verify_key)
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