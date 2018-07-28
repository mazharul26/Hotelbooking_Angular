
var catApp = angular.module("catApp", []);
catApp.controller("catCtrl", function ($scope, $http) {

    $scope.button = 1;



    /* #######################  category--view---Start   ###*/
    $http.post("api/category-view.php", {})
            .then(function (response) {
                $scope.allData = response.data;

            }, function () {
                alert("wrong");
            });






    /* #######################----category--view---end---###*/



    /* #######################----category--edit---start---###*/

    $scope.edit = function (id) {
        $scope.button = 0;
        $scope.uid = id;
        var formData = [{id: id}];
        $http.post("api/category-edit.php", formData)
                .then(function (response) {
                    $scope.name = response.data['name'];
                }, function () {
                    alert("mistake");



                })
    }


    /* #######################----category--update---start---###*/

    $scope.Update = function (id) {
        var formData = [{id: id, nm: $scope.name}];
        $http.post("api/category-update.php", formData)
                .then(function (response) {
                    
                      
                    if (parseInt(response.data)) {
                         alert("update ok")
                     
                      for (i = 0; i < $scope.allData.length; i++) {
                           if ($scope.allData[i]['id'] == id) {
                              $scope.allData.splice(i, 1);
                               break;
                            }
                       }
                       // more field name add here .now i have no field then go to next step.
                       
                       $scope.allData.push({id: id, name: $scope.name});
                       $scope.button = 1;
                       $scope.name = "";
                    } else {
                        alert("Problem");
                    }
                }, function () {
                    alert("Parina");
                });
    }






    /* #######################----category--update---end---###*/



    /* #######################----category--edit---end---###*/











    /* #######################  Insert Start   ###*/


    $scope.insert = function () {
        var formData = [{nm: $scope.name}];


        $http.post("api/category_insert.php", formData)
                .then(function (response) {
                    if (parseInt(response.data)) {
                        alert("save");
                        $scope.allData.push({id: response.data, name: $scope.name});

                        $scope.name = "";


                    } else {
                        alert("Already Exist");
                    }
                }, function () {
                    alert("Matha beth kore");

                })

        return false;
    }


    /* #######################  Insert end   ###*/



    /* #######################  categury---delete--start--###*/

    $scope.delete = function (id) {
        var formData = [{id: id}];
        $http.post("api/category-delete.php", formData)
                .then(function (response) {
                print_r(response.data);   
        $scope. print_r(response.data);   
        
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


    /* #######################  categury---delete--end--###*/


})







