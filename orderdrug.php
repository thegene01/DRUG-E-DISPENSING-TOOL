<!DOCTYPE html>
<html>
<head>
    <title>UPDATE DRUG</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            padding: 20px;
        }

        .form-container {
            height: 910px;
            max-width: 400px;
            margin: 0 auto;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
            border-radius: 5px;
        }

        .form-container input[type="text"],
        .form-container input[type="number"],
        .form-container input[type="date"],
        .form-container input[type="file"] {
            width: 95%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 14px;
        }

        .form-container button {
            background-color: #088F8F;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            font-size: 14px;
            margin-right: 10px;
        }

        .form-container button a {
            color: white;
            text-decoration: none;
        }

        .form-container button[type="submit"]
        {
            float: right;
        }
        .form-container button[type="button"] {
            float: left;
        }

        .form-container button[type="submit"]:hover,
        .form-container button[type="button"]:hover {
            background-color: #077F7F;
        }
    </style>
</head>
<body>
    <?php
    include 'db_conn.php';
    session_start();
    $userId= $_SESSION['userId'];
    $drugId = $_GET['orderId'];
    $select = "SELECT * FROM drugstock WHERE drugId=$drugId;";
    $resultt = mysqli_query($conn, $select);
    $row = mysqli_fetch_assoc($resultt);
    $drugID = $row['drugId'];
    $drugName = $row['drugName'];
    $stock = $row['stock'];
    $drugManufacturer = $row['drugManufacturer'];

    if (isset($_POST['update'])) {
        $userId = $_POST['userId'];
        $drugId= $_POST['drugId'];
        $drugName = $_POST['drugName'];
        $sorder = $_POST['sorder'];
        $date = $_POST['date'];
        $drugManufacturer = $_POST['drugManufacturer'];
        $pcompany=$_POST['pcompany'];

        $insert = "INSERT INTO drugordered (pharmacistId, drugId, drugName, drugManufacturer, pcompanyId, sorder, Date)
        VALUES ($userId, $drugId, '$drugName', '$drugManufacturer', '$pcompany', $sorder, '$date');";
        $result = mysqli_query($conn, $insert);

        if ($result) {
            echo "ordered successfully!!";
            // header('location:drugstock.php');
        }
    }
    
    ?>

    <div class="form-container">
        <h2>Order Drug</h2>
        <form action="" method="post">
            <p>PHARMACIST ID:</p>
            <input type="text" name="userId" value="<?php echo $userId; ?>" readonly>
            <p>DRUG ID:</p>
            <input type="text" name="drugId" value="<?php echo $drugID; ?>" readonly>
            <p>DRUG NAME:</p>
            <input type="text" name="drugName" value="<?php echo $drugName; ?>" readonly>
            <p>DRUG MANUFACTURER:</p>
            <input type="text" name="drugManufacturer" value="<?php echo $drugManufacturer; ?>" readonly>
            <p>CURRENT STOCK AVAILABLE:</p>
            <input type="text" name="stock" placeholder="stock" value="<?php echo $stock; ?>" readonly>
            <p>PHARMACEUTICAL COMPANY ID:</p>
            <input type="number" name="pcompany" placeholder="PHARMACEUTICAL COMPANY ID" autocomplete="off">
            <p>ORDER STOCK:</p>
            <input type="number" name="sorder" placeholder="STOCK ORDER" autocomplete="off">
            <p>ORDER DATE:</p>
            <input type="date" name="date" autocomplete="off">
            <button type="submit" name="update">ORDER</button>
            <button type="button"><a href="drugstock.php">BACK</a></button>
        </form>
    </div>
</body>
</html>
