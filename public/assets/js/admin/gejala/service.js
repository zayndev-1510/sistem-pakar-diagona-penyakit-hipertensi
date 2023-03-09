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


    // fungsi memanggil api menyimpan data gejala

    this.saveGejala= function (obj,callback) {
        $http({
            url:  link+"save-data-gejala",
            method: "POST",
            data:obj
        }).then(function (e) {
            callback(e.data);
        }).catch(function (err) {

        });
    }


    // fungsi memanggil api mempebarui data gejala

    this.updateGejala= function (obj,callback) {
        $http({
            url:  link+"update-data-gejala",
            method: "POST",
            data:obj
        }).then(function (e) {

            callback(e.data);
        }).catch(function (err) {

        });
    }


    // fungsi memanggil api menghapus data pgejala
    this.deleteGejala= function (obj,callback) {
        $http({
            url:  link+"delete-data-gejala",
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
