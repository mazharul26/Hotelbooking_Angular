

<br/><br/><br/>  <br/><br/><br/>
<div class="container" ng-app="roomApp" ng-controller="roomCtrl">
    <div class="row">   

        <div class="col-sm-6">
            <div class="bs-example">

                <h1 style="alignment-baseline: central"> Room Information</h1><br/><br/>

                <form action="" method="post" name="myform" enctype="multipart/form-data">


                    <div class="form-group">
                        <label>Room No</label>
                        <input type="text" class="form-control" id="code" ng-model="code" name="code"  required="" >
                        <span style="color:red" ng-show=" myform.code.$error.required">Code is Require</span>
                    </div>
                    <div class="form-group">
                        <label>Description :</label>
                        <textarea type="text" class="form-control"  ng-model="description" name="description " required="" >
                        <span style="color:red" ng-show=" myform.description.$error.required">Description  is Require</span>
                        </textarea>
                    </div>
                    <div class="form-group">
                        <label>Adult:</label>
                        
                        
                        <input type="number" class="form-control"  ng-model="adult" name="adult " required="" >
                        
                        <span style="color:red" ng-show=" myform.adult.$error.required">Adult is Require</span>
                        
                    </div>
                    <div class="form-group">
                        
                        <label>Child :</label>
                        
                        
                        <input type="number" class="form-control"  ng-model="child" name="child" required="" >
                        
                        <span style="color:red" ng-show=" myform.child.$error.required">Child is Require</span>
                    </div>





                    <div class="form-group">
                        
                        <label for="data">Category</label>

                        <select class="form-control" ng-model="catid" name="category">
                            
                            
                            <option value="0">Select Category</option> 
                            
                            
                            <option ng-repeat="cat in allData|orderBy:name" value="{{cat.id}}">{{cat.name}}</option>

                        </select>


                        <span style="color:red" ng-show=" myform.category.$error.required"> Date is Require</span>
                    </div>

                    <br/>




                    <div class="form-group">
                        <label >Price</label>
                        <input    type="text" class="form-control" id="pwd" ng-model="price" name="price" required="" >


                        <span style="color:red" ng-show=" myform.price.$error.required"> Price is Require</span>
                    </div>

                    <br/>
                    <div class="form-group">
                        
                        <label >Discount </label>
                        
                        
                        <input type="text" class="form-control" ng-model="discount" name="discount" required="" >


                        <span style="color:red" ng-show=" myform.discount.$error.required">discount is Require</span>
                    </div>

                    <br/>
                    <div class="form-group">
                        
                        
                        
                        <label >Vat</label>
                        
                        
                        <input type="text" class="form-control" id="pwd" ng-model="vat" name="vat" required="" >


                        <span style="color:red" ng-show=" myform.vat.$error.required">Vat  is Require</span>
                    </div>




                    <div class="form-group">
                        
                        <label>size :</label>
                        
                        
                        <input type="text" class="form-control"  ng-model="size"  name="size" required="">
                        
                        
                        <span style="color:red" ng-show=" myform.size.$error.required">Size  is Require</span>
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
                  
                </form> 


            </div>
            <br/><br/><br/>  <br/><br/><br/>
        </div>

<!--        <div class="col-sm-10">

            <table class="table table-striped" >
                <tr style="background-color:#ccccff " >
                    <th ng-click="rahmatullah('id')">ID</th>

                    <th  ng-click="rahmatullah('code')">Code</th>
                    <th>Description</th>
                    <th>No Adult</th>
                    <th>No Child</th>
                    <th>Room Pic</th>
                    <th>Edit</th>
                    <th>Delete</th>

                </tr> 





                <tr ng-repeat="room in allRoom| orderBy :mask" style="background-color:#cccc00; color: #00ff99">

                    <th style="">{{room.id}}</th>
                    <th>{{room.code}}</th>
                    <th>{{room.description }}</th>
                    <th>{{room.adult}}</th>
                      <th>{{room.child}}</th>
                    <td><img src="api/images1/{{room.id}}.{{room.picture}}" width="100"/></td>
                    <th><button class="btn btn-primary" ng-click="edit(room.id)">Edit</button></th>
                    <th><button class="btn btn-danger" ng-click="delete(room.id)">Delete</button></th>
                </tr>

            </table>



        </div>
        -->
        
    </div>
</div>



