<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CvModel extends Model
{
    protected $table = 'Portofolio_1176';

    protected $fillable = [
        'tahun',
        'instansi',
        'jurusan',
        'deskripsi',
    ];
}
