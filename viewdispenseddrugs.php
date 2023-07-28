<!DOCTYPE html>
<html>
<head>
    <title>View Dispensed Drugs</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            padding: 20px;
            text-align: center;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
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

        a {
            text-decoration: none;
            margin: 10px;
        }

        button {
            background-color: #088F8F;
            color: white;
            border: none;
            padding: 12px 20px;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            transition: background-color 0.3s ease;
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

    if (isset($_SESSION['userPass']) && $_SESSION['userType'] === 'admin') {
        // Fetch all drug dispense records
        $dispensedDrugsQuery = "SELECT * FROM dispense";
        $resultDispensedDrugs = mysqli_query($conn, $dispensedDrugsQuery);
    ?>
        <h2>Dispensed Drugs Records</h2>
        <table>
            <tr>
                <th>Dispense ID</th>
                <th>Patient ID</th>
                <th>Drug Name</th>
                <th>Dispense Date</th>
            </tr>
            <?php
            while ($rowDispensedDrugs = mysqli_fetch_assoc($resultDispensedDrugs)) {
                $dispenseId = $rowDispensedDrugs['dispenseId'];
                $patientId = $rowDispensedDrugs['userId'];
                $drugName = $rowDispensedDrugs['drugName'];
                $dispenseDate = $rowDispensedDrugs['dispenseDate'];
            ?>
                <tr>
                    <td><?php echo $dispenseId; ?></td>
                    <td><?php echo $patientId; ?></td>
                    <td><?php echo $drugName; ?></td>
                    <td><?php echo $dispenseDate; ?></td>
                </tr>
            <?php
            }
            ?>
            <?php
    } 
    ?>
        </table>
        <a href="index.php"><button>BACK</button></a>
    
</body>
</html>
