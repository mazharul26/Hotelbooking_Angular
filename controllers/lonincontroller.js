
var LoginApp = angular.module("LoginApp", []);
LoginApp.controller("LoginCtrl", function ($scope, $http, $rootScope, $location) {

    $scope.login = function () {
        var formData = [{nm: $scope.email, ps: $scope.password}];

        $http.post("api/login-log.php", formData)
                .then(function (response) {
           
                    $rootScope.manus = (response.data['id']);
                    $rootScope.manus = (response.data['type']);
                    if(response.data['id'] > 0){
                       $location.path('') 
                    }
                    else{
                    
                    $location.path('login')
                    }
                },
                        function () {
                            alert("error");

                        });
        return false;
    };
    return false;
});


