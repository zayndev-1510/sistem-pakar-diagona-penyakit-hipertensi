<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class cobaModel extends Model
{
    use HasFactory;
    protected $table="tbl_coba_user";
    protected $primaryKey="id";
    public $timestamps = false;

    protected $fillable = ['id','username','alamat','sandi'];
}
