<?php
session_start();
if (empty($_SESSION['user'])) {
    header('location:/html/login.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lai Lo | Admin DashBoard</title>
    <?php include_once "../components/head.php"; ?>
</head>
<body>

      <div class="main-container">
        <div class="side-menu" id="sidebar-menu">
        <?php  include_once "../components/sideMenu.php"; ?>
        </div>
        <div class="main-content-container">
           <?php include_once "../components/adminNavbar.php";  ?>
           <div class="row mx-5 mt-5 title">
            <h3>Dashboard</h3>
           </div>
           <div class="main-page-content dash">
             <div class="card-div">
                 <h3 id="order">125</h3>
                 <h6>Total order</h6>
             </div>
             <div class="card-div">
                 <h3 id="customers">125</h3>
                 <h6>Total Customers</h6>
             </div>
             <div class="card-div">
                 <h3 id="products">125</h3>
                 <h6>Total Products</h6>
             </div>
             <div class="card-div">
                 <h3 id="category">125</h3>
                 <h6>Total Categories</h6>
             </div>
           </div>
        </div>
      </div>

      <script src="/js/ajax/dashboard.js"></script>
      <?php include_once "../components/footer.php" ?>
</body>
</html>