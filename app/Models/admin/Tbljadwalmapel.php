<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tbljadwalmapel extends Model
{
    use HasFactory;
    protected $table = "tbl_jadwal_mapel";
    protected $primaryKey = "id";
    public $timestamps = false;
    protected $fillable = ['id','id_pengajar','hari','jam_masuk','jam_keluar','id_mapel'];

}
