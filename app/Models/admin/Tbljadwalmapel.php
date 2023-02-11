<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tbljadwalmapel extends Model
{
    use HasFactory;
    protected $table = Str::upper("tbl_jadwal_mapel");
    protected $primaryKey = "id_jadwal";
    public $timestamps = false;
    protected $fillable = ['id_jadwal','id_guru','hari','jam_masuk','jam_keluar','id_mapel'];

}
