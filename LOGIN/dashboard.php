<?php
session_start(); // Start the session

// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
  header("Location: login.php");
  exit();
}

$host = 'localhost';
$username = 'root';
$password = '';
$dbname = 'dispenser';

// Establish the database connection
$conn = new mysqli($host, $username, $password, $dbname);
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Retrieve the user's information from the database
$userID = $_SESSION['user_id'];
$sql = "SELECT * FROM users WHERE id = '$userID'";
$result = $conn->query($sql);

if ($result->num_rows === 1) {
  $user = $result->fetch_assoc();
  $username = $user['username'];
  // Display the personalized dashboard content
  echo "<h2>Welcome, " . $username . "! This is your dashboard.</h2>";

  // You can add your dashboard HTML and other functionality here
} else {
  echo "Error retrieving user information.";
}

// Close the database connection
$conn->close();
?>


