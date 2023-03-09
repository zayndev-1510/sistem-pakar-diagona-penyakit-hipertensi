/*jshint esversion: 6 */
$(document).ready(function () {
    $("#dataTable").DataTable();
});

//deklarasi variabel file berkas
var file_ktp = "";
var file_kk = "";
var file_sk = "";


// fungsi preview file berkas
function preview(event, a) {
    var berkas = event.target;
    var ext = berkas.value.substring(berkas.value.lastIndexOf(".") + 1);

    if (a == 1) {
        if (ext != "jpg") {
            swal({
                text: "Format file harus image/jpg",
                icon: "warning",
            });
        } else {


            var loadimg = document.getElementById("image_foto");
            loadimg.src = URL.createObjectURL(event.target.files[0]);

        }
    }
    else if (a == 2) {
        if (ext != "pdf") {
            swal({
                text: "Format file harus pdf",
                icon: "warning",
            });
        }
        else {
            file_ktp = URL.createObjectURL(event.target.files[0]);
        }
    }

    else if (a == 3) {
        if (ext != "pdf") {
            swal({
                text: "Format file harus pdf",
                icon: "warning",
            });
        }
        else {
            file_kk = URL.createObjectURL(event.target.files[0]);
        }
    }

    else if (a == 4) {
        if (ext != "pdf") {
            swal({
                text: "Format file harus pdf",
                icon: "warning",
            });
        }
        else {
            file_sk = URL.createObjectURL(event.target.files[0]);
        }
    }

}

// deklarasi variabel untuk module angular dengan nama "homeApp"

var app = angular.module("homeApp", ["ngRoute", "datatables"]);


// menggunakan controller dari angular dengan nama "homeController"

