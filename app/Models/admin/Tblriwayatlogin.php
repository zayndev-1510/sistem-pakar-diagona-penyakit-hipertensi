<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tblriwayatlogin extends Model
{
    use HasFactory;
    protected $table = "tbl_riwayat_login";
    protected $primaryKey = "id";
    public $timestamps = false;

    protected $fillable = ['id','username','tgl','ket',"hak_akses"];
}
