<?php
session_start(); 
require_once('database/dbconnect.php');
include('navBar.php');


$query = "SELECT * FROM product_details ORDER BY product_type ASC";

$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Product List</title>
    <link rel="stylesheet" href="productListStyle.css" />
</head>
<body>

<h1>Product List</h1>
<div class="product-container">
    <?php
    if ($result) {
        $counter = 0;
        while ($row = mysqli_fetch_array($result)) {
          $id=$row['product_id'];
          // echo $row;
          echo '<div class="card">';
          echo '<img src="' . $row["image_url"] . '" alt="Image" style="width:100%">';
          echo '<h3>' . $row["product_name"] . '</h3>';
          echo '<p class="price">Rs. ' . $row["price"] . '</p>';
        //   echo '<p class="qty">Qty: ' . $row["quantity"] . '</p>';
          echo '<p><button><a href="buyNow.php?i=' . $id . '">Buy Now</a></button></p>';
          echo '</div>';
          
          $counter++;
          
          if ($counter % 5 == 0) {
            echo '<div class="row"></div>';
          }
        }
    }
    ?>
</div>
</body>
</html>


<script>
    function buyNow(i){
        alert("")
        window.location="buyNow.php?i="+i;
    }
</script>

<script>
    // Check if the purchase_success session variable is set
    <?php
    if (isset($_SESSION['purchase_success']) && $_SESSION['purchase_success']) {
        echo 'alert("Successfully buy your item");';
        unset($_SESSION['purchase_success']); // Reset the session variable
    }
    ?>
</script>
