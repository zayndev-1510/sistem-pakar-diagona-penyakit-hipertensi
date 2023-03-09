<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GejalaModels extends Model
{
    use HasFactory;

    protected $table = "tbl_gejala";
    protected $primaryKey = "kode_gejala";
    public $timestamps = false;

    protected $fillable =["kode_penyakit","nama_gejala","kode_gejala"];
}
