<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tblsekolah extends Model
{
    use HasFactory;
    protected $table = "tbl_sekolah";
    protected $primaryKey = "id";
    public $timestamps = false;

    protected $fillable =
        ['id', 'npsn', 'alamat', 'kode_pos', 'kecamatan', 'kota',
        'provinsi', 'status', 'tgl_buat',
    ];
}
