
var regApp = angular.module("regApp", []);
regApp.controller("regCtrl", function($scope, $http) {
    $http.post("api/registration-view.php", {})
            .then(function(response) {
        $scope.allData = response.data;

    }, function() {
        alert("error");
    });



    /* #######################  Insert Start   ###*/


    var fd = new FormData();
    $scope.upload = function(files) {
        fd.append("picture", files[0]);
    };

    $scope.Insert = function() {

        fd.append("name", $scope.name);
        fd.append("email", $scope.email);
        fd.append("password", $scope.password);
        fd.append("address",$scope.address);
        fd.append("type", $scope.type);
        fd.append("gender", $scope.gender);
        fd.append("contact", $scope.contact);
        fd.append("date", $scope.date);



        $http.post("api/registration_insert.php", fd, {
            withCredentials: true,
            headers: {'Content-Type': undefined},
            transformRequest: angular.identity
        }).then(function(response) {
            alert(response.data);

            if (response.data != 0) {
                 alert("Saved");

//                alert(response.data['id']);
//                alert(response.data['ext']);

/*-----------Data--Push-----hower---code--here------*/


                $scope.allData.push({id:response.data,
                    name: $scope.name,
                    email: $scope.email,
                    password: $scope.password, 
                    address: $scope.address, 
                    type: $scope.type,
                    gender: $scope.gender, 
                    contact: $scope.contact, 
                    date: $scope.date,
                    picture: response.data['ext']});
                
/*-----------empty---field--hower---code--here------*/

                $scope.name = "";
                $scope.email = "";
                $scope.password = "";
                $scope.address = "";
                 $scope.type = "";
                $scope.contact = "";
                $scope.gender = "";
                $scope.date = "";


            } else {
                alert("Already Exist");
            }
        }, function() {
            alert("Pai ny");
        });

    }

    /*---------insert end-------------------*/


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
