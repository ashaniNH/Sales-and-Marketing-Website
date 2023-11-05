<?php require_once('database/dbconnect.php'); ?> 

<!DOCTYPE html>
<html>

<head>

    <title>sales</title>
  
    <link rel="stylesheet" href="homepage.css">   
    
    <script type="text/javascript" src="js/register.js"></script>

</head>



<body id="mainBody">

    <header class="head">

        <div class="TopNavigation">
            
            <ul class="navbar1_left">
                <li class="li_left_C"><a href="index.php">Log In</a></li>
                <li class="li_left_C"><a href="register.php"></a></li>
            </ul>
            
        </div>
    </header>

<center>
        <br>
            
        <div class="form1">
            <br>
        <!--------------------------------->
        <!--form go to the registerdb.php-->
        <!--------------------------------->
        <form action="registerdb.php" method="POST">
            <h1 style="color:  gold"> <i>
            <b>Registration Form</b> </i> </h1>
            <br><br>
            <label></label>
            First Name<br>
            <input type="text" id="fname" name="fname" style="width: 500px" placeholder="Enter your first name" required><br><br>
            Last Name<br>
            <input type="text" id="lname" name="lname" style="width: 500px" placeholder="Enter your last name" required><br><br>
            Username<br>
            <input type="text" id="uname" name="username" style="width: 500px" placeholder="Pick a username" required><br><br>
            Gender<br>
            
             <label class="radio-inline"><input type="radio" id="gender" name="gender" value="male" checked>male</label>
             <label class="radio-inline"><input type="radio" id="gender" name="gender" value="female">female</label><br>
             
             <br>
            Phone Number<br>
            <input type="text" id="mobile" name="phonenumber" style="width: 500px" placeholder="+94" required><br><br>
            Email Address<br>
            <input type="text" id="emailAdd" name="email" style="width: 500px" pattern="[a-zA-Z0-9._%+-#]+@[a-z0-9]+\.[a-z]{2,3}"placeholder="example@gmail.com"required><br><br>
            Address<br>
            <textarea id="address" name="address" rows="10" cols="50" style="width: 500px"placeholder="Enter your permanet address"required></textarea><br><br>
            Password<br>
            <input type="Password" id="pw" name="password" style="width: 600px"pattren="[a-zA-Z0-9]{5,8}"placeholder="Enter your password"required><br><br>
            Accept privace policy terms
            <input type="checkbox" id="policy" name="policy"  onclick="enableButton()"><br><br>
            
            <input type="submit" value="Submit Details" id="Register_btn1"  name="register" onclick="show_alert();">
        
            <br><br><br>
        </form>
        </div>
        </center>


 

</body>

</html>