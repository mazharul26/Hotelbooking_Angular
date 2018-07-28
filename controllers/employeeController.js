var empApp = angular.module("empApp", []);
empApp.controller("empCtrl", function ($scope, $http) {

    //alert("ok")
    $scope.button = 1;


    /*---------view start-------------------*/

    $http.post("api/employee-view.php", {})
            .then(function (response) {
                $scope.allData = response.data;
            }, function () {
                alert("error")
            })

//
//
//  $scope.mask = 'name';
//    $http.post("api/employee-view,php", {})
//            .then(function(respone) {
//        var xyz = response.data;
//        var arr = new array();
//        for (i = 0; i < xyz.length; i++) {
//            arr.pust({
//                "id": parseInt(xyz[i]['id']), "name": xyz[i]['name']
//            });
//        }
//        $scope.allData = arr;
//    }, function() {
//        alert("error");
//    });

    /*---------view end-------------------*/


//<!-------Insert ---start------------==========--->

    var fd = new FormData();
    $scope.upload = function (files) {
        fd.append("picture", files[0]);
    };

    $scope.Insert = function () {

        fd.append("name", $scope.name);
        fd.append("email", $scope.email);
        fd.append("salary", $scope.salary);
        fd.append("date", $scope.date);
        fd.append("gender", $scope.gender);
        fd.append("contact", $scope.contact);




        $http.post("api/employee-insert.php", fd, {
            withCredentials: true,
            headers: {'Content-Type': undefined},
            transformRequest: angular.identity
        }).then(function (response) {
            alert(response.data);
            
            if (response.data != 0) {

                alert("Saved");
                $scope.allData.push({id: response.data,
                    name: $scope.name,
                    email: $scope.email,
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
//,picture:response.data['ext']
    /*---------insert end-------------------*/


//<!----====================Employee---edit---start-------============------>

    $scope.edit = function (id) {

        $scope.button = 0;
        $scope.uid = id;
        var formData = [{id: id}];

        $http.post("api/employee-edit.php", formData)
                .then(function (response) {
                    $scope.name = response.data['name'];
                    $scope.email = response.data['email'];
                    $scope.salary = response.data['salary'];
                    $scope.date = response.data['date'];
                    $scope.gender = response.data['gender'];
                    $scope.contact = response.data['contact'];
                }, function () {
                    alert("Missing SomeThing")

                });

    }





//<!----====================Employee---edit---end-------============------>



//<!----====================Employee---update---start-------============------>

    $scope.Update = function (id) {
        fd.append("id", id);
        fd.append("name", $scope.name);
        fd.append("email", $scope.email);
        fd.append("salary", $scope.salary);
        fd.append("date", $scope.date);
        fd.append("gender", $scope.gender);
        fd.append("contact", $scope.contact);



        $http.post("api/employee-update.php", fd, {
            withCredentials: true,
            headers: {'Content-Type': undefined},
            transformRequest: angular.identity
        })
                .then(function (response) {
                    alert(response.data);
                    if (parseInt(response.data)) {
                        alert("Successful");
                    } else {
                        alert("Already Ase");
                    }
                }, function () {
                    alert("Paini");
                });
    }






//<!----====================Employee---update---end-------============------>


//<!----====================Employee---Delete---start-------============------>


    $scope.delete = function (id) {
        var formData = [{id: id}];
        $http.post("api/employee-delete.php", formData)
                .then(function (response) {
                    if (parseInt(response.data)) {
                        for (i = 0; i < $scope.allData.length; i++) {
                            if ($scope.allData[i]['id'] == id) {
                                $scope.allData.splice(i, 1);

                                break;
                            }
                        }

                    } else {
                        alert("rahmatullah")
                    }
                }, function () {
                    alert("error");
                })
    }


//<!----====================Employee---Delete---end-------============------>

})



