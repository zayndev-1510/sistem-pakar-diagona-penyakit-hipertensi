app.service("service", ["$http", function ($http) {
    var link="http://localhost:8000/api/admin/"

    // fungsi memanggil api data pasien
    this.dataPasien= function (callback) {
        $http({
            url:  link+"data-pasien",
            method: "GET"
        }).then(function (e) {

            callback(e.data);
        }).catch(function (err) {

        });
    }
    this.hapusPasien= function (obj,callback) {
        $http({
            url:  link+"hapus-pasien",
            method: "POST",
            data:obj
        }).then(function (e) {

            callback(e.data);
        }).catch(function (err) {

        });
    }
}]);
