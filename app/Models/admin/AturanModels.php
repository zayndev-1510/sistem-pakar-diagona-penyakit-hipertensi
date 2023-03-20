<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AturanModels extends Model
{
    use HasFactory;

    protected $table = "tbl_aturan";
    protected $primaryKey = "id_aturan";
    public $timestamps = false;

    protected $fillable =["id_aturan","rules","kode_penyakit"];
}
