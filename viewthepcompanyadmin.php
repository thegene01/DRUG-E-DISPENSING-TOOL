

<style>
    nav {
        background: #088F8F;
        display: flex;
        align-items: center;
        justify-content: space-between;
        position: relative;
    }
    img[alt="logo"] {
        height: 50px;
        width: 50px;
        padding-left: 2%;
        border-radius: 50%;
    }
    img[alt="profile"] {
        height: 50px;
        width: 50px;
        padding-right: 2%;
        border-radius: 50%;
    }
    nav ul {
        width: 100%;
        text-align: right;
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
</style>

<?php
session_start();


    include "db_conn.php";
    $id=$_GET['pcompanyId'];
    $sqll = "SELECT * FROM pcompanyinfo WHERE userId=$id";
    $resultt = mysqli_query($conn, $sqll);

    if(mysqli_num_rows($resultt)< 1){    
    
    $sql = "SELECT * FROM pharmaceutical_company WHERE userId=$id";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    $Fname = $row['FirstName'];
    $Lname = $row['LastName'];
    $Id = $row['userId'];}
    $email = 'NILL';
    $location = 'NILL';
    $Phone = 'NILL';
    

    if(mysqli_num_rows($resultt)> 0){
    
    $row = mysqli_fetch_assoc($resultt);
    $Fname = $row['Fname'];
    $Lname = $row['Lname'];
    $Id = $row['userId'];
    $email = $row['email'];
    $location = $row['location'];
    $Phone = $row['Phone'];
   


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
    <h3>PHARMACEUTICAL COMPANY INFO</h3>

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
            <td>email</td>
            <td><?php echo $email; ?></td>
        </tr>
        <tr>
            <td>location</td>
            <td><?php echo $location; ?></td>
        </tr>
        <tr>
            <td>Phone</td>
            <td><?php echo $Phone; ?></td>
        </tr>





    </table>

    

    <button><a href="viewpcompanysadmin.php">BACK</a></button>
    <button><a href="deletepcompany.php?pcompanyId=<?php echo $Id; ?>">DELETE</a></button>
</body>
</html>

