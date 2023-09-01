<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ModelFile extends Model
{
    use HasFactory;

    protected $quarded = [];
    protected $table = 'tbl_file';
    protected $primaryKey = 'id_file';
    protected $fillable = [
        'ijazah',
        'akta',
        'kk',
        
        'id_user',
    ];

}
