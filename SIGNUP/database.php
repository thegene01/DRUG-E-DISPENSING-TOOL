<?php 
$host="localhost";
$username="root";
$password="";
$dbname="dispenser";

$mysqli=new mysqli (hostname:$host,
                    username:$username,
                    password:$password,
                    database:$dbname);

                    // Create connection
$conn = mysqli_connect($host, $username,$password,$dbname);

// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}
echo "Connected successfully";
?>
