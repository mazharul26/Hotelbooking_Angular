

var detailsApp = angular.module("detailsApp", []);

detailsApp.controller("detailsCtrl", function ($scope, $http, $routeParams,$rootScope) {
//    alert('details');
    $scope.qty = 1;
    var ids = $routeParams['id'];
    var formData = [{id: ids}];
    
    

    
    
    
//    alert(ids);
    /* details of product */
    $http.post("api/details-api.php", formData)
            .then(function (response) {
                $scope.selPdt = response.data;
//                alert($scope.selPdt.code);
            }, function () {
                alert("details error");
            });

    $http.post("api/cart-status.php", formData)
            .then(function (response) {
                $scope.qty = response.data;
            }, function () {
                alert("cart-status- error");
            });




     $scope.add_to_cart = function (id) {
        if ($scope.qty > 0) {
            var formData = [
                {id: id, qty: $scope.qty}
            ];
            $http.post("api/add_to_cart.php", formData)
                    .then(function (response) {
                        if(parseInt(response.data) > 0){
                            $rootscope.Cart=response.data;
                    alert("Cart added");
                        }else{
                            alert("Cart update--new");  
                        }
                    }, function () {
                        alert("add-cart-error");
                    });
            return false;        
        } else {
            alert("Booking Room");
        }
    }
});


   