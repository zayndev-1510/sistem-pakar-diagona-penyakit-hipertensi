<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tblmapel extends Model
{
    use HasFactory;
    protected $table = "TBL_MAPEL";
    protected $primaryKey = "id_mapel";
    public $timestamps = false;

    protected $fillable = ['id_mapel','nama_mapel',"id_tahun_ajaran"];
}
