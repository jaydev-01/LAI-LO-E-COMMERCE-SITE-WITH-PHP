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
    <title>Lai Lo | Orders</title>
    <?php include_once "../components/head.php" ?>
</head>

<body>
    <div class="main-container">
        <div class="side-menu">
            <?php include_once "../components/sideMenu.php"; ?>
        </div>
        <div class="main-content-container">
            <?php include_once "../components/adminNavbar.php"; ?>
            <div class="row mx-5 mt-5 title">
                <h3>Orders</h3>
            </div>
            <div class="main-page-content">
                <div class="table-card">
                    <table class="table table-hover" id="orderTable">
                        <thead>
                            <tr role="row">
                                <th>ID</th>
                                <th>PRODUCT IMAGE</th>
                                <th>CUSTOMER ID</th>
                                <th>PRODUCT NAME</th>
                                <th>PRICE</th>
                                <th>UNIT</th>
                                <th>CATEGORY</th>
                                <th>ORDER DATE</th>
                                <th>DELIVERY DATE</th>
                                <th>DELIVERY STATUS</th>
                            </tr>
                        </thead>
                        <tbody id="orderData">
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <script src="/js/ajax/order.js"></script>
    <?php include_once "../components/footer.php"; ?>

</body>

</html>