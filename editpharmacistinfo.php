<nav>

<img src="/login-system/logo.png.jpeg" alt="logo">


</nav>

<style>
    nav {
        background: #088F8F;
        /* width: 100%;
        padding: 5px 3%; */
        display: flex;
        height: 80px;
        align-items: center;
        justify-content: space-between;
        position: relative;
        }
    img[alt="logo"]{
        height: 50px;
        width: 50px;
        padding-left: 2%;
        border-radius: 50%;
    } 
    img[alt="profile"]{
        height: 50px;
        width: 50px;
        padding-right: 2%;
        border-radius: 50%;
    } 
    nav ul{
        width: 100%;
        text-align: right;
    }
    nav ul li{
        display: inline-block;
        list-style: none;
        margin: 10px 20px;
    }
    nav ul li a{
        color: whitesmoke;
        text-decoration: none;
    }
</style>

<?php
include 'db_conn.php';
$doctorId=$_GET['pharmacistId'];

$sqll="SELECT * FROM pharmacistinfo WHERE userId=$doctorId";
$resultt= mysqli_query($conn , $sqll);
if(mysqli_num_rows($resultt) < 1){
$select="SELECT * FROM pharmacist WHERE userId=$doctorId";
$resulttt=mysqli_query($conn, $select);
$row=mysqli_fetch_assoc($resulttt);
$Fname=$row['FirstName'];
$Lname=$row['LastName'];
$Id=$row['userId'];
}
$Age='NILL';
$Gender='NILL';
$Phone='NILL';
$Speciality='NILL';
if(mysqli_num_rows($resultt) > 0){
$row=mysqli_fetch_assoc($resultt);
$Fname=$row['FirstName'];
$Lname=$row['LastName'];
$Id=$row['userId'];
$Age=$row['Age'];
$Gender=$row['Gender'];
$Phone=$row['Phone'];
$Speciality=$row['Speciality'];
}
if(isset($_POST['update'])){
    $Fname=$_POST['Firstname'];
    $Lname=$_POST['Secondname'];
    $Id=$_POST['userId'];
    $Age=$_POST['Age'];
    $Gender=$_POST['Gender'];
    $Phone=$_POST['Phone'];
    $Speciality=$_POST['Speciality'];


    $update="UPDATE pharmacistinfo SET FirstName='$Fname', LastName='$Lname', Age='$Age', 
    Gender='$Gender', Phone=$Phone, Speciality='$Speciality'WHERE userId=$Id;";
    $result=mysqli_query($conn, $update);
    if($result){
        //echo 'updated sucessfully';
        header('location:pharmacist.php');
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

   <input type="text" name="Firstname" value=<?php echo $Fname?> autocomplete="off">  
   <input type="text" name="Secondname" value=<?php echo $Lname?> autocomplete="off"> 
   <input type="text" name="userId" value=<?php echo $Id?> autocomplete="off"><br><br>
   <input type="text" name="Age" value=<?php echo $Age?> autocomplete="off"> 
   <select name="Gender">     
     <option value="male">Male</option>
     <option value="female">Female</option>
   </select> 
   <input type="text" name="Phone" value=<?php echo $Phone?> autocomplete="off"><br><br>

</body>
<body>
    <h4>SPECIALITY</h4>
    <input type="text" name="Speciality" value="<?php echo $Speciality ?>" autocomplete="off">

</body><br><br>

    
    <button type="submit" name="update"  class ="form-btn">UPDATE</button>
    <button><a href="pharmacist.php">BACK</a></button></a>
    
</html>


<style> body {
    background-image: url('background.png.jpg');
    background-size: cover;
    background-position: center;
  }</style>