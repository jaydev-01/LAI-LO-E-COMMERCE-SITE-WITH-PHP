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
            <div class="container d-flex justify-content-between">
                <div class="contact-page">
                    <h1 class="text-center">Contact Form</h1>
                    <form>
                        <div class="form-group">
                            <label for="floatingInput">Name</label>
                            <input type="text" class="form-control" id="name" placeholder="name">
                        </div>
                        <div class="form-group">
                            <label for="floatingInput">Phone No</label>
                            <input type="number" class="form-control" id="email" placeholder="Phone No">
                        </div>
                        <div class="form-group">
                            <label for="floatingPassword">Email</label>
                            <input type="email" class="form-control" id="password" placeholder="Email">
                        </div>
                        <div class="form-group">
                            <label for="floatingPassword">Address</label>
                            <textarea class="form-control" id="msg" rows="3"></textarea>
                        </div>
                        <div>
                            <button class="btn text-uppercase btn-outline-primary" type="submit" id="register">Contact</button>
                        </div>
                    </form>
                </div>
                <div class="text-contact">
                    <h1>Contact Us</h1>
                    <p>Lai Lo! is new E-commerce site which offere you brand new collection of cloths and electronics and outher thing with good price</p>
                    <button class="btn btn-outline-primary">Shop New Collection</button>
                </div>

            </div>

            <div class="google-coordinates-of-us">
                <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d4050.278165065938!2d72.87494371994444!3d21.208532009509923!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2sin!4v1663499278933!5m2!1sen!2sin" width="1300" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>

        </div>


        <!-- footer -->
        <?php include_once "../components/customerFooter.php"  ?>
    </div>
</body>

</html>