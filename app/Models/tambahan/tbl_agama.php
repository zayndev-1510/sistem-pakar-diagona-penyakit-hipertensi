<?php

namespace App\Models\tambahan;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tbl_agama extends Model
{
    use HasFactory;
    protected $table="TBL_AGAMA";
    protected $primaryKey="id";
    public $timestamps = false;
    protected $fillable = ['id','keterangan'];
}
