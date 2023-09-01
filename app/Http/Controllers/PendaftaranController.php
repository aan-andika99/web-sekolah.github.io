<?php

namespace App\Http\Controllers;
date_default_timezone_set('Asia/Jakarta');

use App\Models\ModelFile;
use App\Models\ModelsDataOrangtua;
use App\Models\pendaftaran;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Session;


class PendaftaranController extends Controller
{

    public function actioncreatdata(Request $request)
    {
        
        $pendaftaran = pendaftaran::create([
            'id_user'=> $request->id_user,
        ]);
        $wali = ModelsDataOrangtua::create([
            'id_user'=> $request->id_user,
        ]);
        $file = ModelFile::create([
            'id_user'=> $request->id_user,
            'ijazah'=> 'Tidak Ada File',
            'akta'=> 'Tidak Ada File',
            'kk'=> 'Tidak Ada File',
        ]);
        $data_siswa = User::where('id_user',$request->id_user)
            ->update([
            'status'=> 'process',
        ]);
        Session::flash('message', 'Data Berhasil Disimpan');
        return redirect('data_siswa');
    }       
    public function user_siswa() :View
    {  
        $id_user = Auth::user()->id_user;
        // // dd($id_user);
        $pendaftaran = pendaftaran::where('id_user',$id_user)->get();
        
        // // dd($pendaftaran);
        foreach ($pendaftaran as $user) {
            return view('back.form-datasiswa')
                ->with('users', $user)
                ->with('title', 'PKBM-Langgeng Ikhlas')
                ->with('icon', 'Assets/img/icon.png');
        }
    }
    public function admin_siswa() :View
    { 
        // // dd($id_user);
        $siswa = User::where('role','siswa')->get();
        
        // // dd($pendaftaran);
        foreach ($siswa as $user) {
            return view('back.form-datasiswa')
                ->with('users', $user)
                ->with('title', 'PKBM-Langgeng Ikhlas')
                ->with('icon', 'Assets/img/icon.png');
        }
    }
    public function berkasSiswa() :View
    {  
        $id_user = Auth::user()->id_user;
        // // dd($id_user);
        $file = ModelFile::where('id_user',$id_user)->get();
        // // dd($pendaftaran);
        foreach ($file as $user) {
            return view('back.form-berkas')
                ->with('files', $user)
                ->with('title', 'PKBM-Langgeng Ikhlas')
                ->with('icon', 'Assets/img/icon.png');
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

            Session::flash('success', 'File PDF berhasil diunggah: ' . $fileName);
            return redirect('berkas-siswa');
            
        } else {
            // Menyimpan notifikasi error ke dalam session
            Session::flash('error', 'Tidak ada file PDF yang diunggah.');
        }
        return redirect('berkas-siswa');

    }
    public function delete($filename)
    {
        $id_user = Auth::user()->id_user;
        $filename = ModelFile::where('id_user',$id_user)->get('ijazah');
        dd($filename);
        if (Storage::delete('pdf_uploads/' . $filename)) {
            return "File berhasil dihapus: " . $filename;
        } else {
            return "Gagal menghapus file.";
        }
    }

    public function uploadakta(Request $request)
    {
        $id_user = $request->id_user;

        if ($request->hasFile('file_akta')) {
            $akta = $request->file('file_akta');
            $extension = $akta->getClientOriginalExtension();
            $fileName =  $id_user.'.'.$request->akta .'_akta' .'.'. $extension;
            $file = ModelFile::where('id_user', $id_user)
            ->update([ 'akta'=> $fileName ]);
            // dd($fileName);
            
            // $path = Storage::putFileAs('public',$ijazah, $fileName);
            $akta->move(public_path('Upload.Akta'), $fileName);
         

            Session::flash('success', 'File PDF berhasil diunggah: ' . $fileName);
            return redirect('berkas-siswa');
            
        } else {
            // Menyimpan notifikasi error ke dalam session
            Session::flash('error', 'Tidak ada file PDF yang diunggah.');
        }
        return redirect('berkas-siswa');

    }

    public function uploadkk(Request $request)
    {
        $id_user = $request->id_user;

        if ($request->hasFile('file_kk')) {
            $kk = $request->file('file_kk');
            $extension = $kk->getClientOriginalExtension();
            $fileName =  $id_user.'.'.$request->kk .'_KK' .'.'. $extension;
            $file = ModelFile::where('id_user', $id_user)
            ->update([ 'kk'=> $fileName ]);
            // dd($fileName);
            
            // $path = Storage::putFileAs('public',$ijazah, $fileName);
            $kk->move(public_path('Upload.KK'), $fileName);
         

            Session::flash('success', 'File PDF berhasil diunggah: ' . $fileName);
            return redirect('berkas-siswa');
            
        } else {
            // Menyimpan notifikasi error ke dalam session
            Session::flash('error', 'Tidak ada file PDF yang diunggah.');
        }
        return redirect('berkas-siswa');

    }

    


