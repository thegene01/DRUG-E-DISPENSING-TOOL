<!DOCTYPE html>
<html>
<head>
<a href="../LANDING PAGE /index.php">
    <img src="home.png" alt="Home" />
</a>
    <title>LOGIN</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            padding: 20px;
        }

        .form-container {
            max-width: 400px;
            margin: 0 auto;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
            border-radius: 5px;
        }

        .form-container h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        .form-container label {
            font-size: 16px;
            font-weight: bold;
        }

        .form-container select,
        .form-container input[type="text"],
        .form-container input[type="password"] {
            width: 95%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 14px;
        }

        .form-container .error {
            color: red;
            font-size: 14px;
            margin-bottom: 15px;
        }

        .form-container button {
            background-color: #088F8F;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            font-size: 14px;
            margin-right: 10px;
        }

        .form-container button a {
            color: white;
            text-decoration: none;
        }

        .form-container button[type="submit"] {
            float: left;
        }

        .form-container button[type="submit"]:hover {
            background-color: #077F7F;
        }

        .form-container button[type="button"] {
            float: right;
            background-color: #ccc;
        }

        .form-container button[type="button"]:hover {
            background-color: #077F7F;
        }
    </style>
</head>
<body>
    <div class="form-container">
        <h2>LOGIN</h2>
        <form method="POST" action="login.php">
            <label>Select a role</label><br><br>
            <select name="option">
                <option value="admin">ADMIN</option>
                <option value="patient">Patient</option>
                <option value="doctor">Doctor</option>
                <option value="pharmacist">Pharmacist</option>
                <option value="pharmaceutical_company">Pharmaceutical Company</option>
            </select><br>

            <?php if (isset($_GET['error'])) { ?>
                <p class='error'><?php echo $_GET['error']; ?></p>
            <?php } ?>

            <label>User ID</label>
            <input type="text" name="uname" placeholder="User id" autocomplete="off"><br>
            <label>User Password</label>
            <input type="password" name="password" placeholder="Password" autocomplete="off"><br>

            <button type="submit">Login</button>
        </form>
        <a href="register.php"><button>Sign Up</button></a>
    </div>

</body>
</html>
