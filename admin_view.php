<?php require_once('database/dbconnect.php') ?>
<!DOCTYPE html>
<html>
<head>
    <title>Admin view</title>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="adminView.css">
    <!-- <link rel="stylesheet" type="text/css" href="product.css"> -->
    <link rel="stylesheet" href="homepage.css" />
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css" />
    <script>
        // Disable the back button
        history.pushState(null, null, document.URL);
        window.addEventListener('popstate', function () {
            history.pushState(null, null, document.URL);
        });
    </script>
       <script src="homePage.js" defer></script>
</head>
<?php

?>
<htmL>
	<head>
		<title>Admin Page</title>
		<link rel="stylesheet" type="text/css" href="homepage.css">
	</head>
	<body> 
    <nav class="nav">
      <i class="uil uil-bars navOpenBtn"></i>
      <a href="home.php" class="logo">Home</a>

      <ul class="nav-links">
        <i class="uil uil-times navCloseBtn"></i>
        <li><a href="product.php">Products</a></li>
        <li><a href="index.php">Log Out</a></li>
      </ul>


    </nav>

		<ul>
    <li class="dropdown" name="top">
      <a href="home.php" class="dropbtn">Home Page</a>
    </li>

    <li class="dropdown">
        <a href="index.php" class="dropbtn"></a>
    </li>

    <li>
	<div class="text-container">
    <a align="center" href="logout.php" class="dropbtn">Logout</a>
</div>

    </li>

</ul>
	


      
    <div class="admin-panel">
        <h2 align='center'>Regster view</h2>

        <div class="table-container">

        <table class="styled-table" border=1 >
            <thead>
                <tr>
                <th>ID</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Email</th>
                <th>Password</th>
                <th>User Name</th>
                <th>Phone Number</th>
                <th>Gender</th>
                <th>Address</th>
                <th>Role</th>
                <th>Action</th>
                 </tr>
            </thead>
         
        <?php
          
           
           // select all parties from database//

            $query = "SELECT * FROM user";
            $result = $conn->query($query);
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>".$row['id']."</td>";
                echo "<td>".$row['Fname']."</td>";
                echo "<td>".$row['Lname']."</td>";
                echo "<td>".$row['Email']."</td>";
                echo "<td>".$row['password']."</td>";
                echo "<td>".$row['username']."</td>";
                echo "<td>".$row['PhoneNumber']."</td>";
                echo "<td>".$row['Gender']."</td>";
                echo "<td>".$row['Address']."</td>";
                echo "<td>".$row['role']."</td>";
                echo "<td><a href='edit_user.php?id=".$row['id']."'><button>Edit</button></a> | <a href='delete_user.php?id=".$row['id']."'><button onclick='deleteItem()'>Delete</button></a></td>";
                echo "</tr>";
            
            }
         
        ?>
        </table><br /><br />
        <a href="newadmin.php"><button style="background-color: #4a98f7;
            color: #fff; border: none; padding: 10px 15px; text-decoration: none; display: flex;alingn:right; 
            cursor: pointer;">New Admin</button></a>

        </div>

    
    <div class="admin-panel">       
    <h2 align='center'>Product Management</h2>
    <div class="table-container">

    <!-- Add Product Button -->
    

    <table class="styled-table" border=1>
        <thead>
            <tr>
                <th>Product ID</th>
                <th>Product Name</th>
                <th>Product Type</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Actions</th>
            </tr>
        </thead>
   
        <?php
          
           
          // select all parties from database//

          $query = "SELECT * FROM product_details";
          $result = $conn->query($query);
          while ($row = $result->fetch_assoc()) {
              echo "<tr>";
              echo "<td>".$row['product_id']."</td>";
              echo "<td>".$row['product_name']."</td>";
              echo "<td>";
              // Translate the product type to a label
              switch ($row['product_type']) {
                  case 'A/C':
                      echo "A/C";
                      break;
                  case 'Oven':
                      echo "Oven";
                      break;
                  case 'Refrigerators':
                      echo "Refrigerators";
                      break;
                  case 'TV':
                      echo "TV";
                      break;
                  /*case 'Washing Machine':
                      echo "Washing Machine";
                      break;*/
                  default:
                      echo "Washing Maching";
              }
              echo "</td>";
              echo "<td>".$row['price']."</td>";
              echo "<td>".$row['quantity']."</td>";
              echo "<td><a href='edit_product.php?id=".$row['product_id']."'><button>Edit</button></a>
              | <a href='delete_product.php?id=".$row['product_id']."'><button onclick='deleteItem()'>Delete</button></a></td>" ;
              echo "</tr>";
          }
       ?>

    </table><br /><br />
    <a href="add_product.php"><button style="background-color: #4a98f7;
                color: #fff; border: none; padding: 10px 15px; text-decoration: none; display: flex;alingn:right; 
                cursor: pointer;">Add Product</button></a>

        </div>
        <body>

<div class="admin-panel">       
    <h2 align='center'>Purchase Management</h2>
    <div class="table-container">

    <!-- Add Product Button -->
    
    <table class="styled-table" border=1>
        <thead>
            <tr>
                <th>Oder Number</th>
                <th>Product ID</th>
                <th>ID</th>
            </tr>
        </thead>

<?php
        $query = "SELECT * FROM purchase_details";
           $result = $conn->query($query);
           while ($row = $result->fetch_assoc()) {
               echo "<tr>";
               echo "<td>".$row['order_no']."</td>";
               echo "<td>".$row['product_id']."</td>";
               echo "<td>".$row['id']."</td>";               
           }

?>           
       

    <!----------------------------java script code----------------------------->
    <script>
         function deleteItem() {
            // Display a confirmation dialog
            if (confirm("Are you sure you want to delete this ?")) {
                // Perform the deletion (you can make an AJAX request here)

                // Show a notification
                showNotification("This deleted successfully.");
            }
            
        }

        function showNotification(message) {
            alert(message);
        }
        
    </script>


   
</body>
</html>



