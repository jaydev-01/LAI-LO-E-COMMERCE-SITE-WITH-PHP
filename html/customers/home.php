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
        <div class="main-content-container">
            <div id="carouselExampleControls" class="carousel slide mb-5" data-bs-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="/images/slider_1.jpg" class="d-block w-100" alt="...">
                        <div class="text-to-show">
                            <h1>Find Brand New Collection</h1>
                            <button class="btn btn-outline-primary">Shop</button>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img src="/images/slider_2.jpg" class="d-block w-100" alt="...">
                        <div class="text-to-show">
                            <h1>Find Brand New Collection</h1>
                            <button class="btn btn-outline-primary">Shop</button>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img src="/images/slider_3.jpg" class="d-block w-100" alt="...">
                        <div class="text-to-show">
                            <h1>Find Brand New Collection</h1>
                            <button class="btn btn-outline-primary">Shop</button>
                        </div>
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>

            <div class="container my-4">
                <div class="row justify-content-center text-center">
                    <h1>Feature Product</h1>
                </div>
                <div class="row border-top p-5 d-flex justify-content-between" id="featureItem">
                    
                </div>
            </div>

            <div class="ad-container">
                <div class="row justify-content-center text-center">
                    <h1>New Collections</h1>
                </div>
                <div class="row mt-3 pt-4 border-top">
                    <div class="col-lg-5 offset-lg-4">
                        <div class="banner__item">
                            <div class="banner__item__pic">
                                <img src="/images/img_1.webp" alt="">
                            </div>
                            <div class="banner__item__text">
                                <h5>New Headphone Collection</h5>
                                <a href="#">Shop now</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-5">
                        <div class="banner__item banner__item--middle">
                            <div class="banner__item__text2">
                                <h5>Digital Accessories</h5>
                                <a href="#">Shop now</a>
                            </div>
                            <div class="banner__item__pic1">
                                <img src="/images/img_2.webp" alt="">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="banner__item banner__item--last">
                            <div class="banner__item__pic">
                                <img src="/images/img_3.webp" alt="">
                            </div>
                            <div class="banner__item__text1">
                                <h5>New Luanch of Tablate</h5>
                                <a href="#">Shop now</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- footer -->
        <?php include_once "../components/customerFooter.php"  ?>
    </div>

    <script src="/js/ajax/customerFunctional.js"></script>
</body>

</html>