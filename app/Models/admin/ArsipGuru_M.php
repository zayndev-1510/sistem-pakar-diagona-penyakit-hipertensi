<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ArsipGuru_M extends Model
{
    use HasFactory;
    protected $table = "tbl_arsip_sekolah";
    protected $primaryKey = "id";
    public $timestamps = false;
    protected $fillable =["id","nama_arsip","jenis_arsip","berkas","tgl","waktu","kategori_arsip"];
}
