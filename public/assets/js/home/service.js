app.service("service", ["$http", function ($http) {
     // fungsi memanggil api data penyakit
     this.dataGejala= function (callback) {
        $http({
            url:  url+"data-gejala",
            method: "GET"
        }).then(function (e) {
            callback(e.data);
        }).catch(function (err) {

        });
    }

    // fungsi memanggil api data penyakit
    this.dataPenyakit= function (callback) {
        $http({
            url:  url+"data-penyakit",
            method: "GET"
        }).then(function (e) {
            callback(e.data);
        }).catch(function (err) {

        });
    }


    // fungsi memanggil api proses konsultasi
    this.prosesKonsultasi= function (obj,callback) {
        $http({
            url:  url+"proses-konsultasi",
            method: "POST",
            data:obj
        }).then(function (e) {
            callback(e.data);
        }).catch(function (err) {

        });
    }




}]);
