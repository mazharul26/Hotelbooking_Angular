
<div class="jumbotron">

    <h1>Our Category</h1>
    <p>...</p>
    <p><a class="btn btn-primary btn-lg" href="" role="button">Learn more</a></p>
</div>

<div class="container" ng-app="catApp" ng-controller="catCtrl">
    <div class="row">   

        <div class="col-sm-6">
            <div class="bs-example">



                <form action="" method="post" name="myform">


                    <div class="form-group">
                        <label for="name">Category Name:</label>
                        <input type="text" class="form-control" id="name" ng-model="name" required="" name="name">
                        <span style="color:red" ng-show=" myform.name.$error.required">Name is Require</span>
                    </div>
                    
                    <div class="checkbox">
                        <label><input type="checkbox"> Remember me</label>
                    </div>
                    <button type="button" ng-disabled=" myform.name.$invalid" class="btn btn-success" ng-click="insert()" ng-show="button">Insert</button>
                     <button type="button" ng-disabled=" myform.name.$invalid" class="btn btn-success" ng-click="Update(uid)" ng-show="!button">Update</button>
                </form> 


            </div>
        </div>
        <div class="col-sm-6">

            <table class="table table-striped">
                <tr>
                    <th ng-click="rahmatullah('id')">ID</th>

                    <th  ng-click="rahmatullah('name')">Name</th>
             
                    <th>Edit</th>
                    <th>Delete</th>

                </tr> 





                <tr ng-repeat="x in allData| orderBy :mask">

                    <th>{{x.id}}</th>
                    <th>{{x.name}}</th>
                

                    <th><button class="btn btn-primary" ng-click="edit(x.id)">Edit</button></th>
                    <th><button class="btn btn-danger" ng-click="delete(x.id)">Delete</button></th>
                </tr>

            </table>



        </div>
    </div>
</div>

