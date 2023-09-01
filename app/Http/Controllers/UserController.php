<?php

namespace App\Http\Controllers;

use App\Mail\MailSend;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\File;

class UserController extends Controller
{
   public function setting()
{
    $auth = Auth::user()->id_user;
    $model = User::where('id_user',$auth)->get();
    foreach ($model as $users) {
        return view('back.form_profile')
        ->with('title', 'PKBM-Langgeng Ikhlas')
        ->with('user', $users)
        ->with('icon', '/Assets/img/icon.png');
    }
   
}

public function updatefoto(Request $request): RedirectResponse
{
    $fileFoto = $request->file_foto;
    if ($fileFoto) {
        if ($request->validate(['file_foto' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',])) {
            $id_user = Auth::user()->id_user;
            $old = $request->old;
            $nama = $request->name_file;
            $time = Carbon::now()->format('d-m-y.H-i-s');
            if ($request->hasFile('file_foto')) {
                $photo = $request->file('file_foto');
                $extension = $photo->getClientOriginalExtension();
                $fileName =  $nama.'.'.$time.'.'. $extension;
                // dd($fileName);
                $file = User::where('id_user', $id_user)
                ->update([ 'avatar'=> $fileName ]);
                // dd($fileName);
                $path = public_path('Upload.FotoProfil');
                $photo->move($path, $fileName);

                $filePath = public_path('Upload.FotoProfil/' . $old);

                if (file_exists($filePath)) {
                    unlink($filePath);
                    // $file = ModelFile::where('id_user',$id_user)->update(['ijazah' => ' '] );
                    Session::flash('success', 'Foto Berhasil Di Ubah');
                    return redirect('profile/setting');
                        // return redirect()->back()->with('success', 'File berhasil dihapus.');
                }
            }
        }else{
            Session::flash('error', 'Jenis Atau Ukuran Foto Belum Sesuai');
            return redirect('profile/setting');
        }
    }else{
        Session::flash('error', 'Tidak Ada Foto Yang Di Pilih.');
        return redirect('profile/setting');
    }
    
}
public function security()
{
   return view('back.form_security')
   ->with('title', 'PKBM-Langgeng Ikhlas')
   ->with('icon', '/Assets/img/icon.png');
}
public function updateuser(Request $request)
{
   $user = User::where('email', $request->email)
             ->update([
                'fname' => $request->fname,
                'mname' => $request->mname,
                'lname' => $request->lname,
                'email' => $request->email,
                'no_hp' => $request->no_hp,
                'status' => $request->status,
                'jenis_kelamin' => $request->jenis_kelamin,
             ]);
   
   return redirect()->route('setting');
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