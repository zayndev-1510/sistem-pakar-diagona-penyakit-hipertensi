<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tblpengajar extends Model
{
    use HasFactory;
    protected $table = "tbl_pengajar";
    protected $primaryKey = "id";
    public $timestamps = false;
    protected $fillable = ['id','id_guru','id_kelas'];

}
