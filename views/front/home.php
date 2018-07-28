


<div class="about" ng-app="homeApp" ng-controller="homeCtrl">
    <div class="container">
        <div class="row">
            <br/><br/>
            <input type="search" ng-model="search" />
            <input type="submit" ng-model="search" value="Search"/>
            <br/><br/> 

            <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                <!-- Button -->
                <li class="nav-item">
                    <span id="pills-home-tab" class="btn btn-success" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true" ng-click="reload_product('')">All</span>
                </li>
                <li ng-repeat="x in allCat" class="nav-item">
                    <span  id="pills-home-tab" class="btn btn-success" data-toggle="pill" href="#pills-home{{x.id}}" role="tab" aria-controls="pills-home" aria-selected="true" ng-click="reload_product(x.id)">{{x.name}}</span>
                </li>
            </ul>

        </div>
    </div>
    <div class="container">
        <div class="w3ls-heading">
            <h2>welcome</h2>
        </div>
        <br/><br/>

        <br/><br/>
        <div class="" ng-repeat=" x in allRoom|filter:{category_id:myfilter}:myvalue |filter:{code:search}">
            <div class="col-sm-6">
                <div class="tmp_picture">

                    <img src="api/images1/{{x.id}}.{{x.picture}}" class="img-responsive"/>
                    <br/><br/>
                    <h4>{{x.code}}</h4>
                    <br/>

                </div>

                <div class="w3l-button">

                    <h4 style="color: #ff9999 ; background-color: #000033">Only one day <br/>$  {{x.price}}</h4>
                    <br/>
                    <a href="#!product/details/{{x.id}}"  class="btn btn-danger">Details</a>

                </div>
            </div>



            <div class="clearfix"> </div>
        </div>
    </div>
</div>
