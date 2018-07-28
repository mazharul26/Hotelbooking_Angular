



<div class="about" ng-app="detailsApp" ng-controller="detailsCtrl">
    <div class="container">
        <div class="col-sm-6">
            <h1 style="color: #ffcc00">{{selPdt.code}}</h1>
            <br/>
            <h4>{{selPdt.description}}</h4>
            <br/><br/>
            <img src="api/images1/{{selPdt.id}}.{{selPdt.picture}}" class="img-responsive" width="300"/>

            <br/><br/>


            <br/>

            <img src="api/images2/{{selPdt.id}}.{{selPdt.picture1}}" class="img-responsive" width="300"/>

            <br/><br/>
            <h4> $  {{selPdt.price}}</h4>

            <h4>Discount only one day $  {{selPdt.discount}}</h4>
            <br/><br/>

            <form method="post">

<!--                <input type="text" ng-model="qty"/><br/><br/>-->
                <input type="button" class="btn btn-success" value="Room Booking" ng-click="add_to_cart(selPdt.id)"/>

            </form>
            <p>{{selPdt.details}}</p> 


        </div>




    </div>
</div>
