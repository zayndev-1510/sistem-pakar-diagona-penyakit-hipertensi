app.service("service", ["$http", function ($http) {
    var link="http://localhost:8000/api/"


     // fungsi memanggil api data penyakit
     this.dataGejala= function (callback) {
        $http({
            url:  link+"pengguna/data-gejala",
            method: "GET"
        }).then(function (e) {
            callback(e.data);
        }).catch(function (err) {

        });
    }

    // fungsi memanggil api data penyakit
    this.dataPenyakit= function (callback) {
        $http({
            url:  link+"pengguna/data-penyakit",
            method: "GET"
        }).then(function (e) {
            callback(e.data);
        }).catch(function (err) {

        });
    }


    // fungsi memanggil api proses konsultasi
    this.prosesKonsultasi= function (obj,callback) {
        $http({
            url:  link+"proses-konsultasi",
            method: "POST",
            data:obj
        }).then(function (e) {
            callback(e.data);
        }).catch(function (err) {

        });
    }




}]);
