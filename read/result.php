<?php
include('../database/connection.php'); 

$source= $_POST['source'];
$destination= $_POST['destination'];
$date= $_POST['date'];

$query="SELECT  place_id FROM place WHERE pname ='$source';";
$result = mysqli_query($conn,$query);
$value = mysqli_fetch_object($result);
$source_id= $value->place_id;

$query="SELECT  place_id FROM place WHERE pname ='$destination';";
$result = mysqli_query($conn,$query);
$value = mysqli_fetch_object($result);
$destination_id= $value->place_id;

$query="SELECT  route_id FROM route_info WHERE from_id='$source_id' and to_id= '$destination_id' ;";
$result = mysqli_query($conn,$query);
$value = mysqli_fetch_object($result);
$route_id= $value->route_id;

$query="SELECT  * FROM vehicles_detail WHERE l_date ='$date' and route_id='$route_id' ;";
$result1 = mysqli_query($conn,$query);
$value = mysqli_fetch_object($result);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" media="screen" href="static/home.css"/>
</head>
<body>

<?php 
   session_start();
    if ($result1->num_rows > 0) {
        while($value = mysqli_fetch_object($result1)) { 
           ?>
           <div class="container">             
            <div class="card mt-4" style="width: 18rem;">
            <div class="card-body">
                <h5 class="card-title">Bus</h5>
                <p> Vehicle No: <?php  echo $value->Vechicle_Number; $_SESSION['vehicleno'] = $value->Vechicle_Number; ?> </p>
                <p>Date:  <?php echo $value->l_Date; $_SESSION['date'] = $value->l_Date;?> </p>
                <p>Price: <?php   echo $value->price; $_SESSION['price'] = $value->price;?></p>
                <p>Time:  <?php echo $value->l_Time;?> </p>
                <!-- <form action="book.php">
                <input type="submit" class="btn btn-primary" value="Book">
                </form> -->
            </div>
            </div>
            </div>
<?php }}
else {?>
    <div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="error-template ">
            <h1 class="display-2 text-center">Sorry!</h1>
                <h2 class="display-3 text-center">No vehicles available!</h2>
                <div class="error-actions text-center mt-4">
                    <a href="search.html" class="btn btn-primary btn-lg">Go to home</a>
                </div>
            </div>
        </div>
    </div>
</div>
<?php } ?>
</body>
</html>

