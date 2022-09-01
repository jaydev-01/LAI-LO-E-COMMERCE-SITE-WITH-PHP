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
    <title>Lai Lo | New Product</title>
    <?php include_once "../components/head.php"; ?>
</head>

<body scroll="no">

    <div class="main-container">
        <div class="side-menu">
            <?php include_once "../components/sideMenu.php"; ?>
        </div>
        <div class="main-content-container">
            <?php include_once "../components/adminNavbar.php";  ?>
            <div class="row mx-5 mt-5 title">
                <h3>New Product</h3>
            </div>
            <div id="error" style="color: #fff;padding : 10px;background-color : rgb(255,0,0,0.3);margin: 10px 0 20px 0;display:none;">dfgdfgdfgdsfdsf</div>
            <div class="main-page-content">
                <div class="table-card">
                    <div class="card-body">
                        <div class="basic-form">
                            <form>
                                <div class="form-group py-2">
                                    <label>Product Name</label>
                                    <input type="text" class="form-control" placeholder="New Product" id="product">
                                </div>
                                <div class="form-group py-2">
                                    <label>Product Image</label>
                                    <input class="form-control" type="file" id="productImage">
                                </div>
                                <div class="form-group py-2">
                                    <label>Product Price Per Unit</label>
                                    <input type="number" class="form-control" placeholder="Price Per Unit" id="price">
                                </div>
                                <div class="form-group py-2">
                                    <label>Category</label>
                                    <select name="category" id="category" class="form-control" id="category">
                                        <option value="0">--SELECT CATEGORY--</option>
                                    </select>
                                </div>
                                <div class="form-group py-2">
                                    <label>Product Description</label>
                                    <textarea class="form-control" rows="4" placeholder="Products Description" id="description"></textarea>
                                </div>
                                <div class="form-group py-2">
                                    <label>Discount</label>
                                    <input type="number" class="form-control" placeholder="Available Units" id="discount" value="0">
                                </div>
                                <div class="form-group py-2">
                                    <label>Total Unit Available</label>
                                    <input type="number" class="form-control" placeholder="Available Units" id="unit">
                                </div>
                                <button type="submit" class="btn btn-primary mt-3" id="addProduct">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="/js/ajax/products.js"></script>
    <?php include_once "../components/footer.php" ?>
</body>

</html>