app.controller("homeController", function ($scope, service) {

    //deklarasi variabel mengambil nilai dari "$scope"
    var fun = $scope;

    //deklarasi variabel mengambil nilai dari "service"
    var service = service;


    //Deklarasi variabel "nama_lengkap" dengan berisikan string
    fun.nama_lengkap = "Zayn";

    //deklarasi variabel "randomDigit" dengan nilai kosong
    var randomDigit="";

    //deklarasi variabel "guru" mengambil nilai dom dari class "guru"
    var guru = document.getElementsByClassName("guru");

    //deklarasi variabel "dataguru" dengan berisikan array kosong
    var dataguru = [];

    //deklarasi variabel "btnsimpan" dengan berisikan false
    fun.btnsimpan = false;

    //deklarasi variabel "btnperbarui" dengan berisikan false
    fun.btnperbarui = false;

    //deklarasi variabel "filefoto" dengan berisikan false
    fun.filefoto = false;


    //deklarasi variabel "data_simpan" type absurd;
    var data_simpan;

    //fungsi Membuka File Foto dengan nama fungsi "openFoto"
    fun.openFoto = () => {
        document.getElementById("filefoto").click();
    };

    //fungsi Membuka File KTP dengan nama fungsi "openKtp"
    fun.openKtp = () => {
        document.getElementById("filektp").click();
    }

    //fungsi Membuka File KK dengan nama fungsi "openKK"
    fun.openKk = () => {
        document.getElementById("filekk").click();
    };

    //fungsi Membuka file SK dengan nama fungsi "openSK"
    fun.openSk = () => {
        document.getElementById("filesk").click();
    }


    //fungsi mendapatkan file ktp
    fun.getKtp = () => {
        var page = document.createElement("a");
        page.target = "_blank";
        page.href = file_ktp;
        page.click();

    }

       //fungsi mendapatkan file KK
    fun.getKk = () => {
        var page = document.createElement("a");
        page.target = "_blank";
        page.href = file_kk;
        page.click();

    }

       //fungsi mendapatkan file SK
    fun.getSk = () => {
        var page = document.createElement("a");
        page.target = "_blank";
        page.href = file_sk;
        page.click();

    }

    //fungsi d untuk menampikan data guru
    fun.dataGuru = () => {
        $("#cover-spin").show();
        dataguru = [];
        service.dataGuru((res) => {
            var row=res.data;
            for (var i in row) {
                var x = row[i];
                dataguru.push(x);
            }
            fun.dataguru = dataguru;
            $("#cover-spin").hide();
        });
    };

    //funsgi bersihkan data yang dimasukan
    fun.clear = () => {
        for (var i = 0; i < guru.length; i++) {
            guru[i].value = "";
        }
    };

    //memanggil fungsi data
    fun.dataGuru();

    //fungsi membuka form tambah data guru
    fun.tambahData = () => {
        fun.checkedtambah = true;
        fun.checkedtable = true;
        fun.ket = "Tambah Guru";
        fun.btnsimpan = true;
        randomDigit=Math.floor(Math.random() * 99999999);
        fun.id_card=randomDigit;
    };


    //fungsi detail data guru
    fun.detail = (row) => {
        fun.checkedtambah = true;
        fun.checkedtable = true;
        fun.ket = "Perbarui Guru";
        fun.btnperbarui = true;
        fun.id = row.id_guru;
        fun.id_card=row.id_card;
        fun.foto=row.foto;
        fun.ktp=row.ktp;
        fun.sk=row.sk;
        service.detailAkun(row.id_card,(res)=>{
            var data = [
                row.nip_guru,
                row.nama_guru,
                row.tempat_lahir,
                row.tgl_lahir,
                row.jenis_kelamin,
                row.id_agama,
                row.gelar_depan,
                row.gelar_belakang,
                row.no_telp,
                row.email,
                row.alamat_rumah,
                res.data.username,
                res.data.katasandi
            ];


            for (var i in data) {
                guru[i].value = data[i];
            }
        })


    };


    //fungsi menyimpan data guru
    fun.save = () => {

        data_simpan = {
          nip_guru:guru[0].value,nama_guru:guru[1].value,
          tempat_lahir:guru[2].value,tgl_lahir:guru[3].value,
          jenis_kelamin:guru[4].value,id_agama:guru[5].value,
          gelar_depan:guru[6].value,gelar_belakang:guru[7].value,
          no_telp:guru[8].value,email:guru[9].value,
          alamat_rumah:guru[10].value,foto:"",ktp:"",sk:"",
          id_card:randomDigit,username:guru[11].value,katasandi:guru[12].value,
        };


        var file_upload_foto = document.getElementById("filefoto");
        var file_upload_ktp = document.getElementById("filektp");
        var file_upload_sk = document.getElementById("filekk");
        var fd_foto = new FormData();
        var fd_ktp = new FormData();
        var fd_sk = new FormData();
        var POST_FILE = ["filefoto", "filektp","filesk"];
        var PATH_FILE = ["guru_foto", "guru_ktp","guru_sk"];
        $("#cover-spin").show();
        if (file_upload_foto.value.length > 0) {
            fd_foto.append(POST_FILE[0], file_upload_foto.files[0]);
            service.uploadFotoGuru(fd_foto, POST_FILE[0], PATH_FILE[0],randomDigit, (res) => {
                if (res.val > 0) {
                    data_simpan.foto = res.data;
                }
            });
        }

        if (file_upload_ktp.value.length > 0) {
            fd_ktp.append(POST_FILE[1], file_upload_ktp.files[0]);
            service.uploadFotoGuru(fd_ktp, POST_FILE[1], PATH_FILE[1],randomDigit, (res) => {
                if (res.val > 0) {
                    data_simpan.ktp = res.data;
                }
            });
        }
        if (file_upload_sk.value.length > 0) {
            fd_sk.append(POST_FILE[2], file_upload_sk.files[0]);
            service.uploadFotoGuru(fd_sk, POST_FILE[2], PATH_FILE[2],randomDigit, (res) => {
                if (res.val > 0) {
                    data_simpan.sk = res.data;
                }
            });
        }




        setTimeout(function () {
            service.saveGuru(data_simpan, (row) => {
                $("#cover-spin").hide();
                if (row .action== 1) {
                    swal({
                        text: "Data Guru ini telah disimpan",
                        icon: "success",
                    }).then(function (e) {
                        fun.clear();
                    });
                } else if (row == 2) {
                    swal({
                        text: "Data Guru ini gagal disimpan",
                        icon: "error",
                    }).then(function (e) { });
                }
                else {
                    swal({
                        text: "Data Guru ini gagal disimpan",
                        icon: "error",
                    }).then(function (e) { });
                }
            });
        }, 3000);
    };

    //fungsi memperbarui data guru
    fun.perbarui = () => {
        $("#cover-spin").show();

        data_simpan = {
            nip:guru[0].value,nama_guru:guru[1].value,
            tempat_lahir:guru[2].value,tgl_lahir:guru[3].value,
            jenis_kelamin:guru[4].value,id_agama:guru[5].value,
            gelar_depan:guru[6].value,gelar_belakang:guru[7].value,
            no_telp:guru[8].value,email:guru[9].value,
            alamat_rumah:guru[10].value,
            id_guru:fun.id,id_card:fun.id_card,
            foto:fun.foto,ktp:fun.ktp,sk:fun.sk,
            username:guru[11].value,katasandi:guru[12].value
          };


          var file_upload_foto = document.getElementById("filefoto");
          var file_upload_ktp = document.getElementById("filektp");
          var file_upload_sk = document.getElementById("filekk");
          var fd_foto = new FormData();
          var fd_ktp = new FormData();
          var fd_sk = new FormData();
          var POST_FILE = ["filefoto", "filektp","filesk"];
          var PATH_FILE = ["guru_foto", "guru_ktp","guru_sk"];
          $("#cover-spin").show();
          if (file_upload_foto.value.length > 0) {
              fd_foto.append(POST_FILE[0], file_upload_foto.files[0]);
              service.uploadFotoGuru(fd_foto, POST_FILE[0], PATH_FILE[0],randomDigit, (res) => {
                  if (res.val > 0) {
                      data_simpan.foto = res.data;
                  }
              });
          }

          if (file_upload_ktp.value.length > 0) {
              fd_ktp.append(POST_FILE[1], file_upload_ktp.files[0]);
              service.uploadFotoGuru(fd_ktp, POST_FILE[1], PATH_FILE[1],randomDigit, (res) => {
                  if (res.val > 0) {
                      data_simpan.ktp = res.data;
                  }
              });
          }
          if (file_upload_sk.value.length > 0) {
              fd_sk.append(POST_FILE[2], file_upload_sk.files[0]);
              service.uploadFotoGuru(fd_sk, POST_FILE[2], PATH_FILE[2],randomDigit, (res) => {
                  if (res.val > 0) {
                      data_simpan.sk = res.data;
                  }
              });
          }

          console.log(data_simpan)

        setTimeout(function () {
            service.updateGuru(data_simpan, (row) => {
                $("#cover-spin").hide();
                if (row.action > 0) {
                    swal({
                        text: "Data Guru ini telah diperbarui",
                        icon: "success",
                    }).then(function (e) {
                        fun.clear();
                    });
                } else {
                    swal({
                        text: "Data Guru ini gagal diperbarui",
                        icon: "error",
                    }).then(function (e) { });
                }
            });
        }, 3000);


    };

    //fungsi kembali ke tabel data guru
    fun.kembali = () => {
        fun.checkedtambah = false;
        fun.checkedtable = false;
        fun.btnsimpan = false;
        fun.btnperbarui = false;
        fun.filefoto = false;
        fun.dataGuru();
    };

    //fungsi atur foto guru
    fun.aturFoto = (row) => {
        fun.checkedtambah = true;
        fun.checkedtable = true;
        fun.filefoto = true;
        fun.id = row.id;
        fun.ket = "Atur Foto"
    }

    //fungsi hapus data guru
    fun.hapus = (row) => {
        $("#cover-spin").show();
        const obj = {
            id_card: row.id_card,
            id_guru:row.id_guru
        };
        service.deleteGuru(obj.id_card,obj.id_guru,(row) => {
            $("#cover-spin").hide();
            if (row.action > 0) {
                swal({
                    text: "Data Guru ini telah dihapus",
                    icon: "success",
                }).then(function (e) {
                    fun.dataGuru();
                });
            } else {
                swal({
                    text: "Data Guru ini gagal dihapus",
                    icon: "error",
                }).then(function (e) { });
            }
        });
    };
});
