<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Contracts\Session\Session as SessionSession;
use Illuminate\Http\Request;
use App\Mail\ResetPassword;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;


class LoginController extends Controller
{
    public function login()
    {
        if (Auth::check()) {
            return redirect('dashboard');
        }else{
            return view('back.login', [
                        "title" => "PKBM-Langgeng Ikhlas",
                        "icon" => "Assets/img/icon.png"
                ]);
            }
        }
    
            
    public function actionlogin(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            // Authentication passed...
            return redirect()->intended('dashboard'); // Redirect to dashboard or any other authenticated page
        } else {
            return redirect()->route('login')->with('error', 'Invalid credentials');
        }
    }
    

    public function actionlogout()
    {
        Auth::logout();
        return redirect('/');
    }
}