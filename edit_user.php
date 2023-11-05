<?php
include_once('./database/dbconnect.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Handle the form submission to update the user
    $id = $_POST['id'];
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $email = $_POST['email']; // Fix the variable name
    $password = $_POST['password'];
    $username = $_POST['username'];
    $phonenumber = $_POST['phonenumber']; // Fix the variable name
    $gender = $_POST['gender'];
    $address = $_POST['address'];
    $role = $_POST['role'];

    // You should hash the password securely, for example, using password_hash

    $query = "UPDATE user SET Username = '$username', Email = '$email', Password = '$password', role = '$role', 
    Fname = '$fname', Lname = '$lname', Address = '$address',
    PhoneNumber = '$phonenumber', Gender = '$gender' WHERE id = '$id'";

    if ($conn->query($query) === TRUE) {
        header('Location: admin_view.php');
    } else {
        echo "Error updating user: " . $conn->error;
    }
} else {
    // Display the form to edit the user details
    $id = $_GET['id'];

    $query = "SELECT * FROM user WHERE id = $id";
    $result = $conn->query($query);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $lname = $row['Lname'];
        $fname = $row['Fname'];
        $username = $row['username'];
        $email = $row['Email'];
        $gender = $row['Gender'];
        $phonenumber = $row['PhoneNumber'];
        $address = $row['Address'];
        $password = $row['password'];
        $role = $row['role'];
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit User</title>
    <link rel="stylesheet" href="newadmin.css" />
</head>
<body>
    <h1>Edit User</h1>
    <form method="post">
        <input type="hidden" name="id" value="<?php echo $id; ?>">
        <label>First Name:<input type="text" name="fname" value="<?php echo $fname; ?>"></label><br><br>
        <label>Last Name:<input type="text" name="lname" value="<?php echo $lname; ?>"></label><br><br>
        <label>Username: <input type="text" name="username" value="<?php echo $username; ?>" required></label><br><br>
        <label>Gender: 
            <input type="radio" name="gender" value="male" <?php if ($gender === 'Male') echo 'checked'; ?>>male
            <input type="radio" name="gender" value="female" <?php if ($gender === 'Female') echo 'checked'; ?>>female
        </label><br><br>
        <label>Phone Number: <input type="text" name="phonenumber" value="<?php echo $phonenumber; ?>" required></label><br><br>
        <label>Email: <input type="email" name="email" value="<?php echo $email; ?>"></label><br><br>
        <label>Address: <input type="text" name="address" value="<?php echo $address; ?>"></label><br><br>
        <label>Password: <input type="password" name="password" placeholder="New Password" value="<?php echo $password; ?>"></label><br><br>
        <label>Role:
            <select name="role">
                <option value="admin" <?php if ($role === 'admin') echo 'selected'; ?>>admin</option>
                <option value="user" <?php if ($role === 'user') echo 'selected'; ?>>user</option>
            </select>
        </label><br><br>

        <input type="submit" value="Update User">
    </form>
</body>
</html>
