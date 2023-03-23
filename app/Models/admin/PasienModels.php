<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PasienModels extends Model
{
    use HasFactory;

    protected $table = "tbl_pasien";
    protected $primaryKey = "id_pasien";
    public $timestamps = false;

    protected $fillable =["id_pasien","nama_pasien","tempat_lahir","alamat_rumah",
    "tgl_lahir","jenis_kelamin","agama","gejala","penyakit","nomor_handphone","tgl_konsultasi","jam_konsultasi"];
    
}
