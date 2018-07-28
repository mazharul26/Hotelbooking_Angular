<!-- 
<div class="jumbotron">

  
   <p>...</p>
 <p><a class="btn btn-primary btn-lg" href="#" role="button">Learn more</a></p>
</div>
--->

<br/><br/><br/>  <br/><br/><br/>
<div class="container" ng-app="empApp" ng-controller="empCtrl">
    <div class="row">   

        <div class="col-sm-6">
            <div class="bs-example">

                <h1 style="alignment-baseline: central"> Employee Information</h1><br/><br/>

                <form action="" method="post" name="myform" enctype="multipart/form-data">


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
                        <label>Salary:</label>
                        <input type="text" class="form-control"  ng-model="salary" name="salary" required="" >
                        <span style="color:red" ng-show=" myform.salary.$error.required">Salary is Require</span>
                    </div>

                    <div class="demo-section k-content" style="text-align: center">
                        <label for="data">Joining Date:</label>
                        <input    type="date" class="form-control" id="pwd" ng-model="date" name="date" required="" id="calendar" >


                        <span style="color:red" ng-show=" myform.date.$error.required"> Date is Require</span>
                    </div>

                    <br/>
                    <div class="form-group">
                        <label>Gender</label> <br/><br/>
                        <input type="radio" class=""  ng-model="gender" required="" name="gen" value="1">Male
                        <input type="radio" class=""  ng-model="gender" required="" name="gen" value="2">Female
                        <input type="radio" class=""  ng-model="gender" required="" name="gen" value="3">Common<br/>

                        <span style="color:red" ng-show=" myform.gen.$error.required">Gender is Require</span>
                        <br/><br/>
                    </div>
                    <div class="form-group">
                        <label>Contact:</label>
                        <input type="text" class="form-control"  ng-model="contact"  name="con" required="">
                        <span style="color:red" ng-show=" myform.con.$error.required">Contact is Require</span>
                    </div>

                    <div class="form-group">
                        <label>Picture:</label>
                        <input type="file" ng-model="picture" class="form-control"  onchange="angular.element(this).scope().upload(this.files)" name="picture" >
                        <span style="color:red" ng-show=" myform.picture.$error.required">Picture is upload</span>
                    </div>
                    <div class="checkbox">
                        <label><input type="checkbox"> Remember me</label>
                    </div>
                    <button type="button" class="btn btn-success" ng-click="Insert()" ng-show="button">Insert</button> 
                    <button type="button" class="btn btn-success" ng-click="Update(uid)" ng-show="!button">Update</button> 
                </form> 


            </div>
            <br/><br/><br/>  <br/><br/><br/>
        </div>

        <div class="col-sm-10">

            <table class="table table-striped" style="background-color:#ccccff ">
                <tr>
                    <th ng-click="rahmatullah('id')">ID</th>

                    <th  ng-click="rahmatullah('name')">Name</th>
                    <th>E-mail</th>
                    <th>Salary</th>
                    <th>Date</th>
                    <th>Picture</th>
                    <th>Edit</th>
                    <th>Delete</th>

                </tr> 





                <tr ng-repeat="x in allData| orderBy :mask" style="background-color:#cccc00 ">

                    <th style="">{{x.id}}</th>
                    <th>{{x.name}}</th>
                    <th>{{x.email}}</th>
                    <th>{{x.salary}}</th>
                    <th>{{x.date}}</th>
                    <td><img src="api/images/{{x.id}}.{{x.picture}}" width="100"/></td>
                    <th><button class="btn btn-primary" ng-click="edit(x.id)">Edit</button></th>
                    <th><button class="btn btn-danger" ng-click="delete(x.id)">Delete</button></th>
                </tr>

            </table>



        </div>
    </div>
</div>


