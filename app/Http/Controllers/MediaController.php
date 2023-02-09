<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class MediaController extends Controller
{
    public function getMedia(){

        $data=DB::table("tbl_media")->select("*")->get();
        echo json_encode($data);

    }
}
