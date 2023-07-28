<?php
session_start();

if (isset($_SESSION['userPass']) && isset($_SESSION['userId'])) {
    include "db_conn.php";
    $sqll = "SELECT * FROM pharmacistinfo WHERE userId=$_SESSION[userId]";
    $resultt = mysqli_query($conn, $sqll);

    if(mysqli_num_rows($resultt)< 1){    
    
    $sql = "SELECT * FROM pharmacist WHERE userId=$_SESSION[userId]";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    $Fname = $row['FirstName'];
    $Lname = $row['LastName'];
    $Id = $row['userId'];}
    $Age = 'INSERT DATA';
    $Gender = 'INSERT DATA';
    $Phone = 'INSERT DATA';
    $Speciality = 'INSERT DATA';

    if(mysqli_num_rows($resultt)> 0){
    
    $row = mysqli_fetch_assoc($resultt);
    $Fname = $row['FirstName'];
    $Lname = $row['LastName'];
    $Id = $row['userId'];
    $Age = $row['Age'];
    $Gender = $row['Gender'];
    $Phone = $row['Phone'];
    $Speciality = $row['Speciality'];


    }


?>

<!DOCTYPE html>
<html>
<head>
    <title>HOME</title>
    <style>
        body {
            background-image: url('background.png.jpg');
            background-size: cover;
            background-position: center;
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
        }

        h3, h4, h5 {
            color: #088F8F;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        th, td {
            padding: 10px;
            text-align: left;
            border-bottom: 1px solid #ccc;
        }

        th {
            background-color: #088F8F;
            color: white;
        }

        button {
            background-color: #088F8F;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
        }

        button a {
            color: white;
            text-decoration: none;
        }

        button:hover {
            background-color: #077F7F;
        }
    </style>
</head>
<body>
    
    <h3>PHARMACIST INFO</h3>

    <table>
        <tr>
            <th>Field</th>
            <th>Data</th>
        </tr>
        <tr>
            <td>Name</td>
            <td><?php echo $Fname . ' ' . $Lname; ?></td>
        </tr>
        <tr>
            <td>User ID</td>
            <td><?php echo $Id; ?></td>
        </tr>
        <tr>
            <td>Age</td>
            <td><?php echo $Age; ?></td>
        </tr>
        <tr>
            <td>Gender</td>
            <td><?php echo $Gender; ?></td>
        </tr>
        <tr>
            <td>Phone</td>
            <td><?php echo $Phone; ?></td>
        </tr>



        <tr>
            <td>SPECIALITY</td>
            <td>
                 <?php echo $Speciality; ?><br>

            </td>
        </tr>

    </table>

    

    <button><a href="editpharmacistinfo.php?pharmacistId=<?php echo $_SESSION['userId']?>">EDIT</a></button>
    <button><a href="insertpharmacistinfo.php?pharmacistId=<?php echo $_SESSION['userId']; ?>">INSERT</a></button>
</body>
</html>

<?php
}
?>
