
<!DOCTYPE html>
<html>
<head>
    <title>DRUG REGISTRATION</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            padding: 20px;
        }

        .form-container {
            max-width: 400px;
            height: 350px;
            width: 400px;
            margin: 0 auto;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
            border-radius: 5px;
        }

        .form-container input[type="text"],
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
            
            border: none;
            padding: 8px 15px;
            border-radius: 5px;
            cursor: pointer;
            font-size: 14px;
 
        }

        .form-container button[type="submit"] {
            float: right;
            color: white;
        }

        .form-container button[type="submit"]:hover {
            background-color: #077F7F;
        }
        .form-container button[type="button"] {
            color: white;
        }
    </style>
</head>
<body>
    <?php
    @include 'db_conn.php';

    if (isset($_POST['register'])) {
        $drugId = mysqli_real_escape_string($conn, $_POST['drugId']);
        $drugName = mysqli_real_escape_string($conn, $_POST['drugName']);
        $drugManufacturer = mysqli_real_escape_string($conn, $_POST['drugManufacturer']);
        $image = mysqli_real_escape_string($conn, $_POST['image']);

        $select = "SELECT * FROM drugs WHERE drugId='$drugId';";
        $result = mysqli_query($conn, $select);

        if (mysqli_num_rows($result) > 0) {
            echo 'Drug already exists!';
        } else {
            $insert = "INSERT INTO drugs (drugId, drugName, drugManufacturer, image) VALUES ('$drugId','$drugName','$drugManufacturer','$image');";
            mysqli_query($conn, $insert);
            header('location:viewdrugsadmin.php');
        }
    }
    ?>

    <div class="form-container">
        <h2>Drug Registration</h2>
        <form action="" method="post">
            <input type="text" name="drugId" placeholder="Drug ID" autocomplete="off"><br>
            <input type="text" name="drugName" placeholder="Drug Name" autocomplete="off"><br>
            <input type="text" name="drugManufacturer" placeholder="Drug Manufacturer" autocomplete="off"><br>
            <input type="file" name="image" placeholder="Drug Image"><br>
            <button type="submit" name="register"  class ="form-btn">register now</button>
            <button type="button"><a href="viewdrugsadmin.php">BACK</a></button>
         
        </form>
    </div>
</body>
</html>
