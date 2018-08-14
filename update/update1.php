<?php
include '../database/connection.php';
session_start();
$vehicleno= $_SESSION['abc'];
$date= $_POST['date'];
$price= $_POST['price'];
$time= $_POST['time'];
echo $time;

$query="SELECT Vechicle_Number FROM Vehicles_detail  WHERE Vechicle_Number = '$vehicleno';";
            $result = mysqli_query($conn,$query);
            $value = mysqli_fetch_object($result);
            if($value!= NULL){
            	$query="UPDATE Vehicles_detail SET price ='$price' WHERE Vechicle_Number = '$vehicleno';";
            	if ($conn->query($query) === TRUE) {
                        echo "Price Updated";
                        }
                $query1= "UPDATE Vehicles_detail SET l_Date ='$date' WHERE Vechicle_Number = '$vehicleno';";
                if ($conn->query($query1) === TRUE) {
                    echo "Date Updated";
                    } 
                $query2= "UPDATE Vehicles_detail SET l_Time ='$time' WHERE Vechicle_Number = '$vehicleno';";
                if ($conn->query($query2) === TRUE) {
                        echo "Time Updated";
                        } 
            }
            else{
            	echo "No such vehicle record in our database.";
            }
?>