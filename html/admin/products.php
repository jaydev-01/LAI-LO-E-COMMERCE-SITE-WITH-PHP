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
    <title>Lai Lo | Products</title>
    <?php include_once "../components/head.php" ?>
</head>

<body>
    <div class="main-container">
        <div class="side-menu">
            <?php include_once "../components/sideMenu.php"; ?>
        </div>
        <div class="main-content-container">
            <?php include_once "../components/adminNavbar.php"; ?>
            <div class="row mx-5 mt-5 title">
                <h3>Products</h3>
            </div>
            <div class="row mx-5 my-3 title">
                <button type="button" class="btn btn-primary w-25" id="newProducts">NEW PRODUCTS</button>
            </div>
            <div class="main-page-content">
                <div class="table-card">
                    <table class="table table-hover" id="customerTable">
                        <table class="table table-hover" id="productTable">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">PRODUCT IMAGE</th>
                                    <th scope="col">PRODUCT NAME</th>
                                    <th scope="col">PRICE</th>
                                    <th scope="col">CATEGORY</th>
                                    <th scope="col">AVAILABLE UNIT</th>
                                    <th scope="col">DESCRIPTION</th>
                                    <th scope="col">DISCOUNT</th>
                                    <th scope="col">ACTION</th>
                                </tr>
                            </thead>
                            <tbody id="productData">
                            </tbody>
                        </table>
                </div>
            </div>
        </div>
    </div>


    <!-- product update modal -->
    <div class="modal fade" id="updateProductModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Update Products</h5>
                    <button type="button" class="btn close" data-dismiss="modal" aria-label="Close" id="closeX">
                        <span aria-hidden="true"><i class="fa-solid fa-xmark"></i></span>
                    </button>
                </div>
                <div id="error" style="color: #fff;padding : 10px;background-color : rgb(255,0,0,0.3);margin: 10px 0 20px 0;display:none;">dfgdfgdfgdsfdsf</div>
                <div class="modal-body">
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
                                
                            </select>
                        </div>
                        <div class="form-group py-2">
                            <label>Product Description</label>
                            <textarea class="form-control" rows="1" placeholder="Products Description" id="description"></textarea>
                        </div>
                        <div class="form-group py-2">
                            <label>Discount</label>
                            <input type="number" class="form-control" placeholder="Available Units" id="discount" value="0">
                        </div>
                        <div class="form-group py-2">
                            <label>Total Unit Available</label>
                            <input type="number" class="form-control" placeholder="Available Units" id="unit">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal" id="colseBtn">Close</button>
                    <button type="button" class="btn btn-primary" id="updateProduct">Update</button>
                </div>
            </div>
        </div>
    </div>

    <script src="/js/ajax/products.js"></script>
    <?php include_once "../components/footer.php"; ?>

</body>

</html>