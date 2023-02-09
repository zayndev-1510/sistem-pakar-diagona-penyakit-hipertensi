<?php

namespace App\Models\tambahan;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tblmaintenance extends Model
{
    use HasFactory;
    protected $table = "tbl_maintenance";
    protected $primaryKey = "id";
    public $timestamps = false;

    protected $fillable = ['id','ket','status'];
}
