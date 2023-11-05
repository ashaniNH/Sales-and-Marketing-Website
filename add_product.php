<!DOCTYPE html>
<html>
<head>
    <title>Add Product</title>
    <link rel="stylesheet" type="text/css" href="edit_product.css">
</head>
<body>
    <h1>Add Product</h1>
    <form method="post" action="add_productdb.php" enctype="multipart/form-data">
    <!--<label for="productid">Product ID:</label>
        <input type="text" id="productid" name="productid" required><br><br>-->
        <label for="product_name">Product Name:</label>
        <input type="text" id="product_name" name="product_name" required><br><br>

        <label for="price">Price:</label>
        <input type="text" id="price" name="price" required><br><br>

        <label for="quantity">Quantity:</label>
        <input type="number" id="quantity" name="quantity" required><br><br>

        <label for="product_type">Product Type:</label>
        <select id="product_type" name="product_type" required>
            <option value="A/C">A/C</option>
            <option value="Oven">Oven</option>
            <option value="Refrigerators">Refrigerators</option>
            <option value="TV">TV</option>
            <option value="Washing Machines">Washing Machines</option>
        </select><br><br>

        <input type="file" name="my_image">

        <div id="success-alert" style="display: none;"></div>
        <input type="submit" value="Add Product" name="addproduct">
    </form>
</body>
</html>

<script>
    <?php
    if (isset($_SESSION['product_added']) && $_SESSION['product_added']) {
        echo 'document.getElementById("success-alert").innerHTML = "Successfully added product";';
        echo 'document.getElementById("success-alert").style.display = "block";';
        unset($_SESSION['product_added']);
    }
    ?>
</script>

