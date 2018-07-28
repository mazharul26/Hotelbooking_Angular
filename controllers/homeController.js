

var homeApp = angular.module("homeApp", []);
homeApp.controller("homeCtrl", function ($scope, $http) {


    $http.post("api/home-view.php", {})
            .then(function (response) {
                $scope.allRoom = response.data;
        $scope.mazharulIslam =$scope.allRoom.length;
            }, function () {
                alert("ErrorHome")
            })

    $http.post("api/home-category-view.php", {})
            .then(function (response) {
                $scope.allCat = response.data;
            }, function () {
                alert("Category-Error");
            })
    $scope.myfilter = '';
    $scope.myvalue = false;
    $scope.reload_product = function (x) {
        $scope.myfilter = x;
        if (x == '') {
            $scope.myvalue = false;
            $scope.mazharulIslam = $scope.allRoom.length;
        } else {
            $scope.myvalue = true;
            var count = 0;
            for (i = 0; i < $scope.allRoom.length; i++) {
                if ($scope.allPdt[i]['category_id'] == x) {
                    count++;
                }
            }
            $scope.mazharulIslam = count;
        }
    }

    $scope.pageChanged = function () {
        var startPos = ($scope.page - 1) * 2;
        console.log($scope.page);
    }
});