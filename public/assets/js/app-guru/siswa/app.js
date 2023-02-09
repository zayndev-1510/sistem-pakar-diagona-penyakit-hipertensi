/*jshint esversion: 6 */
$(document).ready(function () {
    $("#dataTable").DataTable();
});

function preview(event, a) {
    var berkas = event.target;
    var ext = berkas.value.substring(berkas.value.lastIndexOf(".") + 1);
    if (ext != "jpg") {
        swal({
            text: "Format file tidak mendukung",
            icon: "warning",
        });
    } else {
        if (a == 1) {
            const loadimg = document.getElementById("muatsampul1");
            loadimg.src = URL.createObjectURL(event.target.files[0]);
        } else {
            const loadimg = document.getElementById("muatsampul2");
            loadimg.src = URL.createObjectURL(event.target.files[0]);
        }
    }
}

var app = angular.module("homeApp", ["ngRoute", "datatables"]);

app.controller("homeController", function ($scope, service) {
    var fun = $scope;
    var service = service;
    fun.datasiswa = [];
    var id_pengguna = $("#id_pengguna_temp").val();
    var pengajar_temp=$("#pengajar_temp");
    var tahun_temp=$("#tahun_temp");
    var id_kelas=0;
    var nama_kelas="";
    var datatahun = [
        {
            id: 0,
            ket: "Pilih Tahun Akademik",
            semester: "",
            tgl: "",
            status: "",
        },
    ];

    fun.datakelas=[
        {value:"Pilih Kelas",ket:"Pilih Kelas"},
        {value:"Kelas A",ket:"Kelas A"},
        {value:"Kelas B",ket:"Kelas B"},
    ]
    fun.ta="-";
    fun.kelas="-";
    fun.matpel="-";
    fun.jmlsiswa="-";
    service.dataTahunAkademik((row) => {
        for (var i in row) {
            var data = row[i];
            datatahun.push(row[i]);
        }
        fun.datatahun = datatahun;
    });

    fun.viewData=()=>{
        nama_kelas=$("#nama_kelas").val();
        datatahun.filter(row=>{
            if(row.id==tahun_temp.val()){
               fun.ta=row.ket;
               if(row.status==1){
                fun.status_akademik="Sedang Berjalan";
               }
               else{
                fun.status_akademik="Telah Berakhir";
               }
            }
        })

        fun.kelas=nama_kelas;
        service.dataSiswa(row=>{
            var data=row;
           const datasiswa=data.filter(e=>{
                if((e.id_tahun_ajaran==tahun_temp.val()) && (e.nama_kelas==nama_kelas)){
                    return e;
                }
            })
            fun.datasiswa=datasiswa;
            fun.jmlsiswa=datasiswa.length;
        })
    }
});
