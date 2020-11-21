<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
<?php
require ("functions.php");
$con = dbConnect();
$read_sql = "SELECT * FROM `customer`";
$read_data = $con->query($read_sql);

?>

<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
  Launch demo modal
</button>

<!-- Modal -->
<form action="payment_action.php" method="post">
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          </div>

    <div class="modal-body">
        <div class="form-group">
                    <label class="font-noraml">Sender Name</label>
                    <div class="input-group">
                    <select name="AccountNo" onfocus='this.size=8;' onchange='this.size=1; this.blur();' data-placeholder="Select a grade..." class="form-control form-control-lg" style="width:450px;"  tabindex="-1">
                    <option value="">Select</option>
                    <?php
                		while($data_array = $read_data->fetch_assoc()) {
                    echo "<option value=".$data_array["AccountNo"].">".$data_array["UserName"]."</option>" ;
                		}
                	?>
                    </select>
                    </div>
       </div>
       <div class="form-group">
            <label>Amount</label> 
                <input type="text" name="Amount" placeholder="Enter Transfer Amount" class="form-control  form-control-lg">
        </div>

          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="Submit" class="btn btn-primary">Pay</button>
          </div>
        </div>
      </div>
    </div>
</form>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script>
function tp(element) {
    console.log(element);
}
</script>
</body>
</html>
