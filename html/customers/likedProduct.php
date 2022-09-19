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
            <div class="container my-5 d-flex justify-content-center px-5">
                <div class="table1 col-7">
                    <table class="table text-center dis-table">
                        <thead>
                            <tr>
                                <th scope="col">Product</th>
                                <th scope="col"></th>
                                <th scope="col">Quantity</th>
                                <th scope="col">Total Price</th>
                                <th scope="col"></th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td> <img src="/images/img_1.webp" alt="" width="50px" height="50px"> </td>
                                <td>
                                    <div class="pt-2">
                                        <p>Apple I-Watch</p>
                                        <p>$89000</p>
                                    </div>
                                </td>
                                <td>
                                    <div class="d-flex justify-content-between">
                                        <button class="btn"><i class="fa-solid fa-plus"></i></button>
                                        <div class="pt-2">1</div>
                                        <button class="btn"><i class="fa-solid fa-minus"></i></button>
                                    </div>
                                </td>
                                <td>$741</td>
                                <td> <button class="btn"> <i class="fa-solid fa-trash"></i></button> </td>
                                <td> <button class="btn"> <i class="fa-sharp fa-solid fa-cart-plus"></i></button> </td>
                            </tr>
                            <tr>
                                <td> <img src="/images/img_1.webp" alt="" width="50px" height="50px"> </td>
                                <td>
                                    <div class="pt-2">
                                        <p>Apple I-Watch</p>
                                        <p>$89000</p>
                                    </div>
                                </td>
                                <td>
                                    <div class="d-flex justify-content-between">
                                        <button class="btn"><i class="fa-solid fa-plus"></i></button>
                                        <div class="pt-2">1</div>
                                        <button class="btn"><i class="fa-solid fa-minus"></i></button>
                                    </div>
                                </td>
                                <td>$741</td>
                                <td> <button class="btn"> <i class="fa-solid fa-trash"></i></button> </td>
                                <td> <button class="btn"> <i class="fa-sharp fa-solid fa-cart-plus"></i></button> </td>
                            </tr>
                            <tr>
                                <td> <img src="/images/img_1.webp" alt="" width="50px" height="50px"> </td>
                                <td>
                                    <div class="pt-2">
                                        <p>Apple I-Watch</p>
                                        <p>$89000</p>
                                    </div>
                                </td>
                                <td>
                                    <div class="d-flex justify-content-between">
                                        <button class="btn"><i class="fa-solid fa-plus"></i></button>
                                        <div class="pt-2">1</div>
                                        <button class="btn"><i class="fa-solid fa-minus"></i></button>
                                    </div>
                                </td>
                                <td>$741</td>
                                <td> <button class="btn"> <i class="fa-solid fa-trash"></i></button> </td>
                                <td> <button class="btn"> <i class="fa-sharp fa-solid fa-cart-plus"></i></button> </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>


        <!-- footer -->
        <?php include_once "../components/customerFooter.php"  ?>
    </div>
</body>

</html>