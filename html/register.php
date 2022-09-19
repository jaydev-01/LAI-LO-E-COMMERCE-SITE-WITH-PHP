<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lai Lo | Login</title>
    <?php include_once "./components/head.php"; ?>
</head>

<body>
    <div class="login-container">
        <div class="login-form-container">
            <div class="logo-login"><span>Lai Lo!</span> </div>
            <div class="log-title">Register</div>
            <div id="error" class="error" style="color: #fff;padding : 10px;background-color : rgb(255,0,0,0.3);margin: 10px 0 20px 0;display:none;">dfgdfgdfgdsfdsf</div>
            <form>
                <div class="form-group mb-3">
                    <input type="text" class="form-control" id="name" placeholder="name">
               </div>
                <div class="form-group mb-3">
                    <input type="email" class="form-control" id="email" placeholder="name@example.com">
                </div>
                <div class="form-group mb-3">
                    <input type="password" class="form-control" id="password" placeholder="Password">
                </div>
                <div class="form-group mb-3">
                    <input type="text" class="form-control" id="phoneno" placeholder="Phone no">
                </div>
                <div class="form-row d-flex my-3 mx-2">
                    <div class="col-9">
                        <input type="text" class="form-control" id="captcha" placeholder="Captcha">
                    </div>
                    <div class="col">
                       <img src="/php/captcha.php" alt="">
                    </div>
                </div>
                <div class="d-grid">
                    <button class="btn text-uppercase btn-primary" id="register">Register</button>
                </div>
                <div class="d-flex p-3 justify-content-center">
                    Do you have account?<a href="login.php"><span> Login here</span></a>
                </div>
            </form>
        </div>
    </div>

    <script src="/js/ajax/customerFunctional.js"></script>
</body>

</html>