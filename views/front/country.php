
<div class="jumbotron">

    <h1>Our Country</h1>
    <p>...</p>
    <p><a class="btn btn-primary btn-lg" href="" role="button">Learn more</a></p>
</div>

<div class="container" ng-app="cntApp" ng-controller="cntCtrl">
    <div class="row">   

        <div class="col-sm-4">
            <div class="bs-example">



                <form action="" method="post" name="myform">


                    <div class="form-group">
                        <label for="email">Name address:</label>
                        <input type="text" class="form-control" id="name" ng-model="name" required="" name="name">
                        <span style="color:red" ng-show=" myform.name.$error.required">Name is Require</span>
                    </div>
                    <div class="form-group">
                        <label for="email">Email address:</label>
                        <input type="email" class="form-control" id="email" ng-model="email" required="" name="mail">
                        <span style="color:red" ng-show=" myform.mail.$error.required">E-mail is Require</span>
                    </div>
                    <div class="form-group">
                        <label for="pwd">Password:</label>
                        <input type="password" class="form-control" id="pwd" ng-model="password" required="" name="pass">
                        <span style="color:red" ng-show=" myform.pass.$error.required">Password is Require</span>
                    </div>
                    <div class="checkbox">
                        <label><input type="checkbox"> Remember me</label>
                    </div>
                    <button type="button" ng-disabled=" myform.name.$invalid || myform.mail.$invalid || myform.pass.$invalid" class="btn btn-success" ng-click="insert()">Insert</button>
                </form> 


            </div>
        </div>
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



        </div>
    </div>
</div>

