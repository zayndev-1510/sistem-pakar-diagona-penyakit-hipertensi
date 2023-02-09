<?php

namespace App\Models\guru;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tblnilai_siswa extends Model
{
    use HasFactory;
    protected $table="tbl_nilai_siswa";
    protected $primaryKey="id";
    public $timestamps = false;
    protected $fillable =
    ['id','indikator','nilai','ulasan','id_guru','id_siswa','id_mapel'];
}
