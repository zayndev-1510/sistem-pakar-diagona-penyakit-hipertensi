app.service("service", ["$http", function ($http) {
    var link="http://localhost:8000/api/admin/"

    this.saveAlumni = function (obj, callback) {
        $http({
            url: link + "insert-data-alumni",
            method: "POST",
            data: obj
        }).then(function (e) {

            callback(e.data);
        }).catch(function (err) {

        });
    }

   

    this.dataAkademik= function (callback) {
        $http({
            url:  link+"data-tahun",
            method: "GET"
        }).then(function (e) {

            callback(e.data);
        }).catch(function (err) {

        });
    }

    this.updateSiswa = function (obj, callback) {
        $http({
            url: link + "update-siswa",
            method: "POST",
            data: obj
        }).then(function (e) {

            callback(e.data);
        }).catch(function (err) {

        });
    }
    this.deleteAlumni = function (id, callback) {
        $http({
            url: link + "delete-data-alumni/"+id,
            method: "GET",
        }).then(function (e) {

            callback(e.data);
        }).catch(function (err) {

        });
    }
    this.dataSiswa= function (callback) {
        $http({
            url:  link+"data-siswa",
            method: "GET"
        }).then(function (e) {

            callback(e.data);
        }).catch(function (err) {

        });
    }
    this.dataAlumni= function (callback) {
        $http({
            url:  link+"get-data-alumni",
            method: "GET"
        }).then(function (e) {

            callback(e.data);
        }).catch(function (err) {

        });
    }
}]);
