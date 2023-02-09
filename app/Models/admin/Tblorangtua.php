<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tblorangtua extends Model
{
    use HasFactory;
    protected $table="TBL_ORANG_TUA";
    protected $primaryKey="id_orang_tua";
    public $timestamps = false;

    protected $fillable =
        [
            "id_orang_tua",
            "nama_ayah",
            "nama_ibu",
            "pekerjaan_ayah",
            "pekerjaan_ibu",
            "alamat",
            "nama_wali",
            "pekerjaan_wali",
            "alamat_wali",
            "nomor_telepon"
        ];
}
