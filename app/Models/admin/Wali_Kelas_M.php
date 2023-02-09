<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wali_Kelas_M extends Model
{
    use HasFactory;
    protected $table = "tbl_wali_kelas";
    protected $primaryKey = "id";
    public $timestamps = false;

    protected $fillable =['id_kelas','id_guru','id'];
}
