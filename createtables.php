<?php 
$servername="localhost";
$username="root";
$password="";
$Database="Dispenser";


// Create connection
$conn = new mysqli($servername, $username,$password, $Database);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

//sql to create table 
$sql="CREATE TABLE Patient (
    id INT AUTO_INCREMENT PRIMARY KEY,
    firstname VARCHAR(50) NOT NULL,
    lastname VARCHAR(50) NOT NULL,
    gender ENUM('male', 'female', 'other') NOT NULL,
    telephone VARCHAR(15) NOT NULL,
    email VARCHAR(100) NOT NULL,
    password VARCHAR(255) NOT NULL
    )";

if($conn->query ($sql)===TRUE) {
    echo "Table Patient
     created successfully";
} else {
    echo"Error creating table: " .$conn->error;
}
$conn->close();


?>