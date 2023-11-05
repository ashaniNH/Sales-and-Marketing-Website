<!DOCTYPE html>
<!-- Coding By CodingNepal - codingnepalweb.com -->
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Navigation Bar with Search Box</title>
    <link rel="stylesheet" href="homepage.css" />
    <!-- Unicons CSS -->
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css" />
   <script src="homePage.js" defer></script>
  </head>
  <body>
    <nav class="nav">
      <i class="uil uil-bars navOpenBtn"></i>
      <a href="home.php" class="logo">Home</a>

      <ul class="nav-links">
        <i class="uil uil-times navCloseBtn"></i>
        <li><a href="product.php">Products</a></li>
        <li><a href="contactus.php">Contact Us</a></li>
        <!-- <li><a href="index.php">Login</a></li> -->
        <li><a href="index.php">Log Out</a></li>
      </ul>

      <i class="uil uil-search search-icon" id="searchIcon"></i>
      <div class="search-box">
        <i class="uil uil-search search-icon"></i>
        <input type="text" placeholder="Search here..." />
      </div>
    </nav>
  </body>
</html>