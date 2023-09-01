<?php

namespace App\Http\Controllers;

use App\Mail\ResetPassword;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

class PasswordController extends Controller
{
    
    public function forgot(Request $request)
    {
        return view('back.forgot', [
            "title" => "PKBM-Langgeng Ikhlas",
            "icon" => "Assets/img/icon.png"
        ]);
    }
    public function recovery(Request $request) {
        $email = $request->email;
        $pwd1 = $request->password;
        $pwd2 = $request->password2;
        // dd($pwd1,$pwd2);
        $emailCheck = User::select('*')
        ->where('email', $email)
        ->exists();
        // dd($emailCheck);
        if ($emailCheck) {
            if ($pwd1 == $pwd2) {
                $update = User::where('email',$email)
                ->update(['password'=>Hash::make($pwd1),]);
                Session::flash('message', 'Password Berhasil Di Ubah');
                return redirect('login');
            }else {
                return redirect()->back()->with('message', 'Password Tidak Sesuai, Mohon Periksa Kembali');
            }
           
        }else {
            Session::flash('message', 'Password Tidak Sesuai, Mohon Periksa Kembali');
            return redirect()->back();
        }


    }
    public function recoveryPassword() {
        
    }
    public function resetpassword(Request $request)
    {   
        $email = $request->email;
        // dd($email);
        $emailCheck = User::select('verify_key')
        ->where('email', $email)
        ->exists();

        if ($emailCheck) {
        $user = User::where('email', $email)->get();
        foreach ($user as $users) {
            $verify_key = $users->verify_key;
        }
        // dd($verify_key);
        $details = [
            'email' => $request->email,
            'datetime' => date('Y-m-d H:i:s'),
            'url' => request()->getHttpHost().'/forgot-password/verify/'.$verify_key
        ];
        Mail::to($request->email)->send(new ResetPassword($details));

            Session::flash('message', 'Link reset password telah dikrim ke Email Anda. Silahkan Cek Email Anda untuk Mengaktifkan Akun');
            return redirect('forgot-password');
        }else
        {
            Session::flash('message', 'Email Tidak Terdaftar');
            return redirect('forgot-password'); 
        }
        
    }
    public function verify($verify_key,Request $request)
    {
        $str = Str::random(8);
            $keyCheck = User::select('verify_key')
                        ->where('verify_key', $verify_key)
                        ->exists();
            
            if ($keyCheck) {
                $user = User::where('verify_key', $verify_key)->get();
                foreach ($user as $key){
                    return view('back.confirm-password', [
                        "title" => "PKBM-Langgeng Ikhlas",
                        "icon" => "Assets/img/icon.png",
                        'user' => $key,
                    ]);
                }
                

                // $user = User::where('verify_key', $verify_key)
                // ->update([
                //     'password' =>  Hash::make($str),
                // ]);

                
                return "Pasword Berhasil Di Ubah. Pasword Sementara Anda : $str";
            }else{
                return "Key tidak valid!";
            }
    }
}