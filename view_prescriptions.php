<?php
session_start();
include "db_conn.php";

if (isset($_SESSION['userPass']) && isset($_SESSION['userId'])) {

    // Function to fetch and display all prescriptions from the database
    function viewAllPrescriptions()
    {
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "drug_e_dispensing";

        $conn = new mysqli($servername, $username, $password, $dbname);

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $sql = "SELECT * FROM prescriptions";
        $result = $conn->query($sql);

        echo "<h2>View All Prescriptions</h2>";
        echo "<table>";
        echo "<tr><th>User ID</th><th>First Name</th><th>Last Name</th><th>Prescription</th><th>Date</th><th>Frequency of Drugs</th></tr>";
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr><td>"  . $row["userId"] . "</td><td>" . $row["FirstName"] . "</td><td>" . $row["LastName"] . "</td><td>" . $row["Prescription"] . "</td><td>" . $row["Date"] . "</td><td>" . $row["FrequencyOfDrugs"] . "</td></tr>";
            }
        } else {
            echo "<tr><td colspan='7'>No prescriptions found.</td></tr>";
        }
        echo "</table>";

        $conn->close();
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>View Prescriptions</title>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
</head>
<body>
    <h1>Hello, <?php echo $_SESSION['userId']; ?></h1>
    <a href="logout.php">Logout</a>

    <!-- Call the function to view all prescriptions -->
    <?php viewAllPrescriptions(); ?>

</body>
</html>
