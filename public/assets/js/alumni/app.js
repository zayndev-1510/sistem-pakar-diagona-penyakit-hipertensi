/*jshint esversion: 6 */
$(document).ready(function () {
    $("#dataTable").DataTable();
});

var app = angular.module("homeApp", ["ngRoute", "datatables"]);

app.controller("homeController", function ($scope, service) {
    var fun = $scope;
    var service = service;
    $("#cover-spin").show();

    var data_alumni = [];
    var data_akademik = [];
    var temp_akademik = "";
    var temp_kelas = "";

    var group_by = [];
    fun.datasearch = [
        { caption: "Semua", value: "All" },
        { caption: "Kelas A", value: "Kelas A" },
        { caption: "Kelas B", value: "Kelas B" }
    ];


    fun.tambahData = () => {
        fun.checkedtambah = true;
        fun.ket = "Tambah Data Alumni";
        fun.getDataSiswa();
    }

    fun.getDataSiswa = () => {
        service.dataSiswa(e => {
            const data = e.filter(row => {
                if (row.status_siswa == 1) {
                    return row;
                }
            })

            fun.datasiswa = data;

        })
    }

    fun.dataAkademik = () => {
        service.dataAkademik(row => {
            data_akademik = row;
            fun.data_akademik = row;
        })
    }
    fun.dataAkademik();

    fun.dataByKelas = (row) => {
        temp_kelas = row;
        if (temp_akademik.length == 0) {
            if (row.length == 0) {

            }
            else {
                if (row == 'All') {
                    fun.getDataAlumni();
                }
                else {
                    const datafilter = data_alumni.filter(data => {
                        if (data.ket == row) {
                            return data;
                        }
                    });
                    fun.data_alumni = datafilter;
                }

            }
        }
        else {
            if ((row == 'All') && (temp_akademik == 'All')) {
                fun.getDataAlumni();
            } else if ((row == 'All') && (temp_akademik != 'All')) {
                const datafilter = data_alumni.filter(data => {
                    if ((data.tahun_lulus = temp_akademik)) {
                        return data;
                    }
                });
                fun.data_alumni = datafilter;

            } else if ((row != 'All') && (temp_akademik == 'All')) {
                const datafilter = data_alumni.filter(data => {
                    if ((data.ket == row)) {
                        return data;
                    }
                });
                fun.data_alumni = datafilter;
            } else {
                const datafilter = data_alumni.filter(data => {
                    if ((data.ket == row) && (data.tahun_lulus = temp_akademik)) {
                        return data;
                    }
                });
                fun.data_alumni = datafilter;

            }

        }

    }

    fun.dataByAkademik = (row) => {
        temp_akademik = row;
        if (temp_kelas.length == 0) {
            if (row.length == 0) {

            }
            else {
                if (row == 'All') {
                    fun.getDataAlumni();
                }
                else {
                    const datafilter = data_alumni.filter(data => {
                        if (data.id_tahun_ajaran == row) {
                            return data;
                        }
                    });
                    fun.data_alumni = datafilter;
                }

            }
        }
        else {
            if((row=='All') && (temp_kelas=='All')){
                fun.getDataAlumni();
            }else if((row=='All') && (temp_kelas !='All')){
                const datafilter = data_alumni.filter(data => {
                    if ((data.ket == temp_kelas)) {
                        return data;
                    }
                });
                fun.data_alumni = datafilter;
            }else if((row !='All') && (temp_kelas=='All')){
                const datafilter = data_alumni.filter(data => {
                    if ((data.tahun_lulus == row)) {
                        return data;
                    }
                });
                fun.data_alumni = datafilter;
            }
            else{
                const datafilter = data_alumni.filter(data => {
                    if ((data.ket == temp_kelas) && (data.tahun_lulus == row)) {
                        return data;
                    }
                });
                fun.data_alumni = datafilter;
            }

        }
    }

    fun.getDataAlumni = () => {
        service.dataAlumni(respon => {
            $("#cover-spin").hide();
            const data = respon.data.filter(row => {
                if (row.nism == null) {
                    row.nism = "-";
                    return row;
                } else {
                    return row;
                }

            })
            data_alumni = data;
            group_by = respon.groupby;
            fun.datagroup = respon.groupby;
            fun.data_alumni = data;
        });
    }

    fun.getDataAlumni();

    fun.insertData = () => {
        $("#cover-spin").show();
        const arr = [];
        var tgl_lulus = $("#tgl_lulus").val();
        if (tgl_lulus.length == 0) {
            swal({
                text: "Silakan isi terlebih dahulu tanggal kelululsan",
                icon: "error"
            });
        } else {
            for (var i = 0; i < fun.datasiswa.length; i++) {
                if (fun.datasiswa[i].Selected) {
                    arr.push({
                        id_siswa: fun.datasiswa[i].id_siswa,
                        "tahun_lulus": tgl_lulus
                    })
                }
            }
            const obj = {
                data: arr
            }

            service.saveAlumni(obj, (e) => {
                $("#cover-spin").hide();
                if (e.message > 0) {
                    swal({
                        text: "Berhasil menambahkan data alumni",
                        icon: "success"
                    }).then((res) => {
                        fun.getDataSiswa();
                        $("#tgl_lulus").val('');
                    })

                }
            })
        }




    }

    fun.deleteData = (row) => {
        swal({
            title: "Apakah anda yakin?",
            text: "Apabila menghapus data ini maka data siswa sebelumnya di kembalikan status nya dari alumni",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
            .then((willDelete) => {
                if (willDelete) {
                    service.deleteAlumni(row.id_siswa, (respon) => {
                        if (respon.message > 0) {
                            swal({
                                text: "Hapus data ini berhasil",
                                icon: "success"
                            }).then(function () {
                                fun.getDataAlumni();
                            });
                        } else {
                            swal({
                                text: "Ada kesalahan pada proses !",
                                icon: "error"
                            })
                        }
                    })

                } else {
                    swal({
                        text: "Data batal dihapus",
                        icon: "warning"
                    })
                }
            });

    }


    fun.kembali = () => {
        fun.getDataAlumni();
        fun.checkedtambah = false;
    }

});
