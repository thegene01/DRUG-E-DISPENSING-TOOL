<?php
include 'db_conn.php';
$presId=$_GET['presId'];
$select="SELECT * FROM prescriptions WHERE presId=$presId;";
$result=mysqli_query($conn, $select);
$row=mysqli_fetch_assoc($result);
 $presId= $row['presId']; 
 $userId= $row['userId']; 
 $PName= $row['PName']; 
 $DName= $row['DName']; 
 $Did= $row['Did']; 
 $Prescription= $row['Prescription']; 
 $Date= $row['Date']; 

 if(mysqli_num_rows($result) > 0){
   $selectt="SELECT * FROM orderprescriptions WHERE presId=$presId;";
   $resultt=mysqli_query($conn, $selectt);
   if (mysqli_num_rows($resultt) < 1){
    $insert="INSERT INTO orderprescriptions (presId, userId, PName, DName, Did, Prescription, Date)
    VALUES ($presId, $userId, '$PName', '$DName', $Did, '$Prescription', '$Date');";
    $resulttt=mysqli_query($conn, $insert);
   }
   if (mysqli_num_rows($resultt) > 0){
      $error[] = 'Order already Made!!'; 
      
      // header('location:patientprescriptions.php');
     }
 }
 if($resulttt){
    //  echo 'succeful';
    header('location:patientprescriptions.php');
}

?>