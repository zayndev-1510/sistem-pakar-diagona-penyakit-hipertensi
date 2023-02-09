<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ijazah_M extends Model
{
    use HasFactory;
    protected $table = "tbl_ijazah_arsip";
    protected $primaryKey = "id";
    public $timestamps = false;

    protected $fillable =["id_ijazah","id_siswa","berkas","tgl_arsip","pengupload"];
}