    public function actionubahdatasiswa(Request $request)
    {
        
        $pendaftaran = pendaftaran::where('id_user', $request->id_user)
        ->update([
            'tmpt_lahir'=> $request->tmpt_lahir,
            'tgl_lahir'=> $request->tgl_lahir,
            'agama'=> $request->agama,
            'nik'=> $request->nik,
            'telp'=> $request->telp,
            'alamat_rmh'=> $request->alamat_rmh,
            'dusun'=> $request->dusun,
            'kel'=> $request->kel,
            'kec'=> $request->kec,
            'kab'=> $request->kab,
            'provinsi'=> $request->provinsi,
            'id_user' => $request -> id_user,
        ]);
        Session::flash('message_datadiri', 'Data Diri Berhasil Disimpan');
        return redirect('data_siswa#data_diri');
    }

    public function actionubahdatapendidikan(Request $request)
    {
        
        $pendaftaran = pendaftaran::where('id_user', $request->id_user)
        ->update([ 
            'sekolah_asal'=> $request->sekolah_asal,
            'npsn_terdahulu'=> $request->npsn_terdahulu,
            'nisn'=> $request->nisn,
            'nis'=> $request->nis,
            'no_skhun'=> $request->no_skhun,
            'no_un'=> $request->no_un,
            'no_ijazah'=> $request->no_ijazah,
        ]);
        // dd($pendaftaran);

        Session::flash('message_pendidikan', 'Data Pendidikan Berhasil Disimpan');
        return redirect('data_siswa#pendidikan');
    }
    public function updatepenunjang(Request $request)
    {
        
        $pendaftaran = pendaftaran::where('id_user', $request->id_user)
        ->update([ 
            'disabilitas'=> $request->disabilitas,
            'alat_transport'=> $request->alat_transport,
            'no_kks'=> $request->no_kks,
            'kps'=> $request->kps,
            'kip'=> $request->kip,
            'usulan_pip'=> $request->usulan_pip,
            'j_tinggal'=> $request->j_tinggal,
            'nama_kip'=> $request->nama_kip,
            'ket_kip'=> $request->ket_kip,
            'noreg_akta'=> $request->noreg_akta,
            'lintang'=> $request->lintang,
            'bujur'=> $request->bujur,
        ]);
        Session::flash('message_penunjang', 'Data Penunjang Berhasil Disimpan');
        return redirect('data_siswa#penunjang');
    }
    public function dataOrangtuaWali(Request $request)
    {
        
        $dataOrangtua = ModelsDataOrangtua::where('id_user', $request->id_user)
        ->update([ 
            'nama_wali'=> $request-> nama_wali,
            'pendidikan_wali'=> $request-> pendidikan_wali,
            'pekerjaan_wali'=> $request-> pekerjaan_wali,
            'penghasilan_wali'=> $request-> penghasilan_wali,
        ]);
        Session::flash('message_wali', 'Data Berhasil Disimpan');
        return redirect('data_orangtua#wali');
    }
    public function dataOrangtuaAyah(Request $request)
    {
        
        $dataOrangtua = ModelsDataOrangtua::where('id_user', $request->id_user)
        ->update([ 
            'nama_ayah'=> $request->nama_ayah ,
            'disabilitas_ayah'=> $request->disabilitas_ayah ,
            'pekerjaan_ayah'=> $request-> pekerjaan_ayah,
            'pendidikan_ayah'=> $request-> pendidikan_ayah,
            'penghasilan_ayah'=> $request-> penghasilan_ayah,
           
        ]);
        Session::flash('message_ayah', 'Data Berhasil Disimpan');
        return redirect('data_orangtua#ayah');
    }
    public function dataOrangtuaIbu(Request $request)
    {
        
        $dataOrangtua = ModelsDataOrangtua::where('id_user', $request->id_user)
        ->update([ 
          
            'nama_ibu'=> $request-> nama_ibu,
            'disabilitas_ibu'=> $request-> disabilitas_ibu,
            'pekerjaan_ibu'=> $request-> pekerjaan_ibu,
            'pendidikan_ibu'=> $request-> pendidikan_ibu,
            'penghasilan_ibu'=> $request-> penghasilan_ibu,
          
        ]);
        Session::flash('message_ibu', 'Data Berhasil Disimpan');
        return redirect('data_orangtua#ibu');
    }
}
