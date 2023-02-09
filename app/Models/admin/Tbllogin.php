<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tbllogin extends Model
{
    use HasFactory;
    protected $table = "tbl_login";
    protected $primaryKey = "id";
    public $timestamps = false;

    protected $fillable = ['id','id_pengguna','username','sandi','hak_akses','nama_lengkap','status','tgl_buat'];
}
