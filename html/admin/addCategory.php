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
    <title>Lai Lo | New Category</title>
    <?php include_once "../components/head.php"; ?>
</head>

<body>

    <div class="main-container">
        <div class="side-menu">
            <?php include_once "../components/sideMenu.php"; ?>
        </div>
        <div class="main-content-container">
            <?php include_once "../components/adminNavbar.php";  ?>
            <div class="row mx-5 mt-5 title">
                <h3>New Category</h3>
            </div>
            <div id="error" style="color: #fff;padding : 10px;background-color : rgb(255,0,0,0.3);margin: 10px 0 20px 0;display:none;">dfgdfgdfgdsfdsf</div>
            <div class="main-page-content">
                <div class="table-card">
                    <div class="card-body">
                        <div class="basic-form">
                            <form>
                                <div class="form-group p-3">
                                    <label class="pb-3">Category Name</label>
                                    <input type="text" class="form-control" placeholder="New Category" id="category">
                                </div>
                                <button type="submit" class="btn btn-primary m-b-10 m-l-5 m-3" id="add">ADD</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="/js/ajax/categories.js"></script>
    <?php include_once "../components/footer.php" ?>
</body>

</html>