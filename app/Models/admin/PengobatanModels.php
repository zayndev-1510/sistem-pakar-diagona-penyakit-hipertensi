<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PengobatanModels extends Model
{
    use HasFactory;
    protected $table = "tbl_atasi_penyakit";
    protected $primaryKey = "id_atasi";
    public $timestamps = false;

    protected $fillable =["id_atasi","kode_penyakit","tips"];
}

