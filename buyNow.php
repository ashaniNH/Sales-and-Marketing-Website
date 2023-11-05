<?php require_once('database/dbconnect.php'); ?>

<?php
session_start();

$user_id = $_SESSION['id'];
$product_id = $_GET["i"];

$qur = "INSERT INTO purchase_details (product_id, id) VALUES ('$product_id', '$user_id')";

$result = mysqli_query($conn, $qur);

if ($result) {
    $_SESSION['purchase_success'] = true; // Set a success message in a session variable
    header("Location: product.php");
    exit();
} else {
    echo "Buying failed";
}
?>
