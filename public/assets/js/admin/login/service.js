app.service("service", ["$http", function ($http) {
    var link="http://localhost:8000/api/admin/"

    // fungsi memanggil api login
    this.loginAdmin= function (obj,callback) {
        $http({
            url:  link+"loginAdmin",
            method: "POST",
            data:obj
        }).then(function (e) {
            callback(e.data);
        }).catch(function (err) {

        });
    }





}]);
