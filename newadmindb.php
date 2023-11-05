<?php require_once('database/dbconnect.php'); ?>

<?php
	if(isset($_POST['newadmin'])){
		$fname = $_POST['fname'];
		$lname = $_POST['lname'];
		$username =$_POST['username'];
		$gender = $_POST['gender'];
		$phonenumber = $_POST['phonenumber'];
		$email = $_POST['email'];
		$address =$_POST['address'];
		$password = $_POST['password'];
        $role = $_POST['role'];
		///////////////////////////////////////////////////////////////////////////////////////
		////////////////////////////for enter the details in users table  ////////////////////
		//////////////////////////////////////////////////////////////////////////////////////
		$query = "INSERT INTO user (username, Email, `password`, Fname, Lname, Gender, PhoneNumber, `Address`, role) VALUES ('$username', '$email', '$password', '$fname' , '$lname' , '$gender' , '$phonenumber', '$address', '$role')";
		$result = mysqli_query($conn,$query);

		if($result){
              header("Location:admin_view.php");
            exit();
          
            }
        else{
            echo"<script>alert('Not Saved Your Details')</script>";
        }
	}

?>
