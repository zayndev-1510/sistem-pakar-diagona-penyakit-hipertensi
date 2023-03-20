app.service("service", ["$http", function ($http) {
    var link="http://localhost:8000/api/admin/"

    // fungsi memanggil api data gejala
    this.dataGejala= function (callback) {
        $http({
            url:  link+"data-gejala",
            method: "GET"
        }).then(function (e) {

            callback(e.data);
        }).catch(function (err) {

        });
    }

     // fungsi memanggil api data kepastian
     this.dataKepastian= function (callback) {
        $http({
            url:  link+"data-kepastian",
            method: "GET"
        }).then(function (e) {

            callback(e.data);
        }).catch(function (err) {

        });
    }

    // fungsi memanggil api data basis
    this.dataBasis= function (callback) {
        $http({
            url:  link+"data-basis-pengetahuan-cf",
            method: "GET"
        }).then(function (e) {

            callback(e.data);
        }).catch(function (err) {

        });
    }


    // fungsi memanggil api menyimpan data gejala

    this.saveBasisPengetahuanCf= function (obj,callback) {
        $http({
            url:  link+"save-data-basis-pengetahuan-cf",
            method: "POST",
            data:obj
        }).then(function (e) {
            callback(e.data);
        }).catch(function (err) {

        });
    }


    // fungsi memanggil api mempebarui data gejala

    this.updateBasisPengetahuanCf= function (obj,callback) {
        $http({
            url:  link+"update-data-basis-pengetahuan-cf",
            method: "POST",
            data:obj
        }).then(function (e) {

            callback(e.data);
        }).catch(function (err) {

        });
    }


    // fungsi memanggil api menghapus data pgejala
    this.deleteBasisPengetahuanCf= function (obj,callback) {
        $http({
            url:  link+"delete-data-basis-pengetahuan-cf",
            method: "POST",
            data:obj
        }).then(function (e) {

            callback(e.data);
        }).catch(function (err) {

        });
    }

    // fungsi memanggil api menampilkan data penyakit
    this.dataPenyakit= function (callback) {
        $http({
            url:  link+"data-penyakit",
            method: "GET"
        }).then(function (e) {

            callback(e.data);
        }).catch(function (err) {

        });
    }


}]);
