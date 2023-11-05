<?php
require_once('database/dbconnect.php');

session_start();
$_SESSION['role'] = 'admin';

if (isset($_SESSION['role']) && $_SESSION['role'] === 'admin') {
    if (isset($_POST['addproduct'])) {
        $productname = $_POST['product_name'];
        $producttype = $_POST['product_type'];
        $price = $_POST['price'];
        $quantity = $_POST['quantity'];

        if (isset($_FILES['my_image']) && $_FILES['my_image']['error'] === UPLOAD_ERR_OK) {
            $file_name = $_FILES['my_image']['name'];
            $file_tmp_name = $_FILES['my_image']['tmp_name'];
            $file_destination = "upload/" . $file_name;

            if (move_uploaded_file($file_tmp_name, $file_destination)) {
                $image_url = $file_destination;

                $query = "INSERT INTO product_details (product_name, product_type, price, quantity, image_url) VALUES ('$productname', '$producttype', '$price', '$quantity', '$image_url')";
                $result = mysqli_query($conn, $query);

                if ($result) {
                    $_SESSION['product_added'] = true;
                    header("Location: admin_view.php");
                    exit();
                } else {
                    echo "<script>alert('Not Saved Your Details')</script>";
                }
            } else {
                echo "<script>alert('Failed to upload the image')</script>";
            }
        } else {
            $errorCode = $_FILES['my_image']['error'];
            $errorMessage = "File Upload Error (Error code: $errorCode)";
            echo "<script>alert('No file uploaded or file upload error')</script>";
        }
    }
} else {
    echo "<script>alert('You do not have permission to add products. Please log in as an admin.')</script>";
}
?>