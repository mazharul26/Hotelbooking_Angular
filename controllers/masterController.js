

var app = angular.module("mainApp", ['ngRoute', 'LoginApp', 'cntApp', 'regApp', 'empApp', 'catApp', 'payApp', 'roomApp', 'homeApp', 'detailsApp','checkoutApp']);
app.config(function ($routeProvider) {
    $routeProvider
            .when("/", {
                templateUrl: "views/front/home.php"

            })
            .when("/profile", {
                templateUrl: "views/front/profile.php"

            })
             .when("/roomcheckout", {
                templateUrl: "views/front/roomcheckout.php"

            })
             
            .when("/message", {
                templateUrl: "views/front/message.php"

            })
            .when("/product/details/:id", {
                templateUrl: "views/front/details.php"

            })
            .when("/room", {
                templateUrl: "views/front/room.php"

            })
            .when("/login", {
                templateUrl: "views/front/login.php"

            })
            .when("/registration", {
                resolve: {
                    "log-check": function ($location, $rootScope) {
                        if ($rootScope.manus = 0 || $rootScope.type <= 1) {
                            $location.path('/')
                        }
                    }
                },
                templateUrl: "views/front/registration.php"

            })
            .when("/category", {
                templateUrl: "views/front/category.php"

            })
            .when("/payment", {
                templateUrl: "views/front/payment.php"

            })
            .when("/country", {
                templateUrl: "views/front/country.php"
            })


            .when("/employee", {
                resolve: {
                    "log-check": function ($location, $rootScope) {
                        if ($rootScope.manus >= 2 || $rootScope.type >= 2) {
                            $location.path('/employee')
                        }
                    }
                },
                templateUrl: "views/front/employee.php"
            })
            .when("/contact", {
                templateUrl: "views/front/contact.php"
            })


});

app.controller("mainCtrl", function ($scope, $rootScope, $http) {

    $http.post("api/log-check.php", {})
            .then(function (response) {
       
                $rootScope.manus = response.data['id'];
                $rootScope.manus = response.data['type'];

            },
                    function () {
                        alert("error-Login");
                    });
                    
    $scope.logout = function () {
        $http.post("api/logout.php", {})
                .then(function (response) {
                    $rootScope.manus = response.data['id'];
                    $rootScope.type = response.data['type'];
                    $location.path('#!');
                }, function () {
                    alert("error-Logout");
                });
    }
    $http.post("api/cart.php" ,{})
            .then(function(response){
                $rootScope.Cart = response.data;
    },function(){
        alert("Cart-error");
            });
});











// $rootScope.manus = 0;