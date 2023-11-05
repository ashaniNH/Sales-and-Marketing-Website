


<?php
session_start();
session_destroy(); // Destroy all session data
header("Location: logout.php"); // Redirect to your login page
exit;
?>
<!DOCTYPE html>
<html>
<head>
    <title>Logout</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            text-align: center;
        }
        .logout-container {
            background-color: #fff;
            border-radius: 8px;
            padding: 20px;
            width: 300px;
            margin: 0 auto;
            margin-top: 100px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
        }
        h1 {
            color: #333;
        }
        p {
            color: #777;
        }
        .logout-button {
            background-color: #4a98f7;
            color: #fff;
            border: none;
            padding: 10px 15px;
            text-decoration: none;
            cursor: pointer;
            border-radius: 5px;
        }
    </style>
</head>
<body>
    <div class="logout-container">
        <h1>Logout</h1>
        <p>You have been logged out successfully.</p>
        <a href="login.php" class="logout-button">Log In</a>
    </div>
</body>
</html>
