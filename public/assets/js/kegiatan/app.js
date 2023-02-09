/*jshint esversion: 6 */
$(document).ready(function () {
    $("#dataTable").DataTable();
    $("#deskripsi").summernote();
});

function preview(event, a) {
    var berkas = event.target;
    var ext = berkas.value.substring(berkas.value.lastIndexOf(".") + 1);

    if(a==1){
        if (ext != "jpg") {
            swal({
                text: "Format file tidak mendukung",
                icon: "warning",
            });
        }
        else{
            const loadimg = document.getElementById("image_thumbnail");
            loadimg.src = URL.createObjectURL(event.target.files[0]);
        }
    }
    else {
        if (ext != "mp4") {
            swal({
                text: "Format file tidak mendukung",
                icon: "warning",
            });
        }
        else{
                const loading_video=document.getElementById("loadVideo");
                loading_video.src= URL.createObjectURL(event.target.files[0]);
        }
    }
}

var app = angular.module("homeApp", ["ngRoute", "datatables"]);

app.controller("homeController", function ($scope, service) {
    var fun = $scope;
    var service = service;
    var aksi=0;

    var judul=document.getElementById("judul");
    fun.checkedtambah=false;
    fun.loadData=()=>{
        service.dataKegiatan(e=>{
            fun.datakegiatan=e;
        })
    }
    fun.loadData();

    fun.tambahData=()=>{
        fun.checkedtambah=true;
        fun.btnsimpan=true;
        fun.k1=true;
        fun.ket="Buat kegiatan baru"
    }

    fun.openThumbnail=()=>{
        document.getElementById("filethumbnail").click();
    }
    fun.openVideo=()=>{
        document.getElementById("filevideo").click();
    }

    fun.saveKegiatan=()=>{
        var file_thumbnail=document.getElementById("filethumbnail");
        var berkas_file_thumbnail=new FormData();

        var file_video=document.getElementById("filevideo");
        var berkas_file_video=new FormData();
        var deskripsi=$("#deskripsi").summernote("code");


        berkas_file_thumbnail.append("file",file_thumbnail.files[0]);
        berkas_file_video.append("file",file_video.files[0]);
        if(judul.value.length==0){
            swal({
                text:"Masukan judul kegiatan",
                icon:"warning"
            })
        }
        else{
            const obj={
                judul:judul.value,deskripsi:deskripsi,
                cover:"",video:""
            };

            $("#cover-spin").show();

        service.uploadThumbnail(berkas_file_thumbnail,(response)=>{
                obj.cover=response.data;
            service.uploadVideo(berkas_file_video,(response_2)=>{
                obj.video=response_2.data;
                if(response_2.val>0){
                    service.saveKegiatan(obj,(res_insert)=>{
                        $("#cover-spin").hide();
                        if(res_insert.val>0){
                            swal({
                                text:"Data kegiatan ini berhasil disimpan",
                                icon:"success"
                            });
                            fun.loadData();
                        }
                        else{
                            swal({
                                text:"Data kegiatan ini gagal disimpan",
                                icon:"error"
                            });
                        }
                    });
                }
            })
        })

        }



    }

    fun.kembali=()=>{
        fun.loadData();
        fun.checkedtambah=false;
    }

    fun.rincianKegiatan=(data)=>{
        document.getElementById("detail_video").innerHTML=data.judul;
        document.getElementById("detail_deskripsi").innerHTML=data.deskripsi;
        document.getElementById("detail_foto").src="http://localhost:8000/thumbnail/"+data.cover;
        document.getElementById("load_detail_video").src="http://localhost:8000/video/"+data.video;
    }

    fun.hapus=(row)=>{
        $("#cover-spin").show();
        service.deleteKegiatan(row.id,(e)=>{
            $("#cover-spin").hide();
            if(e.val>0){
                swal({
                    text:"Hapus data berhasil",
                    icon:"success"
                })
                fun.loadData();
            }else{
                swal({
                    text:"Hapus data gagal",
                    icon:"error"
                })
            }
        })
    }



});
