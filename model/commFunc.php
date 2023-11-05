<?php
     
class commonFunc{
	/* this class contains all the functions necessary to this system */
	public static function saveUser(){
		/* saveUser function is used to save the member details on the database */
		/* data received from the form are assigned to variables */

		$connection = mysqli_connect("localhost","root","","marketing");
	    if (!$connection) {
		die("Connection failed: " . mysqli_connect_error());
	    }

		$name = $_POST['fname'];
		$address = $_POST['lname'];
		$gender = $_POST['email'];
		$date = $_POST['password'];
		$phone = $_POST['phone'];
		$nic = $_POST['nic'];
		$email = $_POST['email'];
		$country = $_POST['country'];

		$pass = $_POST['pass'];
		$username = $_POST['username'];
		

		//Image upload

		$file = rand(1000,100000)."-".$_FILES['photo']['name'];
        $file_loc = $_FILES['photo']['tmp_name'];
		$folder="photos/";

		move_uploaded_file($file_loc,$folder.$file);

		
		//$sql = "INSERT INTO user('name', 'address', 'gender', 'date', 'phone', 'nic', 'email', 'country', 'reading', 'movie', 'other', 'pass', 'username', 'photo') VALUES ('$name','$address', '$gender', '$date', '$phone','$nic','$email', '$country', '$reading', '$movies', '$other', '$pass', '$username', '$file')";
		$sql = "INSERT INTO user (name, address, gender, date, phone, nic, email, country, username, photo) VALUES ('$name','$address', '$gender', '$date', '$phone','$nic','$email', '$country', '$pass', '$username',  '$file');";
		$query = mysqli_query($connection,$sql);

		if($query){
		echo "Successfully saved";
		header( "refresh:3; url=members.php" );
		}else{
		echo "Error";
		header( "refresh:3; url=members.php" );
		}
		mysqli_close($connection);
	}

	public static function deleteUser($id){
		/* deleteUser function is used to delete the member details on the database */
		$connection = mysqli_connect("localhost","root","","marketing");
	    if (!$connection) {
		die("Connection failed: " . mysqli_connect_error());
	    }

		$sql = "DELETE FROM user WHERE (autoid='$id')";
        $query = mysqli_query($connection,$sql);

		if($query){
		echo "Successfully Deleted";
		header( "refresh:3; url=members.php" );
		}else{
		echo "Error";
		header( "refresh:3; url=members.php" );
		}
		mysqli_close($connection);
	}

	public static function selectMember($id){
		/* selectMember function is used to select the member details from the database and show them on the form */
		$connection = mysqli_connect("localhost","root","","marketing");
	    if (!$connection) {
		die("Connection failed: " . mysqli_connect_error());
	    }
		$sql = "SELECT * FROM user WHERE (autoid='$id')";
		$query = mysqli_query($connection,$sql);
		if ($query){
		$userdata = mysqli_fetch_array($query);
		} else {
			echo "Query failed: " . mysqli_error($connection);
		}
		mysqli_close($connection);
	
	}

	public static function updateMember($id){
		/* updateMember function is used to update the member details on the database */
		$connection = mysqli_connect("localhost","root","","marketing");
	    if (!$connection) {
		die("Connection failed: " . mysqli_connect_error());
	    }
		$name = $_POST['name'];
		$address = $_POST['address'];
		$gender = $_POST['gender'];
		$date = $_POST['date'];
		$phone = $_POST['phone'];
		$nic = $_POST['nic'];
		$email = $_POST['email'];
		$country = $_POST['country'];
		$pass = $_POST['pass'];
		$username = $_POST['username'];
		
		

		//Image upload

		$file = rand(1000,100000)."-".$_FILES['photo']['name'];
    $file_loc = $_FILES['photo']['tmp_name'];
		$folder="photos/";

		if($file_size==0||$file_size==null){
			$sql = "UPDATE user SET name ='$name', address = '$address', gender ='$gender', date='$date', phone ='$phone', nic ='$nic', email ='$email', country = '$country', pass = '$pass', username = '$username'  WHERE autoid = '$id'";
		}else{
			move_uploaded_file($file_loc,$folder.$file);
			$sql = "UPDATE user SET name ='$name', address = '$address', gender ='$gender', date='$date', phone ='$phone', nic ='$nic', email ='$email', country = '$country', pass = '$pass', username = '$username', photo = '$file' WHERE autoid = '$id'";
		}

		$query = mysqli_query($connection,$sql);
		
		if($query){
		echo "<font color=#00FF00'>Successfully Updated</font>";
		header( "refresh:3; url=members.php" );
		}else{
		echo "Error";
		header( "refresh:3; url=members.php" );
		}
		mysqli_close($connection);

	}

	public static function reportGen(){
		/* reportGen function is used to generate report about the members */
		$connection = mysqli_connect("localhost","root","","marketing");
	    if (!$connection) {
		die("Connection failed: " . mysqli_connect_error());
	    }
		$sql = "SELECT * FROM user";
	    $result = mysqli_query($connection,$sql);
        
		if ($result){
		while ($row = $result->fetch_assoc()) {
								 echo "<tr>";
								 echo "<td>".$row['name']."</td>";
								 echo "<td>".$row['address']."</td>";
								 echo "<td>".$row['gender']."</td>";
								 echo "<td>".$row['date']."</td>";
								 echo "<td>".$row['phone']."</td>";
								 echo "<td>".$row['nic']."</td>";
								 echo "<td>".$row['email']."</td>";
								 echo "<td>".$row['country']."</td>";
								 echo "<td><img src='photos/".$row['photo']."' width = '100px' alt='No Image'/></td>";
								 echo "</tr>";
						 }
				 }
		 mysqli_close($connection);
	
	}

	public static function memberTable(){
		/* memberTable function is used to display member on a table */
		$connection = mysqli_connect("localhost","root","","marketing");
	    if (!$connection) {
		die("Connection failed: " . mysqli_connect_error());
	    }
		$sql = "SELECT * FROM user";
		$result = mysqli_query($connection, $sql);

		if ($result) {
		while ($row = $result->fetch_assoc()) {
								 echo "<tr>";
								 echo "<td>".$row['autoid']."</td>";
								 echo "<td>".$row['name']."</td>";
								 echo "<td>".$row['address']."</td>";
								 echo "<td>".$row['gender']."</td>";
								 echo "<td>".$row['phone']."</td>";
								 echo "<td>".$row['nic']."</td>";
								 echo "<td>".$row['email']."</td>";
								 echo "<td><button type='submit' name='select' value='".$row['autoid']."'>Edit</button></td>";
								 echo "<td><button type='submit' name='delete' value='".$row['autoid']." '>Delete</button></td>";
								 echo "</tr>";
						 }
					}
		mysqli_close($connection);

	}

}

?>
