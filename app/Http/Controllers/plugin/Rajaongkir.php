<?php

namespace App\Http\Controllers\plugin;

use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\api\alamatModel;
use App\Models\api\kabupatenModel;
use App\Models\api\kecamatanModel;
use Illuminate\Http\Request;


class Rajaongkir extends Controller
{
    public function provinsi()
    {
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://api.rajaongkir.com/starter/province",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => array(
                "content-type: application/x-www-form-urlencoded",
                "key:a12d268a013468a78addca28850b66f9"
            ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            echo "cURL Error #:" . $err;
        } else {
            echo $response;
        }
    }

    public function kabupaten(Request $r)
    {
        $kabupaten = kabupatenModel::where("id_provinsi", "=", $r->id_provinsi)->get();
        echo json_encode($kabupaten);
    }
    public function kecamatan(Request $r)
    {
        $kecamatan = kecamatanModel::where("id_kota", "=", $r->id_kota)->get();
        echo json_encode($kecamatan);
    }
    public function setAlamat(Request $r)
    {
        $x = alamatModel::create($r->all());
        if ($x) {
            echo json_encode(1);
        } else {
            echo json_encode(0);
        }
    }

    public function detailAlamat(Request $r)
    {
        $data = DB::table('tbl_kecamatan')->
        join("tbl_kabupaten", "tbl_kabupaten.id_kota", "=", "tbl_kecamatan.id_kota")->
        select("tbl_kabupaten.nama as nama_kota", "tbl_kecamatan.nama as nama_kecamatan",
         "tbl_kabupaten.id_kota", "tbl_kecamatan.id")->where("tbl_kecamatan.id", "=", $r->id)->get();
        echo json_encode($data);
    }

    public function detailAlamatPenjual(Request $r){
        $data=DB::table("tbl_alamat")->where("id_pengguna","=",$r->id_pengguna)->
        select("id_kota")->first();
        return collect($data); 
    }

    function get_cost($id_kota_asal, $id_kota_tujuan, $berat, $courir)
    {
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://api.rajaongkir.com/starter/cost",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => "origin={$id_kota_asal}&destination={$id_kota_tujuan}&weight={$berat}&courier=$courir",
            CURLOPT_HTTPHEADER => array(
                "content-type: application/x-www-form-urlencoded",
                "key:a12d268a013468a78addca28850b66f9"
            ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            return "cURL Error #:" . $err;
        } else {
            return $response;
        }
    }

    public function getDestination(Request $r){
        $alamat=alamatModel::where("id_pengguna","=",$r->id_pengguna)->first();
        echo json_encode($alamat);
    }

    function array_sort_by_column(&$arr, $col, $dir = SORT_DESC)
    {
        $sort_col = array();
        foreach ($arr as $key => $row) {
            $sort_col[$key] = $row[$col];
        }

        array_multisort($sort_col, $dir, $arr);
    }
    public function ongkosKurir(Request $r)
    {
        $list_courir = ['jne', 'pos', 'tiki']; // Untuk tipe akun starter ada 3 pilhan kurir

        $cost_per_courir = [];
        $kota_asal = $r->from;
        $kota_tujuan = $r->to;
        $berat = $r->berat;
        // Perulangan untuk memanggil fungsi get_cost berdasarkan list kurir
        for ($i = 0; $i < 3; $i++) :
            $result = json_decode($this->get_cost($kota_asal, $kota_tujuan, $berat, $list_courir[$i]), true);
            $cost_per_courir[] = $result['rajaongkir']['results'][0];
        endfor;

        $this->array_sort_by_column($cost_per_courir, 'costs'); // Sort berdasarkan costs
      
        foreach ($cost_per_courir as $key => $value) {
           
            foreach ($value["costs"] as $key2 => $value2) {
                $str=$value2["cost"][0]["etd"];
                $explode=explode("-",$str);
                if(count($explode)>1){
                    $format=$str." Hari ";
                }
                else{
                    $explode2=explode(" ",$str);
                    $format=$explode2[0]." "."Hari";
                }
                $datanew[]=[
                    "kode"=>strtoupper($value["code"]),"service"=>$value2["service"],
                    "nama"=>$value["name"],
                    "deskripsi"=>$value2["description"],"harga"=>$value2["cost"][0]["value"]
                    ,"waktu"=>$value2["cost"][0]["etd"],"format"=>$format
                ];
            }
        }
       
        echo json_encode($datanew);


    }
}
