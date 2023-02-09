<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tblguru extends Model
{
    use HasFactory;
    protected $table="TBL_GURU";
    protected $primaryKey="id";
    public $timestamps = false;
    protected $fillable =["id_guru","id_card","nip_guru","nama_guru","jenis_kelamin",
    "tempat_lahir","tgl_lahir","no_telp","alamat_rumah","email","foto","gelar_depan",
    "gelar_belakang","id_agama","tgl_buat","sk","ktp"];
}
