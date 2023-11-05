<?php
include_once('database/dbconnect.php');

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['id'])) {
    $id = $_GET['id'];

    

    // Perform the deletion
    $query = "DELETE FROM user WHERE id = $id";
    if ($conn->query($query) === TRUE) {
        header("Location: admin_view.php");
        echo "Error test user: ";
    } else {
        echo "Error deleting user: " . $conn->error;
    }

    $conn->close();
} else {
    echo "Invalid request or missing UserID.";
}
?>
