<div class="jumbotron">
    <h1>Our Profile</h1>
  
    <p><a class="btn btn-primary btn-lg" href="#" role="button">Learn more</a></p>
</div>







     <form ng-app="" ng-controller="" 
name="myForm" novalidate>

<p>Name:<br>
<input type="text" name="name" ng-model="name" required>
<span style="color:red" ng-show="myForm.name.$dirty && myForm.name.$invalid">
<span ng-show="myForm.name.$error.required">Username is required.</span>
</span>
</p>

<p>Email:<br>
<input type="email" name="email" ng-model="email" required>
<span style="color:red" ng-show="myForm.email.$dirty && myForm.email.$invalid">
<span ng-show="myForm.email.$error.required">Email is required.</span>
<span ng-show="myForm.email.$error.email">Invalid email address.</span>
</span>
</p>

<p>
<input type="submit"
ng-disabled="myForm.name.$dirty && myForm.name.$invalid ||  
myForm.email.$dirty && myForm.email.$invalid">
</p>

</form>