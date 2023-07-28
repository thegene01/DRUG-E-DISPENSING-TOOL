<nav>
<?php 
include 'db_conn.php';
session_start();
$Id=$_SESSION['userId'];
$select="SELECT FirstName,LastName FROM patient WHERE userId=$Id;";
$result=mysqli_query($conn, $select);
$row=mysqli_fetch_assoc($result);
$fname=$row['FirstName'];
$lname=$row['LastName'];
?>
<img src="logo.png.jpeg" alt="logo">
<ul>
    <li><a href="patient.php">HOME</a></li>
    <li><a href="#"><?php echo $fname.' '.$lname;?></a></li>
    <li><a href="#"><?php echo $Id;?></a></li>
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

$Id=$_SESSION['userId'];
$sqll="SELECT * FROM patientinfo WHERE userId=$Id";
$resultt= mysqli_query($conn , $sqll);
$row=mysqli_fetch_assoc($resultt);
$Fname=$row['FirstName'];
$Lname=$row['LastName'];
$Id=$row['userId'];
$Age=$row['Age'];
$Gender=$row['Gender'];
$Phone=$row['Phone'];
$Location=$row['Location'];
$Height=$row['Height'];
$Weight=$row['Weight'];
$Ename=$row['Ename'];
$Erelation=$row['Erelation'];
$Ephone=$row['Ephone'];
$Allergies=$row['Allergies'];

if(isset($_POST['update'])){
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

    $update="UPDATE patientinfo SET FirstName='$Fname', LastName='$Lname', Age='$Age', 
    Gender='$Gender', Phone=$Phone, Location='$Location', Height=$Height, 
    Weight=$Weight, Ename='$Ename', Erelation='$Erelation', Ephone='$Ephone', 
    Allergies='$Allergies' WHERE userId=$Id;";
    $result=mysqli_query($conn, $update);
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

   <input type="text" name="Firstname" placeholder="FIRST NAME" value=<?php echo $Fname?> autocomplete="off">  
   <input type="text" name="Secondname" value=<?php echo $Lname?> autocomplete="off"> 
   <input type="text" name="userId" value=<?php echo $Id?> readonly autocomplete="off"><br><br>
   <input type="text" name="Age"  placeholder="ENTER AGE" value=<?php echo $Age?> autocomplete="off"> 
   <select name="Gender">     
     <option value="male">Male</option>
     <option value="female">Female</option>
   </select> 
   <input type="text" name="Phone"  value=<?php echo $Phone?> autocomplete="off"><br><br>
   <input type="text" name="Location"  value="<?php echo $Location?>" autocomplete="off"> 
   <input type="text" name="Height"  value=<?php echo $Height?> autocomplete="off"> 
   <input type="text" name="Weight"  value=<?php echo $Weight?> autocomplete="off"><br>  
</body>
<body>
    <h4>EMERGENCY CONTACT</h4>
    <input type="text" name="Ename" value="<?php echo $Ename ?>" autocomplete="off">
    <input type="text" name="Relation"  value=<?php echo $Erelation?> autocomplete="off"> 
    <input type="text" name="EPhone"  value=<?php echo $Ephone?> autocomplete="off"> 
</body>
<body>
    <h5>MEDICAL INFO</h5>
    <input type="text" name="Allergies" value=<?php echo $Allergies?> autocomplete="off"><br><br>  
    </body>
    
    <button type="submit" name="update"  class ="form-btn">UPDATE</button>

    </body>
    <button><a href="patient.php">BACK</a></button>
</html>


<style> body {
    background-image: url('background.png.jpg');
    background-size: cover;
    background-position: center;
  }</style>
