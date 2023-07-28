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
$pcompanyId=$_GET['pcompanyId'];

$sqll="SELECT * FROM pcompanyinfo WHERE userId=$pcompanyId";
$resultt= mysqli_query($conn , $sqll);
if(mysqli_num_rows($resultt) < 1){
$select="SELECT * FROM pharmaceutical_company WHERE userId=$pcompanyId";
$resulttt=mysqli_query($conn, $select);
$row=mysqli_fetch_assoc($resulttt);
$Fname=$row['FirstName'];
$Lname=$row['LastName'];
$Id=$row['userId'];
}
$email='NILL';
$location='NILL';
$Phone='NILL';
if(mysqli_num_rows($resultt) > 0){
$row=mysqli_fetch_assoc($resultt);
$Fname=$row['Fname'];
$Lname=$row['Lname'];
$Id=$row['userId'];
$email=$row['email'];
$location=$row['location'];
$Phone=$row['Phone'];
}

if(isset($_POST['update'])){
    $Fname=$_POST['Firstname'];
    $Lname=$_POST['Secondname'];
    $Id=$_POST['userId'];
    $email=$_POST['email'];
    $location=$_POST['location'];
    $Phone=$_POST['Phone'];
  


    $update="UPDATE pcompanyinfo SET Fname='$Fname', Lname='$Lname', email='$email', 
    location='$location', Phone=$Phone WHERE userId=$Id;";
    $result=mysqli_query($conn, $update);
    if($result){
        // echo 'updated sucessfully';
        header('location:pharmaceutical_company.php');
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
   <input type="text" name="email" value=<?php echo $email?> autocomplete="off"> 
   <input type="text" name="location" value=<?php echo $location?> autocomplete="off"> 
   <input type="text" name="Phone" value=<?php echo $Phone?> autocomplete="off"><br><br>
   <button type="submit" name="update"  class ="form-btn">UPDATE</button>
   <button><a href="pharmaceutical_company.php">BACK</a></button>
</form>

</body> 
</html>


<style> body {
    background-image: url('background.png.jpg');
    background-size: cover;
    background-position: center;
  }</style>