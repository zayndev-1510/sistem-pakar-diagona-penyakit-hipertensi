app.service("service", ["$http", function ($http) {
    // fungsi memanggil api login
    this.loginAdmin= function (obj,callback) {
        $http({
            url:  url+"loginAdmin",
            method: "POST",
            data:obj
        }).then(function (e) {
            callback(e.data);
        }).catch(function (err) {

        });
    }





}]);
