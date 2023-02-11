<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tblsiswa extends Model
{
    use HasFactory;
    protected $table = "TBL_SISWA";
    protected $primaryKey = "id_siswa";
    public $timestamps = false;

    protected $fillable =
        [
            "id_siswa",
            "nis",
            "nik",
            "nama_lengkap",
            "tempat_lahir",
            "tgl_lahir",
            "jenis_kelamin",
            "id_agama",
            "anak_ke",
            "status_dalam_keluarga",
            "id_kelas",
            "tahun_masuk",
            "tahun_keluar",
            "asal_sekolah_menengah",
            "asal_sekolah_dasar",
            "id_orang_tua",
            "id_calon_siswa",
            "id_tahun_ajaran",
            "tgl_penerimaan",
            "foto",
            "kk"
        ];
}
