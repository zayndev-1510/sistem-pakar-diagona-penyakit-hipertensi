<?php

namespace App\Http\Controllers\plugin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Mail\emailMarkdown;
use App\Models\api\registrasi;
use Illuminate\Support\Facades\Mail;
class emails extends Controller
{
    public function sendVerifikasi(Request $res){
        $x=registrasi::where('email',"=",$res->email)->select("email")->get();
        if(count($x)>0){
            echo json_encode(2);
        }else{
            Mail::to($res->email)->send(new emailMarkdown());
            if( count(Mail::failures()) > 0 ) {
    
                echo "There was one or more failures. They were: <br />";
             
                foreach(Mail::failures() as $email_address) {
                    echo json_encode(" - $email_address <br />");
                 }
             
             } else {
                 echo json_encode(1);
             }
        }
    }
}
