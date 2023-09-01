<?php

namespace App\Http\Controllers;

use App\Models\ModelFile;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class FileController extends Controller
{
    public function download(Request $request)
    {
        $auth = $request->id_user;
        // dd($auth);
        $file = ModelFile::where('id_user',$auth)->get();
        foreach ($file as $filename){
            $ijazah = $filename->ijazah;
            // dd($ijazah);

            $filePath = public_path('Upload.Ijazah/' . $ijazah);

            if (file_exists($filePath)) {
                return response()->download($filePath);
            } else {
                return redirect()->back()->with('error', 'File tidak di temukan.');
            }
        }
       
    }
    public function downloadakta(Request $request)
    {
        $auth = $request->id_user;
        // dd($auth);
        $file = ModelFile::where('id_user',$auth)->get();
        foreach ($file as $filename){
            $akta = $filename->akta;
            // dd($ijazah);

            $filePath = public_path('Upload.Akta/' . $akta);

            if (file_exists($filePath)) {
                return response()->download($filePath);
            } else {
                return redirect()->back()->with('error', 'File tidak di temukan.');
            }
        }
       
    }
    public function downloadkk(Request $request)
    {
        $auth = $request->id_user;
        // dd($auth);
        $file = ModelFile::where('id_user',$auth)->get();
        foreach ($file as $filename){
            $kk = $filename->kk;
            // dd($kk);

            $filePath = public_path('Upload.KK/' . $kk);

            if (file_exists($filePath)) {
                return response()->download($filePath);
            } else {
                return redirect()->back()->with('error', 'File tidak di temukan.');
            }
        }
       
    }
    public function uploadijazah(Request $request)
    {  
        $old    = $request->old;
        $id_user = $request->id_user;
        $time = Carbon::now()->format('d-m-y.H-i-s');
        if ($request->hasFile('file_ijazah')) {
            $ijazah = $request->file('file_ijazah');
            $extension = $ijazah->getClientOriginalExtension();
            $fileName =  $id_user.'.'.$request->ijazah.'_ijazah'.$time.'.'. $extension;

            $file = ModelFile::where('id_user', $id_user)
            ->update([ 'ijazah'=> $fileName ]);
            // dd($fileName);
            $path = public_path('Upload.Ijazah');
            $ijazah->move($path, $fileName);

            $filePath = public_path('Upload.Ijazah/' . $old);
    
            if (file_exists($filePath)) {
                unlink($filePath);
                // $file = ModelFile::where('id_user',$id_user)->update(['ijazah' => ' '] );
                Session::flash('success', 'File PDF berhasil diunggah: ' . $fileName);
                return redirect('berkas-siswa');
                    // return redirect()->back()->with('success', 'File berhasil dihapus.');
            }else {
                Session::flash('success', 'File PDF berhasil diunggah: ' . $fileName);
                return redirect('berkas-siswa');
            }
            
            
        } else {
            // Menyimpan notifikasi error ke dalam session
            Session::flash('error', 'Tidak ada file PDF yang diunggah.');
        }
        return redirect('berkas-siswa');

    }

    public function uploadakta(Request $request)
    {  
        $old    = $request->old;
        $id_user = $request->id_user;
        $time = Carbon::now()->format('d-m-y.H-i-s');
        if ($request->hasFile('file_akta')) {
            $akta = $request->file('file_akta');
            $extension = $akta->getClientOriginalExtension();
            $fileName =  $id_user.'.'.$request->akta.'_akta'.$time.'.'. $extension;

            $file = ModelFile::where('id_user', $id_user)
            ->update([ 'akta'=> $fileName ]);
            // dd($fileName);
            $path = public_path('Upload.Akta');
            $akta->move($path, $fileName);

            $filePath = public_path('Upload.Akta/' . $old);
    
            if (file_exists($filePath)) {
                unlink($filePath);
                // $file = ModelFile::where('id_user',$id_user)->update(['ijazah' => ' '] );
                Session::flash('success', 'File PDF berhasil diunggah: ' . $fileName);
                return redirect('berkas-siswa');
                    // return redirect()->back()->with('success', 'File berhasil dihapus.');
            }else {
                Session::flash('success', 'File PDF berhasil diunggah: ' . $fileName);
                return redirect('berkas-siswa');
            }
            
            
        } else {
            // Menyimpan notifikasi error ke dalam session
            Session::flash('error', 'Tidak ada file PDF yang diunggah.');
        }
        return redirect('berkas-siswa');

    }
    public function uploadkk(Request $request)
    {  
        $old    = $request->old;
        $id_user = $request->id_user;
        $time = Carbon::now()->format('d-m-y.H-i-s');
        if ($request->hasFile('file_kk')) {
            $kk = $request->file('file_kk');
            $extension = $kk->getClientOriginalExtension();
            $fileName =  $id_user.'.'.$request->kk.'_kk'.$time.'.'. $extension;

            $file = ModelFile::where('id_user', $id_user)
            ->update([ 'kk'=> $fileName ]);
            // dd($fileName);
            $path = public_path('Upload.KK');
            $kk->move($path, $fileName);

            $filePath = public_path('Upload.KK/' . $old);
    
            if (file_exists($filePath)) {
                unlink($filePath);
                // $file = ModelFile::where('id_user',$id_user)->update(['ijazah' => ' '] );
                Session::flash('success', 'File PDF berhasil diunggah: ' . $fileName);
                return redirect('berkas-siswa');
                    // return redirect()->back()->with('success', 'File berhasil dihapus.');
            }else {
                Session::flash('success', 'File PDF berhasil diunggah: ' . $fileName);
                return redirect('berkas-siswa');
            }
            
            
        } else {
            // Menyimpan notifikasi error ke dalam session
            Session::flash('error', 'Tidak ada file PDF yang diunggah.');
        }
        return redirect('berkas-siswa');

    }

    public function updatefoto(Request $request)
    {  
        $photo = $request->photo;
        $auth = Auth::user()->id_user;
        $model = User::where('id_user', $auth)->get();
        $extension = $photo->getClientOriginalExtension();
        $photoName = $request->name_file.'.'.$extension;
        dd($photoName);
        $request->validate([
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif|max:1024',
        ]);
        // Simpan foto di direktori penyimpanan
        $photoPath = $request->file('photo')->store('photos', 'public');
        return back()->with('success', 'Foto berhasil diunggah.');
    }

    
    public function deleteFileIjazah()
    {
        $auth = Auth::user()->id_user;
            // dd($auth);
        $file = ModelFile::where('id_user',$auth)->get();
        foreach ($file as $filename){
            $filePath = public_path('Upload.Ijazah/' . $filename->ijazah);

            if (file_exists($filePath)) {
                unlink($filePath);
                $file = ModelFile::where('id_user',$auth)->update(['ijazah' => 'Tidak Ada File'] );
                return redirect()->back()->with('success', 'File berhasil dihapus.');
            } else {
                return redirect()->back()->with('error', 'File tidak ditemukan.');
            }
        }
    }
    public function deleteFileAkta()
    {
        $auth = Auth::user()->id_user;
            // dd($auth);
        $file = ModelFile::where('id_user',$auth)->get();
        foreach ($file as $filename){
            $filePath = public_path('Upload.Ijazah/' . $filename->akta);

            if (file_exists($filePath)) {
                unlink($filePath);
                $file = ModelFile::where('id_user',$auth)->update(['akta' => 'Tidak Ada File'] );
                return redirect()->back()->with('success', 'File berhasil dihapus.');
            } else {
                return redirect()->back()->with('error', 'File tidak ditemukan.');
            }
        }
    }
    public function deleteFileIKK()
    {
        $auth = Auth::user()->id_user;
            // dd($auth);
        $file = ModelFile::where('id_user',$auth)->get();
        foreach ($file as $filename){
            $filePath = public_path('Upload.Ijazah/' . $filename->kk);

            if (file_exists($filePath)) {
                unlink($filePath);
                $file = ModelFile::where('id_user',$auth)->update(['kk' => 'Tidak Ada File'] );
                return redirect()->back()->with('success', 'File berhasil dihapus.');
            } else {
                return redirect()->back()->with('error', 'File tidak ditemukan.');
            }
        }
    }
}
