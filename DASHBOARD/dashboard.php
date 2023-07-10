<?php
session_start(); // Start the session

// Check if the user is not logged in
if (!isset($_SESSION['user_id'])) {
  header("Location: ../LOGIN/login.php");
  exit();
}

// Get the user's name from the session or database
$userName = $_SESSION['username'];

// Handle account settings form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  // Process the form data and update the user's password and username in the database
  // ...
  // Redirect to the dashboard page after updating the account settings
  header("Location: dashboard.php");
  exit();
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>Dashboard</title>
</head>
<body>
  <h2>Welcome, <?php echo $userName; ?></h2>
  <h3>Account Settings</h3>
  <form id="account-settings-form" action="" method="POST">
    <div>
      <label for="password">New Password</label>
      <input type="password" id="password" name="password" required>
    </div>
    <div>
      <label for="username">New Username</label>
      <input type="text" id="username" name="username" required>
    </div>
    <button type="submit">Save Changes</button>
  </form>
</body>
</html>
