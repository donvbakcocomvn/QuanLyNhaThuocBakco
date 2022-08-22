app.controller("AppDanhSachSP", function ($scope, $http) {
    $scope.more  = false;
    var _Status = window.sessionStorage.getItem("_Status");
    if (_Status) {
        $scope.more = JSON.parse(_Status);
    }
    $scope.SaveStatus = function (more) {
        window.sessionStorage.setItem("_Status", JSON.stringify(more));
    };

});

