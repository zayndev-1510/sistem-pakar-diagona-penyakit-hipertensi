<?php

namespace App\Http\Controllers\admin\page;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class Page extends Controller
{
    public function halamanPenyakit(){
        $data=(Object)[
            "keterangan"=>"Data "
        ];
        return view("admin.tahun_ajaran",compact('data','datalogin'));
    }
}
