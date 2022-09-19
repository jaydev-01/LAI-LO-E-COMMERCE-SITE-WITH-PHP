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
        <div class="container d-flex flex-column mt-4">
            <div class="container my-3 d-flex justify-content-between about">
                <div class="text-about">
                    <h1>About Us</h1>
                    <p>Lai Lo! is new E-commerce site which offere you brand new collection of cloths and electronics and outher thing with good price</p>
                    <button class="btn btn-outline-primary">Shop Now</button>
                </div>
                <div class="about-image">
                    <img src="/images/about_img.jpg" alt="">
                </div>
            </div>

            <div class="mt-5 testmonia">
                <div class="testimonia-title text-center">
                    <h1>Happy Customers</h1>
                </div>

                <div id="carouselExampleControls" class="carousel slide mb-5 carousel-dark" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <div class="testimonial4_slide">
                                <img src="https://i.ibb.co/8x9xK4H/team.jpg" class="img-circle img-responsive" />
                                <p>Lai Lo! is new E-commerce site which offere you brand new cloths electronic item, mobiles, laptops at good price</p>
                                <h4>Customer 1</h4>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <div class="testimonial4_slide">
                                <img src="https://i.ibb.co/8x9xK4H/team.jpg" class="img-circle img-responsive" />
                                <p>Lai Lo! is new E-commerce site which offere you brand new cloths electronic item, mobiles, laptops at good price</p>
                                <h4>Customer 1</h4>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <div class="testimonial4_slide">
                                <img src="https://i.ibb.co/8x9xK4H/team.jpg" class="img-circle img-responsive" />
                                <p>Lai Lo! is new E-commerce site which offere you brand new cloths electronic item, mobiles, laptops at good price</p>
                                <h4>Customer 1</h4>
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
            </div>

        </div>


        <!-- footer -->
        <?php include_once "../components/customerFooter.php"  ?>
    </div>
</body>

</html>