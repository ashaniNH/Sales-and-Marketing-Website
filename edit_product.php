<?php
include_once('./database/dbconnect.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Handle the form submission to update the product
    $productid = $_POST['product_id'];
    $productname = $_POST['productname'];
    $producttype = $_POST['producttype'];
    $price = $_POST['price'];
    $quantity = $_POST['quantity'];

    $query = "UPDATE product_details SET product_name = '$productname', product_type = '$producttype', price = '$price', quantity = '$quantity' WHERE product_id = '$productid'";

    if ($conn->query($query) === TRUE) {
        header('Location: admin_view.php');
    } else {
        echo "Error updating product: " . $conn->error;
    }
} else {
    // Display the form to edit the product details
    $productid = $_GET['id'];

    $query = "SELECT * FROM product_details WHERE product_id = $productid";
    $result = $conn->query($query);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $productname = $row['product_name'];
        $producttype = $row['product_type'];
        $price = $row['price'];
        $quantity = $row['quantity'];
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Product</title>
    <link rel="stylesheet" type="text/css" href="edit_product.css">

</head>
<body>
    <h1>Edit Product</h1>

    <form method="post">
        <input type="hidden" name="product_id" value="<?php echo $productid; ?>">
        <label for="productName">Product Name:</label>
        <input type="text" name="productname" value="<?php echo $productname; ?>"><br><br>

        <label for="price">Price:</label>
        <input type="text" name="price" value="<?php echo $price; ?>"><br><br>

        <label for="quantity">Quantity:</label>
        <input type="number" name="quantity" value="<?php echo $quantity; ?>"><br><br>

        <label for="producttype">Product Type:
            <select name="producttype">
                <option value="A/C" <?php if ($producttype === 'A/C') echo 'selected'; ?>>A/C</option>
                <option value="Oven" <?php if ($producttype === 'Oven') echo 'selected'; ?>>Oven</option>
                <option value="Refrigerators" <?php if ($producttype === 'Refrigerators') echo 'selected'; ?>>Refrigerators</option>
                <option value="TV" <?php if ($producttype === 'TV') echo 'selected'; ?>>TV</option>
                <option value="Washing Machines" <?php if ($producttype === 'Washing Machines') echo 'selected'; ?>>Washing Machines</option>
            </select>
        </label><br><br>

        <input type="submit" value="Update Product">
    </form>
</body>
</html>
