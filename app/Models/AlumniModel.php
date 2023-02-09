<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AlumniModel extends Model
{
    use HasFactory;
    protected $table="tbl_alumni";
    protected $primaryKey="id";
    public $timestamps = false;
    protected $fillable = ["id_alumni","id_siswa","tahun_lulus"];

}
