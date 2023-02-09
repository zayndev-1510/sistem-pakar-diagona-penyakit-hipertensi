<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tahapanModel extends Model
{
    use HasFactory;

    use HasFactory;
    protected $table="tbl_tahapan";
    protected $primaryKey="id";
    public $timestamps = false;

    protected $fillable = ['id','keterangan'];
}
