<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdminModels extends Model
{
    use HasFactory;
    protected $table = "tbl_admin";
   
    public $timestamps = false;

    protected $fillable =["id_login","nama_lengkap","foto","username","katasandi"];


}
