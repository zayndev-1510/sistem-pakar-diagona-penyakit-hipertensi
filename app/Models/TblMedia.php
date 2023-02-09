<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TblMedia extends Model
{
    use HasFactory;
    protected $table="tbl_media";
    protected $primaryKey="id";
    public $timestamps = false;

    protected $fillable = ["id","deskripsi","cover","video","tgl_post","waktu_post","judul"];
}
