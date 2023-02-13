<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tbljadwalmapel extends Model
{
    use HasFactory;
    protected $table =("TBL_JADWAL_MAPEL");
    protected $primaryKey = "id_jadwal";
    public $timestamps = false;
    protected $fillable = ['id_jadwal','id_guru','hari','jam_masuk','jam_keluar','id_mapel','id_kelas'];

}
