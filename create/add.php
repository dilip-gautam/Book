<?php
include('../database/connection.php'); 

$companyname= $_POST['cname'];
$vehicleno= $_POST['vehicleno'];
$from= $_POST['from'];
$to= $_POST['to'];
$Date= $_POST['date'];
$price= $_POST['price'];


$query = "INSERT INTO Company_name (Company_id, cname) 
VALUES ('', '$companyname')";

 if ($conn->query($query) === TRUE) {
    echo "";
} else {
    echo "value insert wrong  " . $conn->error;
}

$query="SELECT  pname 
FROM place WHERE
pname ='$from';";
$result = mysqli_query($conn,$query);
$value = mysqli_fetch_object($result);
if($value!= NULL){
        }
    else{
            $query = "INSERT INTO place(id,pname) 
                        VALUES ('', '$from')";
                if ($conn->query($query) === TRUE) {
                echo "";
                } else {
            echo "value insert wrong  " . $conn->error;
                }
            } 
$query="SELECT  pname 
FROM place WHERE
pname ='$to';";
$result = mysqli_query($conn,$query);
$value = mysqli_fetch_object($result);
if($value!= NULL){
        }
    else{
            $query = "INSERT INTO place(id,pname) 
                        VALUES ('', '$to')";
                if ($conn->query($query) === TRUE) {
                echo "";
                } else {
            echo "value insert wrong  " . $conn->error;
                }
            }            

$query="SELECT  Company_id FROM Company_name WHERE cname ='$companyname';";
$result = mysqli_query($conn,$query);
$value = mysqli_fetch_object($result);
$c_id= $value->Company_id;



$query="SELECT  place_id FROM place WHERE pname ='$from';";
$result = mysqli_query($conn,$query);
if (!$result) {
    die('Invalid query: ' . mysql_error());
    }
    while ($row = mysqli_fetch_assoc($result)) {
        $f_id= $row['place_id'];
       
    }

$query="SELECT  place_id FROM place WHERE pname ='$to';";
$result = mysqli_query($conn,$query);
$value = mysqli_fetch_object($result);
$t_id= $value->place_id;

$query="SELECT  route_id FROM route_info WHERE from_id ='$f_id' and to_id='$t_id' ;";
$result = mysqli_query($conn,$query);
$value = mysqli_fetch_object($result);
if($value!= NULL){
$ro_id= $value->route_id;
}
else
{
    $query = "INSERT INTO route_info(route_id,from_id,to_id) 
    VALUES ('', '$f_id','$t_id')";

    if ($conn->query($query) === TRUE) {
    echo "";
    } else {
    echo "value insert wrong  " . $conn->error;
    }
$query="SELECT  route_id FROM route_info WHERE from_id ='$f_id' and to_id='$t_id' ;";
$result = mysqli_query($conn,$query);
$value = mysqli_fetch_object($result);
$ro_id= $value->route_id;
}


$query = "INSERT INTO Vehicles_detail(Vehicle_Id,Vechicle_Number,route_id,Company_id,price,l_Date,l_Time) 
        VALUES ('','$vehicleno','$ro_id', '$c_id','$price','$Date','05:00:00')";

    if ($conn->query($query) === TRUE) {
        echo "Data added Successfully.";
    } else {
        echo "value insert wrong  " . $conn->error;
    }
        
 ?>