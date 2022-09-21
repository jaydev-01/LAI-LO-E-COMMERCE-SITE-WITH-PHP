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
        <div class="container-fluid d-flex flex-column mt-4">

            <div class="background-clr">

            </div>

            <div class="container my-5 flex-column col-7">
                <div class="border-bottom">
                    <h4>Billing Details</h4>
                </div>

                <div id="error" class="error" style="color: #fff;padding : 10px;background-color : rgb(255,0,0,0.3);margin: 10px 0 20px 0;display:none;">dfgdfgdfgdsfdsf</div>

                <form >
                    <div class="form-group p-3">
                        <label class="py-2">First Name</label>
                        <input type="text" class="form-control" id="fname" placeholder="First Name">
                    </div>
                    <div class="form-group p-3">
                        <label class="py-2">Last Name</label>
                        <input type="text" class="form-control" id="lname" placeholder="Last Name">
                    </div>
                    <div class="form-group p-3">
                        <label for="floatingPassword">Address</label>
                        <textarea class="form-control" id="address" rows="3"></textarea>
                    </div>
                    <div class="form-group p-3">
                        <label class="py-2">City</label>
                        <input type="text" class="form-control" id="city" placeholder="city">
                    </div>
                    <div class="form-group p-3">
                        <label class="py-2">State</label>
                        <input type="text" class="form-control" id="state" placeholder="State">
                    </div>
                    <div class="form-group p-3">
                        <label class="py-2">Country</label>
                        <input type="text" class="form-control" id="country" placeholder="Country">
                    </div>
                    <div class="form-group p-3">
                        <label class="py-2">Phone No</label>
                        <input type="text" class="form-control" id="phoneno" placeholder="Phone No">
                    </div>
                    <div class="form-group p-3">
                        <label class="py-2">Email</label>
                        <input type="text" class="form-control" id="email" placeholder="Email">
                    </div>
                    <div class="form-group  p-3">
                    <button class="btn text-uppercase btn-outline-primary" type="button" id="order">Order</button>
                </div>
                </form>
            </div>

        </div>


        <!-- footer -->
        <?php include_once "../components/customerFooter.php"  ?>
    </div>

    <script src="/js/ajax/customerFunctional.js"></script>
    <script src="/js/ajax/customerOrder.js"></script>
</body>

</html>