<?php
session_start();
if (isset($_SESSION['userPass']) && isset($_SESSION['userId'])) {
  include "db_conn.php";
  $sqll = "SELECT * FROM doctor WHERE userId=$_SESSION[userId]";
  $resultt = mysqli_query($conn, $sqll);
  $roww=mysqli_fetch_assoc($resultt);
  $dfname =$roww['FirstName'];
  $dlname =$roww['LastName'];
  $Did=$roww['userId'];
}

$patientId=$_GET['patientId'];
$select="SELECT * FROM patientinfo WHERE userId = $patientId;";
$result=mysqli_query($conn, $select);

$row=mysqli_fetch_assoc($result);
$fname =$row['FirstName'];
$lname =$row['LastName'];
$id=$row['userId'];
$allergies= $row['Allergies'];



if (isset($_POST['prescribe'])) {
  $date=$_POST['date'];
  $Pname=$_POST['Pname'];
  $Dname=$_POST['Dname'];
  $patientid=$_POST['patientid'];
  $prescription=$_POST['prescription'];
  $Did=$_POST['Did'];


  $insertt = "INSERT INTO drug_e_dispensing.prescriptions ( userId, PName, DName, Did, Prescription, Date) VALUES ( $patientid,'$Pname', '$Dname',$Did, '$prescription','$date');";
  $result=mysqli_query($conn, $insertt);
  if($result){
    //  echo 'updated sucessfully';
    header('location:doctor.php');
  }else{
    echo 'unsucessful';
  }
}

?>
<!DOCTYPE html>
<html>
<head>
    <title>PRESCRIBE MEDICINE</title>
    <style>
        body {
            background-image: url('prescribe2.jpg');
            background-size: cover;
            background-position: center;
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
        }

        nav {
            background-color: black;
            color: white;
            width: 100%;
            padding: 10px;
        }

        .right-nav {
            float: right;
        }

        form {
            max-width: 500px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        input[type="text"],
        input[type="date"],
        textarea {
            width: 95%;
            padding: 8px;
            font-size: 14px;
            margin-bottom: 10px;
        }

        textarea {
            height: 100px;
        }

        .form-btn {
            background-color: #088F8F;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            font-size: 14px;
        }

        .form-btn:hover {
            background-color: #077F7F;
        }

        .back-btn {
            background-color: #088F8F;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            font-size: 14px;
            float: right;
            text-decoration: none;
        }

        .back-btn:hover {
            background-color: #077F7F;
        }
    </style>
</head>
<body>
    <nav>
        <h1>PRESCRIBE MEDICINE</h1>
    </nav>

    <form method="POST">
        <p>PRESCRIPTION DATE</p>
        <input type="date" name="date" placeholder="Date" >
        <p>PATIENT NAME:</p>
        <input type="text" name="Pname" value="<?php echo $fname . ' ' . $lname; ?>" readonly>
        <p>PATIENT IDENTIFICATION NUMBER</p>
        <input type="text" name="patientid" value="<?php echo $id ?>" readonly>
        <p>PATIENT ALLERGIES</p>
        <input type="text" name="allergirs" value="<?php echo $allergies ?>" readonly>
        <p>DOCTOR NAME:</p>
        <input type="text" name="Dname" value="<?php echo $dfname . ' ' . $dlname; ?>" readonly>
        <p>DOCTOR IDENTIFICATION NUMBER:</p>
        <input type="text" name="Did" value="<?php echo $Did; ?>" readonly>
        <p>PRESCRIPTION</p>
        <textarea name="prescription" placeholder="Write prescription here"></textarea><br><br>

        <button type="submit" name="prescribe" class="form-btn">PRESCRIBE</button>
        <a href="prescribe.php" class="back-btn">BACK</a>
    </form>
</body>
</html>
