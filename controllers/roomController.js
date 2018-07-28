
var roomApp = angular.module("roomApp", []);
roomApp.controller("roomCtrl", function ($scope, $http) {


    $scope.button = 1;
    /*--------room table load-or -view--here------->*/
 $http.post("api/room-view.php", {})
            .then(function (response) {
                $scope.allRoom = response.data;
            }, function () {
                alert(" Room View hoe ni")
            });




    /*--------Catagory table load---here------->*/
    $http.post("api/category-view.php", {})
            .then(function (response) {
                $scope.allData = response.data;
            }, function () {
                alert(" Category View hoe ni")
            });
    /*--------Catagory table load---here------->*/





    /*--------Room table insert---here------->*/
    
    
    
    
    
    
    
    
    
    

    var fd = new FormData();
    $scope.upload = function (files) {
        fd.append("picture", files[0]);
    };

    $scope.Insert = function () {

        fd.append("code", $scope.code);
        fd.append("description", $scope.description);
        fd.append("adult", $scope.adult);
        fd.append("child", $scope.child);
        fd.append("catid", $scope.catid);
        fd.append("price", $scope.price);
        fd.append("discount",$scope.discount);
        fd.append("vat", $scope.vat);
        fd.append("size", $scope.size);
       

        $http.post("api/room-insert.php", fd, {
            withCredentials: true,
            headers: {'Content-Type': undefined},
            transformRequest: angular.identity
        }).then(function (response) {
            alert(response.data);

            if (response.data != 0) {

                alert("Saved");





                $scope.allData.push({id: response.data,
                    code: $scope.code,
                    description: $scope.description,
                    salary: $scope.salary,
                    date: $scope.date,
                    gender: $scope.gender,
                    contact: $scope.contact,
                    picture:response.data['ext']
                });
                
                $scope.name = "";
                $scope.email = "";
                $scope.salary = "";
                $scope.date = "";
                $scope.contact = "";
                $scope.gender = "";
            } else {
                alert("Already Exist");
            }
        }, function () {
            alert("error");
        });

    }


})