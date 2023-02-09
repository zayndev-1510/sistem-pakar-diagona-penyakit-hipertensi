<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tbltahun_ajaran extends Model
{
    use HasFactory;
    protected $table = "TBL_TAHUN_AJARANG";
    protected $primaryKey = "id";
    public $timestamps = false;

    protected $fillable =['id', 'tahun_akademik','semester','tgl','status'];

}
