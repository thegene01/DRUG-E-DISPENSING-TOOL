<nav>
    <?php 
    session_start();
    include 'db_conn.php';
$doctorId=$_SESSION['userId'];

$select="SELECT * FROM doctorinfo WHERE userId=$doctorId";
$resulttt=mysqli_query($conn, $select);
$row=mysqli_fetch_assoc($resulttt);

$Fname=$row['FirstName'];
$Lname=$row['LastName'];
$Id=$row['userId'];
$Age=$row['Age'];
$Gender=$row['Gender'];
$Phone=$row['Phone'];
$Speciality=$row['Speciality'];
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


if(isset($_POST['update'])){
    $Fname=$_POST['Firstname'];
    $Lname=$_POST['Secondname'];
    $Id=$_POST['userId'];
    $Age=$_POST['Age'];
    $Gender=$_POST['Gender'];
    $Phone=$_POST['Phone'];
    $Speciality=$_POST['Speciality'];


    $update="UPDATE doctorinfo SET FirstName='$Fname', LastName='$Lname', Age='$Age', 
    Gender='$Gender', Phone=$Phone, Speciality='$Speciality'WHERE userId=$Id;";
    $result=mysqli_query($conn, $update);
    if($result){
        // echo 'updated sucessfully';
        header('location:doctor.php');
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
   <input type="text" name="userId" value=<?php echo $Id?> readonly autocomplete="off"><br><br>
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
    <button><a href="doctor.php">BACK</a></button></a>
    
</html>


<style> body {
    background-image: url('background.png.jpg');
    background-size: cover;
    background-position: center;
  }</style>