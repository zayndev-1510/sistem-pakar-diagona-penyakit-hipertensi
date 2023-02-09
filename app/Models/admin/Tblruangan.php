<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tblruangan extends Model
{
    use HasFactory;
    protected $table = "TBL_KELAS";
    protected $primaryKey = "id_kelas";
    public $timestamps = false;

    protected $fillable = ['id_kelas','keterangan','kategori'];
}
