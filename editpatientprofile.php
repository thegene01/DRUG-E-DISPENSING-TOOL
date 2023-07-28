<?php
session_start();

if(isset($_SESSION['userPass'])&& isset($_SESSION['userId'])){
include  "db_conn.php";
$sqll="SELECT * FROM patientinfo WHERE userId=$_SESSION[userId]";
$resultt= mysqli_query($conn , $sqll);}
?>

<!DOCTYPE html>
<html>
    <head></head>
    <body>
    <h3>PERSONAL INFO</h3>
    <?php while ($row=mysqli_fetch_assoc($resultt)){?>

   <input type='text' name="Firstname" placeholder=<?php echo $row['FirstName']?>>  <input type="text" name="Secondname" placeholder=<?php echo $row['LastName']?>> <input type="text" name="userId" placeholder=<?php echo $row['userId']?>><br><br>
   <p>Enter Age</p>
   <input type="text" name="Age" placeholder=<?php echo $row['Age']?>> <select name="Gender">     
     <option value="male">Male</option>
     <option value="female">Female</option>
     </select>
     <p>Enter Location</p>
      <input type="text" name="Phone" placeholder=<?php echo $row['Phone']?>><br><br>
   <input type="text" name="Location" placeholder=<?php echo $row['Location']?>> <input type="text" name="Height" placeholder=<?php echo $row['Height']?>> <br>  
</body>
<body>
    <h4>EMERGENCY CONTACT</h4>
    <input type="" name="Ename" placeholder=<?php echo $row['Ename']?>> <input type="text" name="Relation" placeholder=<?php echo $row['Erelation']?>> <input type="text" name="Phone" placeholder=<?php echo $row['Ephone']?>> 
</body>
<body>
    <h5>MEDICAL INFO</h5>
    <input type="text" name="Allergies" placeholder=<?php echo $row['Allergies']?>><br><br>  
    </body>
    <?php 
    }
    ?>
    </body>
</html>