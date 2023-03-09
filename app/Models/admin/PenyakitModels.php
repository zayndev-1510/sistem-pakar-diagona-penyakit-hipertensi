<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PenyakitModels extends Model
{
    use HasFactory;
    protected $table = "tbl_penyakit";
    protected $primaryKey = "kode_penyakit";
    public $timestamps = false;

    protected $fillable =["kode_penyakit","nama_penyakit"];
    
}
