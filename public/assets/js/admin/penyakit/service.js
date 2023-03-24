app.service("service", ["$http", function ($http) {
    var link="http://localhost:8000/api/admin/"

    // fungsi memanggil api data penyakit
    this.dataPenyakit= function (callback) {
        $http({
            url:  link+"data-penyakit",
            method: "GET"
        }).then(function (e) {

            callback(e.data);
        }).catch(function (err) {

        });
    }


    // fungsi memanggil api menyimpan data penyakit

    this.savePenyakit= function (obj,callback) {
        $http({
            url:  link+"save-data-penyakit",
            method: "POST",
            data:obj
        }).then(function (e) {
            callback(e.data);
        }).catch(function (err) {

        });
    }

     // fungsi memanggil api menyimpan data penyakit

     this.savePengobatan= function (obj,callback) {
        $http({
            url:  link+"save-data-pengobatan",
            method: "POST",
            data:obj
        }).then(function (e) {
            callback(e.data);
        }).catch(function (err) {

        });
    }

    this.updatePengobatan= function (obj,callback) {
        $http({
            url:  link+"update-data-pengobatan",
            method: "POST",
            data:obj
        }).then(function (e) {
            callback(e.data);
        }).catch(function (err) {

        });
    }
    this.checkData= function (obj,callback) {
        $http({
            url:  link+"check-data",
            method: "POST",
            data:obj
        }).then(function (e) {
            callback(e.data);
        }).catch(function (err) {

        });
    }


    // fungsi memanggil api mempebarui data penyakit

    this.updatePenyakit= function (obj,callback) {
        $http({
            url:  link+"update-data-penyakit",
            method: "POST",
            data:obj
        }).then(function (e) {

            callback(e.data);
        }).catch(function (err) {

        });
    }


    this.deletePenyakit= function (obj,callback) {
        $http({
            url:  link+"delete-data-penyakit",
            method: "POST",
            data:obj
        }).then(function (e) {

            callback(e.data);
        }).catch(function (err) {

        });
    }

}]);
