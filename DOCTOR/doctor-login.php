<?php
// Handle doctor login logic here

// Assuming you have MySQL credentials
$host = 'localhost';
$dbName = 'dispenser';
$username = 'root';
$password = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  // Retrieve form data
  $ssn = $_POST['ssn'];
  $email = $_POST['email'];
  $password = $_POST['password'];

  // Connect to MySQL database
  $conn = new mysqli($host, $username, $password, $dbName);

  // Check for connection errors
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }

  // Prepare and execute the query to verify doctor's login credentials
  $stmt = $conn->prepare("SELECT * FROM doctors WHERE ssn = ? AND email = ? AND password = ?");
  $stmt->bind_param("sss", $ssn, $email, $password);
  $stmt->execute();
  $result = $stmt->get_result();

  // Check if a matching record was found
  if ($result->num_rows === 1) {
    // Login successful, redirect to doctor dashboard
    header('Location: doctor-dashboard.php');
    exit();
  } else {
    // Login failed, show error message or redirect to appropriate page
    echo "Invalid login credentials";
  }

  // Close the database connection
  $stmt->close();
  $conn->close();
}
?>
