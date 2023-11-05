<?php require_once('database/dbconnect.php'); ?> 

<!DOCTYPE html>
<html>
<head>
    <title>sales</title>
    <link rel="stylesheet" type="text/css" href="newadmin.css">    
    <script type="text/javascript" src="js/register.js"></script>

</head>
<body>
<center>
        <!--------------------------------->
        <!--form go to the registerdb.php-->
        <!--------------------------------->
        <form action="newadmindb.php" method="POST">
            <h1>Make New Admin</h1>
            <br><br>
            <label for="fname">First Name:</label>
            <input type="text" id="fname" name="fname" placeholder="Enter your first name" required>
            <label for="lname">Last Name:</label>
            <input type="text" id="lname" name="lname" placeholder="Enter your last name" required>
            <label for="lname">Username:</label>
            <input type="text" id="uname" name="username" placeholder="Pick a username" required>
            <label for="gender">Gender:</label><br>
        <input type="radio" id="male" name="gender" value="male">
        <label for="male">Male</label><br>
        <input type="radio" id="female" name="gender" value="female">
        <label for="female">Female</label><br>
             <label for="lname">Phone Number:</label>
            <input type="text" id="mobile" name="phonenumber" placeholder="+94" required>
            <label for="lname">Email:</label>
            <input type="text" id="emailAdd" name="email" pattern="[a-zA-Z0-9._%+-#]+@[a-z0-9]+\.[a-z]{2,3}"placeholder="example@gmail.com"required>
            <label for="lname">Address:</label>
            <textarea id="address" name="address"placeholder="Enter your permanet address"required></textarea>
            <label for="lname">Password:</label>
            <label>Role:
            <select name="role">
                <option value="admin">admin</option>
                <option value="user">user</option>
            </select>
        </label><br><br>
            <input type="Password" id="pw" name="password"pattren="[a-zA-Z0-9]{5,8}"placeholder="Enter your password"required>
            <label for="lname">Accept privace policy terms</label>
            <input type="checkbox" id="policy" name="policy"  onclick="enableButton()">
            <input type="submit" value="Submit Details" id="Register_btn1"  name="newadmin" onclick="show_alert();">

        </form>
        </center>
</body>
</html>