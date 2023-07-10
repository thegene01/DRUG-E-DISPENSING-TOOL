<?php
session_start(); // Start the session

$host = 'localhost';
$username = 'root';
$password = '';
$dbname = 'dispenser';

// Establish the database connection
$conn = new mysqli($host, $username, $password, $dbname);
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Handle the login form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $username = $_POST['username'];
  $password = $_POST['password'];

  // Retrieve the user from the database
  $sql = "SELECT * FROM users WHERE username = '$username'";
  $result = $conn->query($sql);

  if ($result->num_rows === 1) {
    $user = $result->fetch_assoc();
    // Verify the password
    if (password_verify($password, $user['password'])) {
      // Password is correct, set session variables
      $_SESSION['user_id'] = $user['id'];
      $_SESSION['username'] = $user['username'];
      // Redirect to the dashboard or any other authorized page
      header("Location: dashboard.php");
      exit();
    } else {
      $error = "Invalid username or password.";
    }
  } else {
    $error = "Invalid username or password.";
  }
}

// Close the database connection
$conn->close();
?>
