<?php require_once('database/dbconnect.php') ?>

<htmL>
	<head>
		<title>Login</title>
        <link rel="stylesheet" href="index.css">
        <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Navigation Bar with Search Box</title>
    <link rel="stylesheet" href="homepage.css" />
    <!-- Unicons CSS -->
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css" />
   <script src="homePage.js" defer></script></head>
        <body>
    <nav class="nav">
      <i class="uil uil-bars navOpenBtn"></i>
      <a href="home.php" class="logo">Home</a>

      <ul class="nav-links">
        <i class="uil uil-times navCloseBtn"></i>
        <li><a href="contactus.php">Contact Us</a></li>
        <li><a href="index.php">Login</a></li>
      </ul>
    </nav>
  </body>
  


  <div class="container">
    <input type="checkbox" id="check">
    <div class="login form">
      <header>Login</header>
      <form id="interface" action="index.php" method="post">
        <input type="text" placeholder="Enter your username" id="uname" name="uname" required />
        <input type="password" placeholder="Enter your password" id="pass" name="pass" required/>
        <input type="submit"  name="login" class="button"  onclick="login()" value="Login">
      </form>
      <div class="signup">
        <span class="signup">Don't have an account?
         <label for="check"><a href="register.php">Signup</a></label>
        </span>
      </div>
    </div>

<script type="text/javascript">
  function signup(){
    window.location("register.php");
  }
    function login() {
      var name = document.getElementById("uname").value;
      var password = document.getElementById("pass").value;

      if (name == null || name.trim() === "") {
        alert("Please enter your Name!");
      } else if (password == null || password == "") {
        alert("Please Enter your Password!");
      } else if (password.length < 3) {
        alert("Password should contain at least 6 characters!");
      } else {
        window.location.href = "home.php";
      }
    }

  </script>
<?php
if(isset($_POST["login"])){
$username=$_POST["uname"];
$password=$_POST["pass"];
$query = "SELECT id, password FROM user WHERE username = '$username' && password='$password'";
                $result = $conn->query($query);

                if ($result->num_rows == 1) {
                    $row = $result->fetch_assoc();
                    $hashedPassword = $row['password'];
                    session_start();
                    $_SESSION['id']=$row['id'];
        
        
                    if ($password === $hashedPassword) {
                    // Password is correct, user is authenticated
                        session_start();
                        $_SESSION['user_id'] = $row['id']; // Store user ID in the session
                            ////////////////////////////////////////////////////////////////////////
                            ///////////////////////// role query ////////////////////////////////////
                        $query = "SELECT role FROM user WHERE username = '$username' AND password = '$hashedPassword';";

                         $result = $conn->query($query);

                         $row = $result->fetch_assoc();

                        $userRole = $row['role'];
            
                        // After successful login
                         if ($userRole === 'admin') {
                        // Redirect to the admin dashboard
                            header('Location: admin_view.php');
                        } elseif ($userRole === 'user') {
                        // Redirect to the user dashboard
                             header('Location: home.php');
                        } else {
                        // Handle unauthorized access
                             echo 'Unauthorized access';
                        }
           
            
                    } else {
                        // Password is incorrect
            
                        $errorMessage = "Password is incorrect. Please try again.";
                    }
                } else {
                     // Username not found
                     $errorMessage = "Password is incorrect. Please try again.";
        
            }
    
        }
        
?>

 <?php if (isset($errorMessage)) { ?>
    <center><p style="color: red; font-size:larger"><?php echo $errorMessage; ?></p></center>
<?php } ?>
	</body>
</htmL>
