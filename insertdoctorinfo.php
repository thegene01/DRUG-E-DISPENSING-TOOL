<nav>
    <?php 
    session_start();
    include 'db_conn.php';
    $doctorId=$_SESSION['userId'];

$select="SELECT * FROM doctor WHERE userId=$doctorId";
$resulttt=mysqli_query($conn, $select);
$row=mysqli_fetch_assoc($resulttt);

$Fname=$row['FirstName'];
$Lname=$row['LastName'];
    ?>

    <img src="/login-system/logo.png.jpeg" alt="logo">
    <ul>
        <li><a href="#"><?php echo $Fname.' '.$Lname ?></a></li>
        <li><a href="#"><?php echo $_SESSION['userId']; ?></a></li>
    </ul>
    <img src="\login-system\profile.png.jpeg" alt="profile">
</nav>

<style>
        body {
            background-image: url('background.png.jpg');
            background-size: cover;
            background-position: center;
            font-family: Arial, sans-serif;
        }

        nav {
            background: #088F8F;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 5px 3%;
        }

        img[alt="logo"], img[alt="profile"] {
            height: 50px;
            width: 50px;
            border-radius: 50%;
        }

        nav ul {
            width: 100%;
            text-align: right;
            margin: 0;
            padding: 0;
        }

        nav ul li {
            display: inline-block;
            list-style: none;
            margin: 10px 20px;
        }

        nav ul li a {
            color: whitesmoke;
            text-decoration: none;
        }

        form {
            max-width: 400px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h3, h4 {
            text-align: center;
        }

        input, select {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        button {
            background-color: #088F8F;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            font-size: 14px;
        }

        button a {
            color: white;
            text-decoration: none;
        }

        button:hover {
            background-color: #077F7F;
        }
    </style>

<?php
include 'db_conn.php';
$doctorId=$_GET['doctorId'];
$select="SELECT FirstName,LastName FROM doctor WHERE userId=$doctorId;";
$result=mysqli_query($conn, $select);
$row=mysqli_fetch_assoc($result);
$fname=$row['FirstName'];
$lname=$row['LastName'];

$selectt="SELECT * FROM doctorinfo WHERE userId=$doctorId;";
$resultttt=mysqli_query($conn, $selectt);

if (mysqli_num_rows($resultttt) > 0){
header('location:inserteditdoctorinfo.php');

}



if(isset($_POST['insert'])){
    $Fname=$_POST['Firstname'];
    $Lname=$_POST['Secondname'];
    $Id=$_POST['userId'];
    $Age=$_POST['Age'];
    $Gender=$_POST['Gender'];
    $Phone=$_POST['Phone'];
    $Speciality=$_POST['Speciality'];


    $insert="INSERT INTO doctorinfo (userId, FirstName, LastName,Phone, Age, Gender, Speciality)
    VALUES ($Id, '$Fname', '$Lname', $Phone, $Age, '$Gender', '$Speciality')";
    $result=mysqli_query($conn, $insert);
    if($result){
        echo 'updated sucessfully';
        // header('location:patient.php');
    }

}


?>
<!DOCTYPE html>
<html>
<head>
    <title>HOME</title>
</head>
<body>
<form action="" method="post">
    <h3>PERSONAL INFO</h3>

   <input type='text' name="Firstname" placeholder="First Name" value="<?php echo $fname;?>" autocomplete="off">  
   <input type="text" name="Secondname" placeholder="Second Name" value="<?php echo $lname;?>" autocomplete="off"> 
   <input type="text" name="userId" placeholder="User ID"  value="<?php echo $doctorId;?>" readonly autocomplete="off"><br><br>
   <input type="text" name="Age" placeholder="Age" autocomplete="off"> 
   <select name="Gender">     
     <option placeholder="male">Male</option>
     <option placeholder="female">Female</option>
   </select> 
   <input type="text" name="Phone" placeholder="Phone" autocomplete="off"><br><br>
 
</body>
<body>
    <h4>SPECIALITY</h4>
    <input type="text" name="Speciality" placeholder="Speciality" autocomplete="off">

</body><br><br>


   
    <body>
    <button type="submit" name="insert"  class ="form-btn">SUBMIT</button>
    <button><a href="doctor.php">BACK</a></button></a>
    </body>
    
 
</html>


<style> body {
    background-image: url('background.png.jpg');
    background-size: cover;
    background-position: center;
  }</style>

