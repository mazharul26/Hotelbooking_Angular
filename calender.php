

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
<link href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css" rel="stylesheet">
<link href="calendar.css" rel="stylesheet">

<script>
$( document ).ready(function() {
$( function() {
  var dateToday = new Date();
  var dates = $("#start-date, #end-date").datepicker({
    defaultDate: "+2d",
    changeMonth: true,
    numberOfMonths: 1,
    minDate: dateToday,
    onSelect: function(selectedDate) {
        var option = this.id == "start-date" ? "minDate" : "maxDate",
        instance = $(this).data("datepicker"),
        date = $.datepicker.parseDate(instance.settings.dateFormat || $.datepicker._defaults.dateFormat, selectedDate, instance.settings);
        dates.not(this).datepicker("option", option, date);
    }
  });
});
});
</script>

<div>
<!-- Static navbar -->
<nav class="navbar navbar-default">
   <div class="container-fluid">
      <div class="navbar-header">
<!--         <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
         <span class="sr-only">Toggle navigation</span>
         <span>Book Now!</span>
         </button>
         <a class="navbar-brand" href="/">
         <img src="https://www.solodev.com/assets/email/logo.png" alt="Logo Solodev">
         </a>
      </div>
      <div id="navbar" class="navbar-collapse collapse">
         <form class="form book-now-form" role="form" id="widget_booking_form" name="widget_booking_form" >
            <input id="campaign" type="hidden" value="visitflagler_topNavWidget" name="campaign"> <input id="clone_id" type="hidden" value="278" name="clone_id">-->
<!--            <div class="form-group">
               <label for="lodging">Book Your Stay</label> 
               <select class="form-control" id="lodgingID" name="lodgingID" placeholder="All Lodging">
                  <option value="103" selected="selected">
                     All Options
                  </option>
                  <option value="50">
                     Flights
                  </option>
                  <option value="9">
                     Hotels
                  </option>
                  <option value="21">
                     Cars
                  </option>
                  <option value="5">
                     Cruises
                  </option>
                  <option value="7">
                     Vacation Rentals
                  </option>
                  <option value="7">
                     Bundle Deals
                  </option>
               </select>
            </div>-->
            <!--check in element-->
            <div class="form-group">
               <label for="check-in">Check In</label> <!-- <input type="textfield" class="form-control" id="check-in" placeholder="12.20.2014"> -->
               <input type="text"  class="form-control" id="start-date" name="start-date" placeholder="yyyy/mm/dd/">
            </div>
            <!--check out element-->
            <div class="form-group">
               <label for="check-out">Check Out</label> <!-- <input type="textfield" class="form-control" id="check-out" placeholder="12.27.2014"> -->
               <input type="text" class="form-control" id="end-date" name="end-date" placeholder="yyyy/mm/dd" >
            </div>
            <!--submit-->
            <div class="form-group">
               <button name="Submit" href="#" class="btn btn-sm btn-warning">Search</button>
            </div>
         </form>
      </div>
      <!--/.nav-collapse -->
   </div>
   <!--/.container-fluid -->
</nav>

</div>