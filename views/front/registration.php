<!-- 
<div class="jumbotron">

  
   <p>...</p>
 <p><a class="btn btn-primary btn-lg" href="#" role="button">Learn more</a></p>
</div>
--->

<br/><br/><br/>  <br/><br/><br/>
<div class="container" ng-app="regApp" ng-controller="regCtrl">
    <div class="row">   

        <div class="col-sm-8">
            <div class="bs-example">

                <h1 style="alignment-baseline: central"> Registration</h1><br/><br/>

                <form action="" method="post" name="myform">


                    <div class="form-group">
                        <label for="email">Name address:</label>
                        <input type="text" class="form-control" id="name" ng-model="name" required name="name">
                        <span style="color:red" ng-show=" myform.name.$error.required">Name is Require</span>
                    </div>
                    <div class="form-group">
                        <label for="email">Email address:</label>
                        <input type="email" class="form-control" id="email" ng-model="email" required name="email">
                        <span style="color:red" ng-show=" myform.email.$error.required">E-mail is Require</span>
                    </div>
                    <div class="form-group">
                        <label >Password:</label>
                        <input type="password" class="form-control" id="pwd" ng-model="password" required name="password">
                        <span style="color:red" ng-show=" myform.password.$error.required">Password is Require</span>
                    </div>
                    <div class="form-group">
                        <label for="pwd">Address:</label>
                        <textarea    type="text" class="form-control" id="pwd" ng-model="address" required name="address">
                        
                        </textarea>
                        <span style="color:red" ng-show=" myform.add.$error.required">Address is Require</span>
                    </div>

                    <br/>
                      <div class="form-group">
                        <label >Type:</label>
                        <textarea    type="text" class="form-control" id="pwd" ng-model="type" required name="type">
                        
                        </textarea>
                        <span style="color:red" ng-show=" myform.type.$error.required">Type is Require</span>
                    </div>
                    <div class="form-group">
                        <label>Gender</label> <br/><br/>
                        <input type="radio" class=""  ng-model="gender" required name="gender" value="1">Male
                        <input type="radio" class=""  ng-model="gender" required name="gender" value="2">Female
                        <input type="radio" class=""  ng-model="gender" required name="gender" value="3">Common<br/>
                        <br/><br/>
                        <span style="color:red" ng-show=" myform.gender.$error.required">Gender is Require</span>
                    </div>
                    <div class="form-group">
                        <label for="pwd">Contact:</label>
                        <input type="text" class="form-control"  ng-model="contact" required name="contact">
                        <span style="color:red" ng-show=" myform.contact.$error.required">Contact is Require</span>
                    </div>
                    <div class="form-group">
                        <label for="pwd">Date of Birth:</label>
                        <input type="date" class="form-control"  ng-model="date" required name="date">
                    
                        <span style="color:red" ng-show=" myform.date.$error.required">Date is Require</span>
                    </div>
                      <div class="form-group">
                        <label for="pwd">Picture:</label>
                        <input type="file" class="form-control"  ng-model="picture" required name="picture">
                        <span style="color:red" ng-show=" myform.picture.$error.required">picture is upload</span>
                    </div>
                    <div class="checkbox">
                        <label><input type="checkbox"> Remember me</label>
                    </div>
                    <button type="button" class="btn btn-success" ng-click="Insert()">Insert</button>
                </form> 


            </div>
            
            <!----<script><h2>{{newdate.date| date:MM dd,yyyy}}</h2></script> --->
            
            
            
            
            
            <br/><br/><br/>  <br/><br/><br/>
        </div>
<!--
        <div class="col-sm-8">

            <table class="table table-striped">
                <tr>
                    <th ng-click="rahmatullah('id')">ID</th>

                    <th  ng-click="rahmatullah('name')">Name</th>
                    <th>E-mail</th>
                    <th>Edit</th>
                    <th>Delete</th>

                </tr> 





                <tr ng-repeat="x in allData| orderBy :mask">

                    <th>{{x.id}}</th>
                    <th>{{x.name}}</th>
                    <th>{{x.email}}</th>

                    <th>Edit</th>
                    <th>Delete</th>
                </tr>

            </table>



        </div>-->
    </div>
</div>

