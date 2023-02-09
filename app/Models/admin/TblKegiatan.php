<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TblKegiatan extends Model
{
    use HasFactory;
    protected $table = "tbl_media";
    protected $primaryKey = "id";
    public $timestamps = false;
    protected $fillable = ['id',"judul","deskripsi","tgl_post","waktu_post","cover"];
}
