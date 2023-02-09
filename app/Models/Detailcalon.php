<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Detailcalon extends Model
{
    use HasFactory;
    use HasFactory;
    protected $table="tbl_detail_calon";
    protected $primaryKey="id";
    public $timestamps = false;

    protected $fillable = 
    ['id_detail','id_calon','nik_ayah','nama_ayah','tempat_lahir_ayah','tgl_lahir_ayah','pekerjaan_ayah','alamat',
    'nik_ibu','nama_ibu','tempat_lahir_ibu','tgl_lahir_ibu','pekerjaan_ibu',"agama_ayah","agama_ibu"
    ];
}
