<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pendaftaran extends Model
{
    use HasFactory;

    protected $table = 'tbl_pendaftaran';
    protected $primaryKey = 'id_pendaftaran';
    protected $fillable = [
        'tmpt_lahir',//data diri
        'tgl_lahir',//data diri
        'agama',//data diri
        'nik',//data diri
        'telp',//data diri
        'email',//data diri
        'alamat_rmh',//data diri
        'dusun',//data diri
        'kel',//data diri
        'kec',//data diri
        'kab',//data diri
        'provinsi',//data diri
        
        'sekolah_asal',//pendidikan
        'npsn_terdahulu',//pendidikan
        'nis',//pendidikan
        'nisn',//pendidikan
        'no_skhun',//pendidikan
        'no_un',//pendidikan
        'no_ijazah',//pendidikan
        
        'noreg_akta',//penunjang
        'nama_kip',//penunjang
        'ket_kip',//penunjang
        'no_kks',//penunjang
        'kps',//penunjang
        'usulan_pip',//penunjang
        'kip',//penunjang
        'alat_transport',//penunjang
        'disabilitas',//penunjang
        'j_tinggal',//penunjang
        'lintang',//penunjang
        'bujur',//penunjang
        'registration_code',
        'id_user',//penunjang
    ];

}
