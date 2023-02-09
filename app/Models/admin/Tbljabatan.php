<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tbljabatan extends Model
{
    use HasFactory;
    protected $table = "tbl_jabatan";
    protected $primaryKey = "id";
    public $timestamps = false;

    protected $fillable = ['id','ket'];
}
