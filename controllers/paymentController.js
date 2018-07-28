var payApp = angular.module("payApp", []);

payApp.controller("payCtrl", function ($scope, $http) {

    $scope.mask = 'name';
    $http.post("api/payment-view.php", {})
            .then(function (response) {
                var xyz = response.data;
                var arr = new Array();
                for (i = 0; i < xyz.length; i++) {
                    arr.push({"id": parseInt(xyz[i]['id']), "name": xyz[i]['name']});
                }                
                $scope.allData = arr;
            }, function () {
                alert("error");
            });


    /* ############  Insert Start ################ */
    $scope.insert = function () {
        var formData = [
            {nm: $scope.name}
        ];

        $http.post("api/payment_insert.php", formData)
                .then(function (response) {
                    if (parseInt(response.data)) {
                        alert("Saved");
                        $scope.allData.push({id: response.data, name: $scope.name});
                        $scope.name = "";
                    } else {
                        alert("Already Exist");
                    }
                }, function () {
                    alert("error");
                });
        return false;
    };
    /* ############  Insert End ################ */


    $scope.rahmatullah = function (x) {
        if ($scope.mask.substr(1) == x) {
            $scope.mask = x;
        } else {
            $scope.mask = "-" + x;
        }
    };

});
