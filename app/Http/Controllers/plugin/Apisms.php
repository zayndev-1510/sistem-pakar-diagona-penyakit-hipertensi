<?php

namespace App\Http\Controllers\plugin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class Apisms extends Controller
{
    public function sendVerifikasi(Request $req)
    {
        $fields_string  =   "";
        $fields     =   array(
            'api_key'       =>  '85f10f8b',
            'api_secret'    =>  'U9q38Nakp3yRo91w',
            'to'            =>  '+6282297886738',
            'from'          =>  "OLSHOP BUTON",
            'text'          =>  "Ini adalah kode verifikasi anda"
        );
        $url        =   "https://rest.nexmo.com/sms/json";

        //url-ify the data for the POST
        foreach ($fields as $key => $value) {
            $fields_string .= $key . '=' . $value . '&';
        }
        rtrim($fields_string, '&');

        //open connection
        $ch = curl_init();

        //set the url, number of POST vars, POST data
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, count($fields));
        curl_setopt($ch, CURLOPT_POSTFIELDS, $fields_string);

        //execute post
        $result = curl_exec($ch);
        //close connection
        curl_close($ch);

        echo json_encode($result);
    }
}
