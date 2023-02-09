<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CalonModel extends Model
{
    use HasFactory;
    protected $table="tbl_calon_siswa";
    protected $primaryKey="id";
    public $timestamps = false;

    protected $fillable = ['id','nik','nama_lengkap','jenis_kelamin','tempat_lahir',"kode_daftar",
    'tgl_lahir','id_agama','warga_negara','alamat','tinggal_bersama','anak_ke','usia','tgl_daftar','id_tahun_ajaran',
    'nomor_hp','tinggi_badan','berat_badan','jarak_tempuh','jumlah_saudara','status',"foto_kk","foto_siswa"];
}
