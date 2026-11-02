<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PengalamanOrganisasi extends Model
{
    protected $table = 'pengalaman_organisasi';

    protected $fillable = [
        'tahun',
        'organisasi',
        'jabatan',
        'deskripsi',
    ];
}
