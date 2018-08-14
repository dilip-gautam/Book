<?php

include('../database/connection.php'); 
$vehicleno= $_POST['vehicleno'];

$query="SELECT Vechicle_Number FROM Vehicles_detail WHERE Vechicle_Number = '$vehicleno';";
$result = mysqli_query($conn,$query);
$value = mysqli_fetch_object($result);
            if($value!= NULL){
            	$query="DELETE FROM  Vehicles_detail WHERE Vechicle_Number = '$vehicleno';";
					if ($conn->query($query) === TRUE) {
                        echo "Vehicle details removed";
                        } else{
                        echo "Can't delete" . $conn->error;}
                        }
                    else
                    {echo "No Vehicle with this Vehicle Number.";}

?>