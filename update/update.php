<?php

include('../database/connection.php');


$vehicleno= $_POST['vehicleno'];
$query="SELECT  * FROM vehicles_detail WHERE Vechicle_Number='$vehicleno' ;";
$result= mysqli_query($conn,$query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="home.css">
</head>
<body>
<?php 
session_start();
$_SESSION['abc'] = $_POST['vehicleno'];

    if ($result->num_rows > 0) {
        while($value = mysqli_fetch_object($result)) { 
           ?>
            <div class="card mt-4" style="width: 18rem;">
            <div class="card-body">
                <h5 class="card-title">Previous Details</h5>
                <p>Date:  <?php echo $value->l_Date;?> </p>
                <p>Price: <?php echo $value->price;?> </p>
                <p>Time: <?php echo $value->l_Time;?> </p>
                <h5 class="card-title">Edit Details</h5>
                <form method="POST" action="update1.php">
                <div class="form-group">
                <label for="source">Date</label>
                <input class="form-control" name="date" type="date">
                </div>
                <div class="form-group">
                <label for="price">Price</label>
                <input  type="number" name="price" class="form-control">
                </div>
                <div class="form-group">
                <label for="time">time</label>
                <input type="time" name="time"/>
                </div>
                <div class="form-group">
                <input type="submit" class="btn btn-success" value="Submit">
                </div>
                </form>
            </div>
            </div>
<?php }}
else {
    echo "0 results";
} ?>
</body>
</html>
