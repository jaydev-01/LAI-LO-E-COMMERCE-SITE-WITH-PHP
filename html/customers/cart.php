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
        <div class="container-fluid d-flex flex-column">
            <div class="bg-img">
                <img src="/images/cart_image.jpg" alt="">
            </div>

            <div class="container my-5 d-flex  px-5">
                <div class="table1 col-7">
                    <table class="table text-center dis-table">
                        <thead>
                            <tr>
                                <th scope="col">Product</th>
                                <th scope="col"></th>
                                <th scope="col">Quantity</th>
                                <th scope="col">Total Price</th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody id="cartTableData">
                            <tr>
                               <td  colspan="5"> No Item In Cart</td>                
                            </tr>
                        </tbody>
                    </table>
                </div>

                <div class="procced-to-order col-4 mt-5 mx-4">
                    <div class="cart__total mx-4">
                        <h6>Cart total</h6>
                        <ul>
                            <li>Total <span id="totalAmount">0</span></li>
                        </ul>
                        <a href="../customers/checkout.php" class="btn btn-outline-primary" onclick="order()">Proceed to checkout</a>
                    </div>
                </div>
            </div>
        </div>


        <!-- footer -->
        <?php include_once "../components/customerFooter.php"  ?>

        <script src="/js/ajax/customerFunctional.js"></script>
        <script src="/js/ajax/cartliked.js"></script>
    </div>
</body>

</html>