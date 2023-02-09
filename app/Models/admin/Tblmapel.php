<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tblmapel extends Model
{
    use HasFactory;
    protected $table = "tbl_mata_pelajaran";
    protected $primaryKey = "id";
    public $timestamps = false;

    protected $fillable = ['id','ket','id_tahun_ajaran'];
}
