<!DOCTYPE html>
<html>
<head>
    <title>Drugs Dispensed to Patient</title>
    <style>
        body {
            background-image: url('background.png.jpg');
            background-size: cover;
            background-position: center;
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
        }

        h3, h4, h5 {
            color: #088F8F;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        th, td {
            padding: 10px;
            text-align: left;
            border-bottom: 1px solid #ccc;
        }

        th {
            background-color: #088F8F;
            color: white;
        }

        button {
            background-color: #088F8F;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
        }

        button a {
            color: white;
            text-decoration: none;
        }

        button:hover {
            background-color: #077F7F;
        }
    </style>
</head>
<body>
    <?php
    session_start();
    include "db_conn.php";

    if (isset($_SESSION['userPass']) && isset($_SESSION['userId'])) {
        $sqll = "SELECT * FROM patientinfo WHERE userId=$_SESSION[userId]";
        $resultt = mysqli_query($conn, $sqll);

        if (mysqli_num_rows($resultt) < 1) {

            $sql = "SELECT * FROM patient WHERE userId=$_SESSION[userId]";
            $result = mysqli_query($conn, $sql);
            $row = mysqli_fetch_assoc($result);
            $Fname = $row['FirstName'];
            $Lname = $row['LastName'];
            $Id = $row['userId'];
        }

        // Fetch patient general information (Same as existing code)

        // Fetch drugs dispensed to the patient
        $dispensedDrugsQuery = "SELECT drugName, dispenseDate FROM dispense WHERE userId=$_SESSION[userId]";
        $resultDispensedDrugs = mysqli_query($conn, $dispensedDrugsQuery);
    ?>
        <h3>Drugs Dispensed to <?php echo $Fname . ' ' . $Lname; ?></h3>

        <table>
            <tr>
                <th>Drug Name</th>
                <th>Dispense Date</th>
            </tr>
            <?php
            while ($rowDispensedDrugs = mysqli_fetch_assoc($resultDispensedDrugs)) {
                $drugName = $rowDispensedDrugs['drugName'];
                $dispenseDate = $rowDispensedDrugs['dispenseDate'];
            ?>
                <tr>
                    <td><?php echo $drugName; ?></td>
                    <td><?php echo $dispenseDate; ?></td>
                </tr>
            <?php
            }
            ?>
        </table>
        <!-- Additional Code (Existing Code) -->
       
        
    <?php
    }
    ?>
 <button><a href="patient.php">BACK</a></button></a>
</body>
</html>
