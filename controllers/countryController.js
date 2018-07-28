
var cntApp = angular.module("cntApp", []);
cntApp.controller("cntCtrl", function($scope, $http) {
    $http.post("api/country-view.php", {})
            .then(function(response) {
        $scope.allData = response.data;

    }, function() {
        alert("error");
    });



    /* #######################  Insert Start   ###*/


    $scope.insert = function() {
        var formData = [{nm: $scope.name, email: $scope.email, password: $scope.password}];


        $http.post("api/country_insert.php", formData)
                .then(function(response) {
            if (parseInt(response.data)) {
                alert("save");
                $scope.allData.push({id: response.data, name: $scope.name, email: $scope.email, password: $scope.password});

                $scope.name = "";
                $scope.email = "";
                $scope.password = "";


            } else {
                alert("Already Exist");
            }
        }, function() {
            alert("error");

        })

        return false;
    }


    /* #######################  Insert end   ###*/

    $scope.rahmatullah = function(x) {
        if ($scope.mask.substr(1) == x) {
            $scope.mask = x;
        } else {
            $scope.mask = "-" + x;
        }
    };





})


/*
 
 $scope.mask = 'name';
 $http.post("api/country-view,php", {})
 .then(function (respone) {
 var xyz = response.data;
 var arr = new array();
 for (i = 0; i < xyz.length; i++) {
 arr.pust({
 "id": parseInt(xyz[i]['id']), "name": xyz[i]['name']
 });
 }
 $scope.allData = arr;
 }, function () {
 alert("error");
 });
 
 */
