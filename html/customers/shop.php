<?php

if (empty($_COOKIE['user'])) {
    header('location:/html/login.php');
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lai Lo | Home</title>

    <?php include_once "../components/customerHead.php" ?>
</head>

<body>
    <div class="main-container-customer">
        <div class="header-container">
            <?php include_once "../components/customerNavbar.php" ?>
        </div>

        <!-- main content page -->
        <div class="container d-flex  mt-5 p-4 ">

            <div class="col-2 category-list">
                <h4>Category</h4>
                <div class="cat-list" id="cat">
                </div>
            </div>

            <div class="col category-item">
                <div class="row p-5 d-flex justify-content-between" id="allProduct">
                    <div class="product-box  mx-4">
                        No Product Available
                    </div>

                    
                </div>
            </div>

        </div>


        <!-- footer -->
        <?php include_once "../components/customerFooter.php"  ?>

        <script src="/js/ajax/customerFunctional.js"></script>
    </div>
</body>

</html>