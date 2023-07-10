<?php
session_start(); // Start the session

// Check if the user is not logged in
if (!isset($_SESSION['user_id'])) {
  header("Location: ../LOGIN/login.php");
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

// Handle the registration form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  // Generate an automatic ID
  $id = uniqid();

  // Retrieve and sanitize form data
  $name = $_POST['name'];
  $email = $_POST['email'];

  // Insert the user into the database
  $sql = "INSERT INTO users (id, name, email) VALUES ('$id', '$name', '$email')";
  if ($conn->query($sql) === TRUE) {
    // Registration successful
   // Redirect to the dashboard page after successful registration
   header("Location: dashboard.php");
   exit();
  } else {
    // Registration failed
    $error = "Error: " . $conn->error;
  }
}

// Close the database connection
$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
  <title>Registration</title>
</head>
<body>
  <h2>Registration</h2>
  <?php if (isset($error)) : ?>
    <p><?php echo $error; ?></p>
  <?php endif; ?>
  <form id="signup-form" action="signup.php" method="POST">
    <!-- Registration form fields -->
    <div>
      <label for="name">Name</label>
      <input type="text" id="name" name="name" required>
    </div>
    <div>
      <label for="email">Email</label>
      <input type="email" id="email" name="email" required>
    </div>
    <button type="submit">Register</button>
  </form>

  <p>Already have an account? <a href="../LOGIN/login.php">Login here</a></p>
</body>
</html>

