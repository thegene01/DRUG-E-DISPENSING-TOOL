<?php
session_start();
include  "db_conn.php";
$Did=$_SESSION['userId'];

// Check if a search query is provided
if (isset($_GET['search'])) {
    $search = $_GET['search'];
    // Modify the SQL query to include the search condition
    $sqll = "SELECT * FROM Drug_E_Dispensing.drugordered WHERE orderId LIKE '%$search%'";
} else {
    // Default query without search condition
    $sqll = "SELECT * FROM Drug_E_Dispensing.drugordered WHERE pcompanyId=$Did";
}

$resultt = mysqli_query($conn , $sqll);
?>

<!DOCTYPE html>
<html>
<head>
    <title>PRESCRIPTION</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            padding: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        th, td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #ccc;
        }

        th {
            background-color: #088F8F;
            color: white;
        }

        tr:hover {
            background-color: #f2f2f2;
        }

        form {
            margin-bottom: 20px;
        }

        input[type="text"] {
            padding: 8px;
            font-size: 14px;
        }

        button[type="submit"] {
            background-color: #088F8F;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            font-size: 14px;
        }

        button[type="submit"]:hover {
            background-color: #077F7F;
        }

        a {
            text-decoration: none;
        }

        a button {
            background-color: #088F8F;
            color: white;
            border: none;
            padding: 8px 15px;
            border-radius: 5px;
            cursor: pointer;
            font-size: 14px;
        }

        a button:hover {
            background-color: #077F7F;
        }
    </style>
</head>
<body>
    <form method="GET" action="">
        <input type="text" name="search" placeholder="Search by order ID">
        <button type="submit">Search</button>
    </form>

    <table>
        <tr>
            <th>ORDER ID</th>
            <th>PHARMACIST ID</th>
            <th>DRUG NAME</th>
            <th>DRUG MANUFACTURER</th>
            <th>ORDER</th>
            <th>DATE ORDERED</th>
            <th>OPERATION</th>

        </tr>
        <?php
        while ($row = mysqli_fetch_assoc($resultt)) {
        ?>
        <tr>
            <td><?php echo $row['orderId']; ?></td>
            <td><?php echo $row['pharmacistId']; ?></td>
            <td><?php echo $row['drugName']; ?></td>
            <td><?php echo $row['drugManufacturer']; ?></td>
            <!-- <td><?php echo $row['pcompanyId']; ?></td> -->
            <td><?php echo $row['sorder']; ?></td>
            <td><?php echo $row['Date']; ?></td>
            <td><a href="dispenseorder.php?orderId=<?php echo $row['orderId']; ?>&drugname=<?php echo $row['drugName']; ?>"><button>DISPENSE</button></a></td>
        </tr>
        <?php
        }
        ?>
    </table><br>

    <a href="pharmaceutical_company.php"><button>BACK</button></a>
</body>
</html>
