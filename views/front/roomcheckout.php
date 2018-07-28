

<section class="tm-section" ng-app="checkoutApp" ng-controller="checkoutCtrl">


    <div class="container-fluid">
        <div class="row">
            <br/>
            <div class="col-sm-12 tm-contact-right">
                <a href="#!" class="btn btn-primary btn-lg">Continue Booking</a>
                <table class="table table-striped">
                    <tr>  
                        <th>id</th>
                        <th>Title</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Subtotal</th>
                        <th>Picture</th>
                        <th>Update</th>
                        <th>Delete</th>
                    </tr>
                    <tr ng-repeat="x in allCheckout">
                        <td>{{x.id}}</td>
                        <td>{{x.code}}</td>
                        <td>${{x.price}}</td>
                        <td>{{x.qty}}</td>
                        <td>${{x.price * x.qty}}</td>
                        <td><img src="api/images1/{{x.id}}.{{x.picture}}" width="100" /></td>
                        <td>                            
                            <button class="btn btn-primary" ng-click="edit(x.id)">Update</button>
                        </td>
                        <td><button class="btn btn-danger" ng-click="delete(x.id)">Delete</button></td>
                    </tr>
                    <br/>
                    <tr style="background-color:#ccffcc "><td></td>
                        <td></td>
                        <td><h1>Total </h1></td>
                        <td><h1> Amount:</h1></td>
                        <td><h2>  $ {{totalprice}}</h2></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                </table>

            </div>

        </div>

    </div>


</div>

<br/><br/>
<br/><br/>
<!--<div class="container" ng-app="payApp" ng-controller="payCtrl"></div>-->
<div class="container">
<div class="row">
    <div class="col-sm-12">
        
        <form method="post" name="myform">
            <div class="col-sm-6">
                <div class="form-group">
                   <label for="check-in">Check In</label> <!-- <input type="textfield" class="form-control" id="check-in" placeholder="12.20.2014"> -->
                    <input type="date" ng-model="start" class="form-control" id="start" name="start" placeholder="yyyy/mm/dd">
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                   <label for="check-out">Check Out</label> <!-- <input type="textfield" class="form-control" id="check-out" placeholder="12.27.2014"> -->
                    <input type="date" ng-model="end" class="form-control" id="end" name="end" placeholder="yyyy/mm/dd" >
                </div>

            </div>


            <div class="form-group">
                <label for="name">Name address:</label>
                <input type="text" class="form-control" id="name" ng-model="name" name="name"  required="" >
                <span style="color:red" ng-show=" myform.name.$error.required">Name is Require</span>
            </div>
            <div class="form-group">
                <label for="email">Email address:</label>
                <input type="email" class="form-control" id="email" ng-model="email" name="mail" required="" >
                <span style="color:red" ng-show=" myform.mail.$error.required">E-mail is Require</span>
            </div>     
            <div class="form-group">
                <label for="password">Contact:</label>
                <input type="text" class="form-control" id="contact" ng-model="contact" name="contact" required="" >
                <span style="color:red" ng-show=" myform.contact.$error.required">contact is Require</span>
            </div>
            <div class="form-group">
                <label for="password">Total Amount:</label>
                <input type="text" class="form-control" id="password" ng-model="total" name="total" required="" >
                <span style="color:red" ng-show=" myform.total.$error.required">total is Require</span>
            </div>
            <label for="check-out">Payment</label>
            <input type="text" class="form-control" id="password" ng-model="payment" name="payment" required="" >

            <span style="color:red" ng-show=" myform.payment.$error.required">payment is Require</span>

<!--                <select name="payment" ng-model="payment_id" required="">
    <option value="0">Select-item</option>
      <option value="1">Select-item</option>
        <option value="2">Select-item</option>
          <option value="3">Select-item</option>
    <option ng-repeat="help in selPmt|orderBy:name" value="{{help.id}}">{{help.name}}</option>

</select> -->

            <br/><br/>
            <input type="button" name="sub" value="Booking-Confirm" class="btn btn-success" ng-click="Insert()"/>
        </form>

    </div>
</div>
</div>
</section>
