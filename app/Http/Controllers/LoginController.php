<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;

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
        $data = [
            'email' => $request->input('email'),
            'password' => $request->input('password'),
        ];

        if (Auth::Attempt($data)) {
            return redirect('dashboard');
        }else{
            return redirect('login');
        }
    }

    public function actionlogout()
    {
        Auth::logout();
        return redirect('/');
    }
}