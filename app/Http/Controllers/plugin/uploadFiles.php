<?php

namespace App\Http\Controllers\plugin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class uploadFiles extends Controller
{
    public function uploadImageGuru(Request $r,$POST_FILE,$PATH_FILE,$ID_CARD)
    {
        $ORIGIN_PATH=explode("_",$PATH_FILE);
        $uploadPath = public_path($ORIGIN_PATH[0]."/".$ID_CARD."/".$ORIGIN_PATH[1]);

        if (!File::isDirectory($uploadPath)) {
            File::makeDirectory($uploadPath, 0755, true, true);
        }

        $file = $r->file($POST_FILE);
        $explode = explode('.', $file->getClientOriginalName());
        $originalName = $explode[0];
        $extension = $file->getClientOriginalExtension();
        $rename = 'file_' . date('YmdHis') . '.' . $extension;
        $mime = $file->getClientMimeType();
        $filesize = $file->getSize();

        if ($file->move($uploadPath, $rename)) {
            return response()->json(
                [
                    'val' => 1,
                    'message' => "Upload image berhasil",
                    'data' => $rename,
                    "hasil_post"=>$POST_FILE
                ]
            );
        }

        return response()->json(
            [
                'val' => 0,
                'message' => "Upload gagal",
            ]
        );
    }
    public function uploadImageKk(Request $r,$nik)
    {
        $uploadPath = public_path('siswa/'.$nik."/kk/");

        if (!File::isDirectory($uploadPath)) {
            File::makeDirectory($uploadPath, 0755, true, true);
        }

        $file = $r->file('file');
        $explode = explode('.', $file->getClientOriginalName());
        $originalName = $explode[0];
        $extension = $file->getClientOriginalExtension();
        $rename = 'file_' . date('YmdHis') . '.' . $extension;
        $mime = $file->getClientMimeType();
        $filesize = $file->getSize();

        if ($file->move($uploadPath, $rename)) {
            return response()->json(
                [
                    'val' => 1,
                    'message' => "Upload image berhasil",
                    'data' => $rename
                ]
            );
        }

        return response()->json(
            [
                'val' => 0,
                'message' => "Upload gagal",
            ]
        );
    }

    public function uploadImageSiswa(Request $r,$nism)
    {
        $uploadPath = public_path('siswa/'.$nism."/akun/");

        if (!File::isDirectory($uploadPath)) {
            File::makeDirectory($uploadPath, 0755, true, true);
        }

        $file = $r->file('file');
        $explode = explode('.', $file->getClientOriginalName());
        $originalName = $explode[0];
        $extension = $file->getClientOriginalExtension();
        $rename = 'file_' . date('YmdHis') . '.' . $extension;
        $mime = $file->getClientMimeType();
        $filesize = $file->getSize();

        if ($file->move($uploadPath, $rename)) {
            return response()->json(
                [
                    'val' => 1,
                    'message' => "Upload image berhasil",
                    'data' => $rename
                ]
            );
        }

        return response()->json(
            [
                'val' => 0,
                'message' => "Upload gagal",
            ]
        );
    }

    public function uploadIjazahSiswa(Request $r,$id_siswa)
    {
        $uploadPath = public_path('ijazah/siswa/'.$id_siswa."/");

        if (!File::isDirectory($uploadPath)) {
            File::makeDirectory($uploadPath, 0755, true, true);
        }

        $file = $r->file('file');
        $explode = explode('.', $file->getClientOriginalName());
        $originalName = $explode[0];
        $extension = $file->getClientOriginalExtension();
        $rename = 'file_' . date('YmdHis') . '.' . $extension;
        $mime = $file->getClientMimeType();
        $filesize = $file->getSize();

        if ($file->move($uploadPath, $rename)) {
            return response()->json(
                [
                    'val' => 1,
                    'message' => "Upload file berhasil",
                    'data' => $rename
                ]
            );
        }
        return response()->json(
            [
                'val' => 0,
                'message' => "Upload gagal",
            ]
        );
    }

    public function uploadThumbnailKegiatan(Request $r)
    {
        $uploadPath = public_path('thumbnail/');

        if (!File::isDirectory($uploadPath)) {
            File::makeDirectory($uploadPath, 0755, true, true);
        }

        $file = $r->file('file');
        $explode = explode('.', $file->getClientOriginalName());
        $originalName = $explode[0];
        $extension = $file->getClientOriginalExtension();
        $rename = 'file_' . date('YmdHis') . '.' . $extension;
        $mime = $file->getClientMimeType();
        $filesize = $file->getSize();

        if ($file->move($uploadPath, $rename)) {
            return response()->json(
                [
                    'val' => 1,
                    'message' => "Upload file berhasil",
                    'data' => $rename
                ]
            );
        }
        return response()->json(
            [
                'val' => 0,
                'message' => "Upload gagal",
            ]
        );
    }

    public function uploadVideoKegiatan(Request $r)
    {
        $uploadPath = public_path('video/');

        if (!File::isDirectory($uploadPath)) {
            File::makeDirectory($uploadPath, 0755, true, true);
        }

        $file = $r->file('file');
        $explode = explode('.', $file->getClientOriginalName());
        $originalName = $explode[0];
        $extension = $file->getClientOriginalExtension();
        $rename = 'file_' . date('YmdHis') . '.' . $extension;
        $mime = $file->getClientMimeType();
        $filesize = $file->getSize();

        if ($file->move($uploadPath, $rename)) {
            return response()->json(
                [
                    'val' => 1,
                    'message' => "Upload file berhasil",
                    'data' => $rename
                ]
            );
        }
        return response()->json(
            [
                'val' => 0,
                'message' => "Upload gagal",
            ]
        );
    }




}
