<nav>
<?php 
include 'db_conn.php';
$patientId=$_GET['patientId'];
$select="SELECT FirstName,LastName FROM patient WHERE userId=$patientId;";
$result=mysqli_query($conn, $select);
$row=mysqli_fetch_assoc($result);
$fname=$row['FirstName'];
$lname=$row['LastName'];
?>
<img src="logo.png.jpeg" alt="logo">
<ul>
    <li><a href="patient.php">HOME</a></li>
    <li><a href="#"><?php echo $fname.' '.$lname;?></a></li>
    <li><a href="#"><?php echo $patientId;?></a></li>
</ul>
<img src="profile.png.jpeg" alt="profile">

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
$patientId=$_GET['patientId'];
$select="SELECT FirstName,LastName FROM patient WHERE userId=$patientId;";
$result=mysqli_query($conn, $select);
$row=mysqli_fetch_assoc($result);
$fname=$row['FirstName'];
$lname=$row['LastName'];

$selectt="SELECT * FROM patientinfo WHERE userId=$patientId;";
$resultttt=mysqli_query($conn, $selectt);

if (mysqli_num_rows($resultttt) > 0){
header('location:inserteditpatientinfo.php');

}


if(isset($_POST['insert'])){
    $Fname=$_POST['Firstname'];
    $Lname=$_POST['Secondname'];
    $Id=$_POST['userId'];
    $Age=$_POST['Age'];
    $Gender=$_POST['Gender'];
    $Phone=$_POST['Phone'];
    $Location=$_POST['Location'];
    $Height=$_POST['Height'];
    $Weight=$_POST['Weight'];
    $Ename=$_POST['Ename'];
    $Erelation=$_POST['Relation'];
    $Ephone=$_POST['EPhone'];
    $Allergies=$_POST['Allergies'];

    $insert="INSERT INTO patientinfo (userId, FirstName, LastName, Age, Gender, Phone, Location, Height, Weight, Ename, Erelation, Ephone, Allergies)
    VALUES ($Id, '$Fname', '$Lname', $Age, '$Gender', $Phone, '$Location', $Height, $Weight, '$Ename', '$Erelation', '$Ephone', '$Allergies');";
    $result=mysqli_query($conn, $insert);
    if($result){
        echo 'updated sucessfully';
        //  header('location:patient.php');
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
   <input type="text" name="userId" placeholder="User ID"  value="<?php echo $patientId;?>" readonly autocomplete="off"><br><br>
   <input type="text" name="Age" placeholder="Age" autocomplete="off"> 
   <select name="Gender">     
     <option placeholder="male">Male</option>
     <option placeholder="female">Female</option>
   </select> 
   <input type="text" name="Phone" placeholder="Phone" autocomplete="off"><br><br>
   <input type="text" name="Location" placeholder="Location" autocomplete="off"> 
   <input type="text" name="Height" placeholder="Height" autocomplete="off"> 
   <input type="text" name="Weight" placeholder="Weight" autocomplete="off"><br>  
</body>
<body>
    <h4>EMERGENCY CONTACT</h4>
    <input type="" name="Ename" placeholder="Name" autocomplete="off">
    <input type="text" name="Relation" placeholder="Relationship to the person" autocomplete="off"> 
    <input type="text" name="EPhone" placeholder="Their Contact" autocomplete="off"> 
</body>
<body>
    <h5>MEDICAL INFO</h5>
    <input type="text" name="Allergies" placeholder="Any Allergies" autocomplete="off"><br><br>  
    </body>
    
    <button type="submit" name="insert"  class ="form-btn">SUBMIT</button>
    <button><a href="patient.php">BACK</a></button></a>

    </body>
</html>


<style> body {
    background-image: url('background.png.jpg');
    background-size: cover;
    background-position: center;
  }</style>

