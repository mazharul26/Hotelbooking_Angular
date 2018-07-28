
<div class="jumbotron">

    <h1>Our Login</h1>
    <p>...</p>
    <p><a class="btn btn-primary btn-lg" href="" role="button">Learn more</a></p>
</div>

<div class="container" ng-app="LoginApp" ng-controller="LoginCtrl">
    <div class="row">   
        <div class="bs-example">
            <form class="form-horizontal" action="" method="post">
                <div class="form-group">
                    <div class="col-xs-10">
                        <input type="email" class="form-control" id="inputEmail" placeholder="Email" ng-model="email" >
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-xs-10">
                        <input type="password" class="form-control" id="inputPassword" placeholder="Password" ng-model="password">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-xs-offset-2 col-xs-10">
                        <div class="checkbox">
                            <label><input type="checkbox"> Remember me</label>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-xs-offset-2 col-xs-10">
                        <button type="button" class="btn btn-primary" ng-click="login()">Login</button>
                    </div>
                </div>
            </form>
        </div>

    </div>
</div>

