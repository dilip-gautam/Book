<?php
include('connection.php');

// Creating Database
$sql = "CREATE DATABASE booking";


// Creating table
$sql = "CREATE TABLE Company_name (
    Company_id INT AUTO_INCREMENT PRIMARY KEY,
    cname VARCHAR(30) UNIQUE )";

$sql = "CREATE TABLE place(
            place_id INT AUTO_INCREMENT primary key,
            pname VARCHAR(30) NOT NULL UNIQUE)";

$sql= "CREATE TABLE route_info
            (
            route_id INT AUTO_INCREMENT PRIMARY KEY,
            from_id int,
            to_id int,
            FOREIGN KEY (from_id) REFERENCES place(place_id),
            FOREIGN KEY (to_id) REFERENCES place(place_id)
            )";

$sql = "CREATE TABLE Vehicles_detail(
    Vehicle_Id INT AUTO_INCREMENT PRIMARY KEY,
    Vechicle_Number VARCHAR(15),
    route_id INT,
    Company_id INT,
    FOREIGN KEY (route_id) REFERENCES route_info(route_id),
    FOREIGN KEY (Company_id) REFERENCES Company_name(Company_id),
    price INT,
    l_Date DATE,
    l_Time TIME
    )";  


if ($conn->query($sql) === TRUE) {
    echo "Table MyGuests created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}

    $conn->close();
?>