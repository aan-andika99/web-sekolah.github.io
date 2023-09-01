<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ModelsDataOrangtua extends Model
{

    use HasFactory;

    protected $table = 'tbl_wali';
    protected $primaryKey = 'id_wali';
    protected $fillable = [
        'nama_ayah',
        'pekerjaan_ayah',
        'disabilitas_ayah',
        'pendidikan_ayah',
        'penghasilan_ayah',

        'nama_ibu',
        'pekerjaan_ibu',
        'disabilitas_ibu',
        'pendidikan_ibu',
        'penghasilan_ibu',
        

        'nama_wali',
        'disabilitas_wali',
        'pekerjaan_wali',
        'penghasilan_wali',
        'pendidikan_wali',
        
        'id_user',
    ];

}
