<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BasisPengetahuanCFModels extends Model
{
    use HasFactory;

    protected $table = "tbl_basis_pengetahuan";
    protected $primaryKey = "id_pengetahuan";
    public $timestamps = false;

    protected $fillable =["id_pengetahuan","kode_penyakit","kode_gejala","mb","md"];
}
