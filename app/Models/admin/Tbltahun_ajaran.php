<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tbltahun_ajaran extends Model
{
    use HasFactory;
    protected $table = "TBL_TAHUN_AJARAN";
    protected $primaryKey = "id_tahun_ajaran";
    public $timestamps = false;

    protected $fillable =['id_tahun_ajaran', 'tahun_akademik','semester','tgl','status'];

}
