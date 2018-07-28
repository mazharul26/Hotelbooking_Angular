var checkoutApp = angular.module("checkoutApp", []);
checkoutApp.controller("checkoutCtrl", function($scope, $http, $rootScope) {


    //alert('Checkout Ctrl Worked');


    $scope.Answers = {};
    $scope.totalprice = 0;
    $http.post("api/room_chech_out.php", {})
            .then(function(response) {

//                alert(response.data);
        $scope.allCheckout = response.data;
        $scope.totalprice = 0;
        for (i = 0; i < $scope.allCheckout.length; i++) {
            $scope.totalprice += (Number($scope.allCheckout[i]['price']) * Number($scope.allCheckout[i]['qty']));
        }

    }, function() {
        alert("checkout--problem");
    });

 $scope.Insert = function () {
        var formData = [
                {name: $scope.name, email: $scope.email, contact: $scope.contact, payment: $scope.payment,total: $scope.total,start:$scope.start,end:$scope.end}
            ];


            $http.post("api/booking_insert.php", formData)
                    .then(function (response) {
                        alert(response.data);
                        $scope.allCheckout = "";
                        $rootScope.Cart = $scope.allCheckout.length;
                    }, function () {
                        alert("error")
                    });

       
    }

//------------Delete start-----

    $scope.delete = function(id) {
        var formData = [
            {id: id}
        ];
        $http.post("api/cart-delete.php", formData)
                .then(function(response) {

            $scope.allCheckout.splice(parseInt(response.data), 1);
            $rootScope.Cart = $scope.allCheckout.length;
            $scope.totalprice = 0;
            for (i = 0; i < $scope.allCheckout.length; i++) {

                $scope.totalprice += (Number($scope.allCheckout[i]['price']) * Number($scope.allCheckout[i]['qty']))
            }
            $scope.totalprice = Math.round($scope.totalprice);
        }, function() {
            alert("cart-delete-problem");
        });
    }

});

//var payApp = angular.module("payApp", []);
//payApp.controller("payCtrl", function($scope, $http, $rootScope) {
//
//
//    $http.post("api/payment-view.php", {})
//
//            .then(function(response) {
//        $scope.selPmt = response.data;
////                alert($scope.selPdt.code);
//    }, function() {
//        alert("Pay error");
//    });
//
//
//
//
//    $scope.Insert = function() {
//        alert($scope.name);
//        fd.append("name", $scope.name);
//        fd.append("email", $scope.email);
//        fd.append("contact", $scope.contact);
//        fd.append("payment_id", $scope.payment_id);
//        fd.append("total", $scope.total);
//        fd.append("start", $scope.start);
//        fd.append("end", $scope.end);
//
//        $http.post("api/booking_insert.php", fd, {            
//            withCredentials: true,
//            headers: {'Content-Type': undefined},
//            transformRequest: angular.identity
//        }).then(function(response) {
//            alert(response.data);
//        }, function() {
//            alert("Booking error");
//        })
//    }
//});