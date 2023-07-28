<?php
@include 'db_conn.php';

if (isset($_POST['register'])) {
    $fname = mysqli_real_escape_string($conn, $_POST['Firstname']);
    $lname = mysqli_real_escape_string($conn, $_POST['lastName']);
    $userId = mysqli_real_escape_string($conn, $_POST['userId']);
    $pass = mysqli_real_escape_string($conn, $_POST['userPass']);
    $cpass = mysqli_real_escape_string($conn, $_POST['usercPass']);
    $role = $_POST['role'];

    $select = "SELECT * FROM $role WHERE userId='$userId' && userpass='$pass';"; 

    $result = mysqli_query($conn, $select);

    if (mysqli_num_rows($result) > 0) {
        $error[] = 'User already exists!'; 
    } else {
        if ($pass != $cpass) {
            $error[] = 'Password does not match!';  
        } else {
            $insert = "INSERT INTO $role (userId, FirstName, LastName, userpass) VALUES ('$userId', '$fname', '$lname', '$pass');";
            mysqli_query($conn, $insert);
            header('location:index.php');
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>REGISTRATION</title>
    <a href="../LANDING PAGE /index.php">
    <img src="home.png" alt="Home" />
</a>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            padding: 20px;
        }

        .form-container {
            max-width: 400px;
            margin: 0 auto;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
            border-radius: 5px;
        }

        .form-container h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        .form-container input[type="text"],
        .form-container input[type="password"],
        .form-container select {
            width: 95%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 14px;
        }

        .form-container .error-msg {
            color: red;
            font-size: 14px;
            margin-bottom: 15px;
        }

        .form-container button {
            background-color: #088F8F;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            font-size: 14px;
            margin-top: 10px;
        }

        .form-container button a {
            color: white;
            text-decoration: none;
        }

        .form-container p {
            text-align: center;
        }

        .form-container p a {
            color: #088F8F;
            text-decoration: none;
            margin-left: 5px;
        }

        .form-container p a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body> 
<div class="form-container">
    <form action="" method="post">
        <?php 
        if(isset($error)){
            foreach($error as $error){
                echo '<span class="error-msg">'.$error.'</span>';
            }
        }
        ?>
    
    <input type="text" name="Firstname" placeholder="First Name"><br>
    <input type="text" name="lastName" placeholder="Last Name"><br>
    <input type="text" name="userId" placeholder="National ID"><br>
    <input type="password" name="userPass" placeholder="Password"><br>
    <input type="password" name="usercPass" placeholder="Confirm Password"><br>
    <p>SELECT YOUR ROLE</p>
    <select name="role">
        <option value="admin">ADMIN</option>
        <option value="patient">Patient</option>
        <option value="doctor">Doctor</option>
        <option value="pharmacist">Pharmacist</option>
        <option value="pharmaceutical_company">Pharmaceutical Company</option>
    </select>
    <button type="submit" name="register" class="form-btn">Register Now</button>
    </form>
    <p>Already have an account.<a href="index.php"><button>login</button></a></p>
</div>
</body>
</html>
