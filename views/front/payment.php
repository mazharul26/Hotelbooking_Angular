
<div class="jumbotron">

    <h1>Payment Procces</h1>
    <p>...</p>
    <p><a class="btn btn-primary btn-lg" href="" role="button">Learn more</a></p>
</div>

<div class="container" ng-app="payApp" ng-controller="payCtrl">
    <div class="row">   

        <div class="col-sm-6">
            <div class="bs-example">



                <form action="" method="post" name="myform">


                    <div class="form-group">
                        <label for="name">Pay procces:</label>
                        <input type="text" class="form-control"  ng-model="name" required="" name="name">
                        <span style="color:red" ng-show=" myform.name.$error.required">Name is Require</span>
                    </div>
                    
                    <div class="checkbox">
                        <label><input type="checkbox">Remember me</label>
                    </div>
                    <button type="button" ng-disabled=" myform.name.$invalid" class="btn btn-success" ng-click="insert()">Insert</button>
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
                

                    <th>Edit</th>
                    <th>Delete</th>
                </tr>

            </table>



        </div>
    </div>
</div>

