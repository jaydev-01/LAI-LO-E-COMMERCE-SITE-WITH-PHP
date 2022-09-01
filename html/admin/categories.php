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
    <title>Lai Lo | Categories</title>
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
                <h3>Categories</h3>
            </div>
            <div class="row mx-5 my-3 title">
                <button type="button" class="btn btn-primary w-25" id="newCatPage">NEW CATEGORY</button>
            </div>
            <div class="main-page-content">
                <div class="table-card">
                    <table class="table table-hover" id="categoryTable">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Categories</th>
                                <th scope="col">ACTION</th>
                            </tr>
                        </thead>
                        <tbody id="categoryData">
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>


    <!-- category update modal -->
    <div class="modal fade" id="updateModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Update Category</h5>
                    <button type="button" class="btn close" data-dismiss="modal" aria-label="Close" id="closeX">
                        <span aria-hidden="true"><i class="fa-solid fa-xmark"></i></span>
                    </button>
                </div>
                <div id="error" style="color: #fff;padding : 10px;background-color : rgb(255,0,0,0.3);margin: 10px 0 20px 0;display:none;">dfgdfgdfgdsfdsf</div>
                <div class="modal-body">
                    <form>
                        <div class="form-group p-3">
                            <label class="pb-3">Category Name</label>
                            <input type="text" class="form-control" placeholder="New Category" id="category">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal" id="colseBtn">Close</button>
                    <button type="button" class="btn btn-primary" id="updateCategory">Update</button>
                </div>
            </div>
        </div>
    </div>

    <script src="/js/ajax/categories.js"></script>
    <?php include_once "../components/footer.php"; ?>

</body>

</html>